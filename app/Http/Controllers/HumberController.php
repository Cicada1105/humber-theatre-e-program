<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\FacultyInvolvement;
use App\Models\Production;

define('PG_TITLE', [ 'title' => 'Humber Theatre' ]);

class HumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve list of faculty
        // Retrieve special thanks for current program
        return view('humber.index', [ 'title' => 'Humber Theatre' ]);
    }

    /**
     * Show the form for updating the special thanks and active faculty/contributors
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Retrieve the id of the active program
        $activeProgram = Production::where('is_active', 1)->first();

        // Retrieve all faculty for PM to choose from and special thanks from active program
        return view('humber.edit', [ 'title' => 'Humber Theatre', 'active_program' => $activeProgram ]);
    }

    /**
     * Update the special thanks for current program and update all faculty to reflect changes to active "status"
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Retrieve the submitted request info
        $submission = $request->all();
        // Retrieve the current active program and update the corresponding data
        Production::where('is_active', 1)->update([
            'land_acknowledgment' => $submission['landAcknowledgment'],
            'about_humber' => $submission['aboutHumber'],
            'special_thanks' => $submission['specialThanks']
        ]);

        return redirect($request->root() . '/pm/humber');
    }
}
