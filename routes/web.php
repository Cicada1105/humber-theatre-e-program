<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContributorsController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HumberController;
use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\UserController;

use App\Models\Production;
use App\Models\Contribution;
use App\Models\Faculty;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

enum DepartmentTypes:string {
    case Performance = "performance";
    case GuestArtist = "guest artist";
    case Production = "production";

    public function color(): string {
        return match($this) {
            DepartmentTypes::Performance => '#0C87CE',
            DepartmentTypes::GuestArtist => '#EA7994',
            DepartmentTypes::Production => '#3FA276'
        };
    }
}

/*********************/
/*   Public Routes   */
/*********************/
Route::get('/', function() {
    // Obtain the program labeled as published
    $publishedProgram = Production::where('is_published',1)->first();

    return view('home', $publishedProgram );
})->middleware('guest');
Route::get('/contributors', function () {
    // Obtain the current published program
    $activeProgram = Production::where('is_published', 1)->first();
    // Retrieve all Contributions to the current published program
    $contributions = Contribution::where('production_id', $activeProgram->id)->get()->sortBy(function($contribution) {
        return $contribution->contributor->last_name;
    });

    $contributorsData = [
        'title' => $activeProgram->title,
        'program' => $activeProgram->title,
        'departments' => DepartmentTypes::cases(),
        'contributions' => $contributions
    ];

    return view('contributors', $contributorsData);
})->middleware('guest');
Route::get('/humber-theatre', function() {
    // Retrieve the current published program
    $activeProgram = Production::where('is_published', 1)->first();
    // Retrieve all faculty members
    $faculty = Faculty::all();
    $testData = [
        'title' => $activeProgram->title,
        'current_program' => $activeProgram,
        'faculty' => $faculty
    ];

    return view('acknowledgment', $testData);
})->middleware('guest');

/********************/
/*   Login Routes   */
/********************/
Route::get('/login', [DashboardController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/login', [DashboardController::class, 'login'])->middleware('guest');
Route::get('/logout', [DashboardController::class, 'logout'])->middleware('auth');

// All below routes must be authenticated
Route::middleware(['auth'])->group(function() {
    /******************************/
    /*   Product Manager Routes   */
    /******************************/
    // All routes inside of the prefix will be /pm/...restOfPath
    Route::prefix('pm')->group(function() {
        /*******************/
        /*   Productions   */
        /*******************/
        // List of all productions
        Route::get('/', [ProductionsController::class,'list']);
        Route::post('update', [ProductionsController::class, 'updateActiveProgram']);
        // Details about the active production
        Route::get('/preview', [ProductionsController::class, 'active']);
        Route::post('/preview', [ProductionsController::class, 'publish']);
        Route::prefix('production')->group(function() {
            Route::get('/add', [ProductionsController::class, 'add']);
            Route::post('/add', [ProductionsController::class, 'create']);
            Route::get('/update/{id}', [ProductionsController::class, 'edit']);
            Route::post('/update/{id}', [ProductionsController::class, 'update']);
            Route::post('/delete/{id}', [ProductionsController::class, 'delete']);
        });

        /********************/
        /*   Contributors   */
        /********************/
        Route::prefix('contributors')->group(function() {
            // List of contributors to current production?
            Route::get('/', [ContributorsController::class, 'list']);
            Route::post('/update', [ContributorsController::class, 'updateActiveContributors']);

            Route::prefix('contributor')->group(function() {
                Route::get('/add', [ContributorsController::class, 'add']);
                Route::post('/add', [ContributorsController::class, 'create']);
                Route::get('/update/{id}', [ContributorsController::class, 'edit']);
                Route::post('/update/{id}', [ContributorsController::class, 'update']);
                Route::post('/delete/{id}', [ContributorsController::class, 'delete']);
            });
        });

        /***************/
        /*   Faculty   */
        /***************/
        Route::prefix('faculty')->group(function() {
            Route::get('/', [FacultyController::class, 'list']);
            Route::get('/add', [FacultyController::class, 'add']);
            Route::post('/add', [FacultyController::class, 'create']);
            Route::get('/update', [FacultyController::class, 'editActiveFaculty']);
            Route::post('/update', [FacultyController::class, 'updateActiveFaculty']);
            Route::get('/update/{id}', [FacultyController::class, 'edit']);
            Route::post('/update/{id}', [FacultyController::class, 'update']);
            Route::post('/delete/{id}', [FacultyController::class, 'delete']);
        });

        /**********************/
        /*   Humber Theatre   */
        /**********************/
        Route::prefix('humber')->group(function() {
            // Route for retrieving edit page for updating faculty active in current program and special thanks for active program
            Route::get('/', [HumberController::class, 'edit']);
            Route::post('/update', [HumberController::class, 'update']);
        });
    });
});

        /*************/
        /*   Users   */
        /************/
        // This section is only available to those that are considered admins
        Route::middleware(['auth','admin'])->group(function() {
            Route::prefix('pm/users')->group(function() {
                Route::get('/', [UserController::class, 'list']);
                Route::get('/add', [UserController::class, 'add']);
                Route::post('/add', [UserController::class, 'create']);
                Route::get('/update/{id}', [UserController::class, 'edit']);
                Route::post('/update/{id}', [UserController::class, 'update']);
                Route::post('/delete/{id}', [UserController::class, 'delete']);
            });
        });