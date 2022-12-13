<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Retrieve the submitted request data
        $submission = $request->all();
        // Create a new contributor
        $newContributor = new Contributor();
        // Store the submitted values in the newly created contributor's attributes
        $newContributor->first_name = $submission['firstName'];
        $newContributor->last_name = $submission['lastName'];
        $newContributor->bio = $submission['bio'];

        // Remove the instance of the photo if it exists
        unlink(storage_path('app/public/'.$submission->photo));
        
        // Store the file in the contributors_images directory under the public folder
        $path = $request->file('photo')->store('contributors_images','public');

        $newContributor->photo = $path;
        $newContributor->save();

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
        // Retrieve the contributor associated with the requested id
        $contributor = Contributor::find($id);

        return view('contributors.edit', [ 'title' => 'Contributors', 'contributor' => $contributor ]);
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
        // Retrieve the submitted contributor data
        $submission = $request->all();
        // Retrieve the contributor associated with the requested id
        $contributor = Contributor::find($id);
        // Update the respective contributor attributes
        $contributor->first_name = $submission['firstName'];
        $contributor->last_name = $submission['lastName'];
        $contributor->bio = $submission['bio'];

        // Remove old image
        unlink(storage_path('app/public/'.$contributor->photo));

        // Store the file in the contributors_images directory under the public folder
        $path = $request->file('photo')->store('contributors_images','public');

        // Update the database stored path of the image
        $contributor->photo = $path;
        // Save all changes applied to the contributor
        $contributor->save();

        return redirect('/pm/contributors');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Remove all contributions associated with the specified contributor id
        Contribution::where('contributor_id', $id)->delete();
        // Find the contributor to be delete
        $contributorToBeDeleted = Contributor::find($id);
        // Remove image on server file system associated with the contributor
        unlink(storage_path('app/public/'.$contributorToBeDeleted->photo));
        
        // Remove the contributor
        $contributorToBeDeleted->delete();
        
        return redirect('/pm/contributors');
    }
}
