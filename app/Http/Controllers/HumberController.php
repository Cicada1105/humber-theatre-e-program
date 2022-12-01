<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('humber.index', PG_TITLE);
    }

    /**
     * Show the form for updating the special thanks and active faculty/contributors
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Retrieve all faculty for PM to choose from and special thanks from active program
        return view('humber.edit', PG_TITLE);
    }

    /**
     * Update the special thanks for current program and update all faculty to reflect changes to active "status"
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 
        return redirect('pm/humber')->with('title', 'Humber Theatre');
    }
}
