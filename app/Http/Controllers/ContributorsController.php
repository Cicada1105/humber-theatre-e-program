<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use App\Models\Contributor;
use App\Models\Contribution;
use App\Models\Production;

define('PG_TITLE', [ 'title' => 'Contributors' ]);

class ContributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        // Retrieve the active program
        $activeProgram = Production::where('is_active', 1)->first();

        return view('contributors.list', [ 'title' => 'Contributors', 'active_program' => $activeProgram, 'contributors' => Contributor::all() ]);
    }

    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('contributors.add', PG_TITLE);
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
        return redirect('/pm/contributors');
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
        return view('contributors.details', PG_TITLE);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('contributors.edit', PG_TITLE);
    }
   
    /**
     * Update contributors who contributed to current, active program
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateActiveContributors(Request $request) {
        // Retrieve the id of the current active program
        $activeProgram = Production::where('is_active', 1)->first();
        // Reset/remove contributors from contributions that have contributed to current program
        $oldContributions = Contribution::where('production_id', $activeProgram->id)->delete();
        // Retrieve the new contributors from the request
        $submittedContributors = $request->all();

        foreach($submittedContributors['contributors'] as $contrId=>$info) {
            //Check if the submitted contributor is to be added to the active list
            if (isset($info['is_active'])) {
                $c = new Contribution();
                $c->production_id = $activeProgram->id;
                $c->contributor_id = $contrId;
                $c->category = $info['category'];
                $c->role = $info['role'];
                $c->save();
            }
        }

        return redirect('/pm/contributors');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return redirect('/pm/contributors');
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
        return redirect('/pm/contributors');
    }
}
