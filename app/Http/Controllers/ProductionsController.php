<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Production;

define('PG_TITLE', [ 'title' => 'Productions' ]);

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return view('productions.list', [ 'title' => 'Prouction', 'productions' => Production::all() ]);
    }

    /**
     * Display the current active production
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        //
        return view('productions.details', PG_TITLE);
    }
    
    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('productions.add', PG_TITLE);
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return redirect('/pm')->with('title', 'Productions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('productions.details', PG_TITLE);
    }

    /**
     * Update the current, active program
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateActiveProgram(Request $request)
    {
        //
        return redirect('/pm')->with('title', 'Productions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        return redirect('/pm')->with('title', 'Productions');
    }
}
