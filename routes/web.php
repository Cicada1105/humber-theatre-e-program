<?php

use Illuminate\Support\Facades\Route;

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
define('PROGRAMS', ['the-humans', 'program-2', 'program-3']);
define('ADDITIONAL_PAGES', ['humber-theatre']);

Route::get('/', function() {
    return view('home');
});
Route::get('/programs', function() {
    return view('programs', [
        'programs' => PROGRAMS
    ]);
});
Route::get('/humber-theatre', function() {
    return view('humber-theatre');
});
Route::get('/{program}', function($program) {
    // Convert program name into a formatted title
    $programTitleWords = explode("-", $program);
    $formattedString = ucwords(join(" ",$programTitleWords));

    // This will be retrieved from the database based on 'humans' which will be replaced with a wildcard
    // Will most likely need to make a Model to define this data
    $testData = [
        'title' => $formattedString,
        'img' => [
            'src' => '/imgs/TheHumans.png',
            'alt' => 'The Humans Poster',
            'caption' => 'Poster image by Mira Aguayo'
        ],
        'writer' => 'Stephen Karam',
        'about' => [
            'The Blake family’s traditionally tame holiday visit slowly degenerates into chaos, as the family’s deepest fears rise to the surface. In an increasingly unfamiliar world, their insecurities and secrets risk making this their last Thanksgiving together.',
            'A darkly comic play filled with both laughter and pain, The Humans will take you on a unique journey reflective of today’s uncertainty, chaos, and change. Featuring a special appearance by a peppermint pig...'
        ],
        'directed_by' => 'Christopher Stanton',
        'dates' => [
            [
                'date_time' => "2022-12-9T19:00:00",
                'details' => 'Humans 1.0 - Performance Program ONLY – Preview'
            ],
            [
                'date_time' => "2022-12-10T19:00:00",
                'details' => 'Humans 2.0 (Production) & 1.0 (Performance)'
            ],
            [
                'date_time' => "2022-12-11T19:00:00",
                'details' => 'Humans 2.0 (Production) & 1.0 (Performance)'
            ]
        ],
        'location' => 'Online',
        'advisory' => ['Strong Language', 'Mature Content']
    ];

    return view('about', $testData);
})->whereIn('program', array_merge(PROGRAMS, ADDITIONAL_PAGES));

Route::get('/{program}/contributors', function ($program) {
    // Convert program name into a formatted title
    $programTitleWords = explode("_", $program);
    $formattedString = ucwords(join(" ",$programTitleWords));

    return view('contributors', ['message' => "$formattedString Collaborators"]);
})->whereIn('program', PROGRAMS);