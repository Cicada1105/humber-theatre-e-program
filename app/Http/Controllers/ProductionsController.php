<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Production;
use App\Models\Contribution;
use App\Models\Faculty;

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
        return view('productions.list', [ 'title' => 'Production', 'productions' => Production::all() ]);
    }

    /**
     * Display the current active production
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        // Retrieve the active program
        $activeProgram = Production::where('is_active', 1)->first();
        // Retrieve all Contributions to the current active program
        $contributions = Contribution::where('production_id', $activeProgram->id)->get();
        // Retrieve all faculty members
        $faculty = Faculty::all();

        $previewData = [
            'title' => 'Productions',
            'active_program' => $activeProgram,
            'contributions' => $contributions,
            'faculty' => $faculty
        ];

        return view('productions.details', $previewData);
    }

    /**
     * Display the current active production
     *
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request)
    {
        // Set any (Should be one) production set as published to false
        Production::where('is_published', 1)->update(['is_published' => 0]);
        // Set the active program is_published attribute to true
        $productionToBePublished = Production::where('is_active', 1)->first();
        $productionToBePublished->is_published = 1;

        $productionToBePublished->save();

        return redirect($request->root() . '/pm');
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
        // Retrieve the submitted data
        $submission = $request->all();
        // Creat a new instance of a production model
        $newProduction = new Production();

        // Store the respective data in the production attributes
        $newProduction->is_active = false;
        $newProduction->is_published = false;

        // Store the image file in the contributors_images directory under the public folder
        $path = $request->file('posterPhoto')->store('production_images','public');
        // Store path in the database
        $newProduction->poster_img_src = $path;
        $newProduction->poster_img_caption = $submission['posterCaption'];

        $newProduction->title = $submission['title'];
        $newProduction->authors = $submission['authors'];
        $newProduction->blurb = $submission['blurb'];
        $newProduction->directors = $submission['directors'];
        if (!$submission["choreographers"]) {
            $newProduction->choreographers = "";
        }
        else {
            $newProduction->choreographers = $submission['choreographers'];   
        }
        $newProduction->dates = $submission['dates'];
        $newProduction->location = $submission['location'];
        $newProduction->content_warning = $submission['contentWarning'];

        // Set additional fields to empty (added on other pages)
        $newProduction->land_acknowledgment = "";
        $newProduction->about_humber = "";
        $newProduction->special_thanks = "";

        // Save instance of production to database
        $newProduction->save();

        return redirect($request->root() . '/pm');
    }

    /**
     * Display the edit form for the requested production
     * 
     * @param int $id
     */
    public function edit($id) {
        // Retrieve the production requested based on its id
        $productionToBeEditted = Production::find($id);

        return view('productions.edit', [ 'production' => $productionToBeEditted, 'title' => 'Productions' ]);
    }

    /**
     * Update the requested production based on the passed in id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve the production to be updated
        $productionToBeUpdated = Production::find($id);
        // Retrieve the user submitted data
        $submission = $request->all();
        // Update the retrieved production's attributes accordingly
        // Check if an image was uploaded
        if ($request->hasFile('posterPhoto')) {
            // Check if image is associate with program
            if ($productionToBeUpdated->poster_img_src){
                // Check if file does exists on the server public storage
                if (Storage::disk('public')->exists($productionToBeUpdated->photo)) {
                    // Delete the old image on the server
                    unlink(storage_path('app/public/'.$productionToBeUpdated->poster_img_src));      
                }
            }
            // Store the newly updated image inside of the production_images directory under the public storage folder
            $path = $request->file('posterPhoto')->store('production_images','public');
            // Store the path to the database along with the image caption
            $productionToBeUpdated->poster_img_src = $path;
        }

        $productionToBeUpdated->poster_img_caption = $submission['posterCaption'];

        $productionToBeUpdated->title = $submission['title'];
        $productionToBeUpdated->authors = $submission['authors'];
        $productionToBeUpdated->directors = $submission['directors'];

        if (!$submission['choreographers']) {
            $productionToBeUpdated->choreographers = "";
        }
        else {
            $productionToBeUpdated->choreographers = $submission['choreographers'];   
        }

        $productionToBeUpdated->dates = $submission['dates'];
        $productionToBeUpdated->location = $submission['location'];
        $productionToBeUpdated->directors = $submission['directors'];
        $productionToBeUpdated->blurb = $submission['blurb'];
        $productionToBeUpdated->content_warning = $submission['contentWarning'];

        // Save changes to the updated production
        $productionToBeUpdated->save();

        return redirect($request->root() . '/pm');
    }

    /**
     * Update the current, active program
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateActiveProgram(Request $request)
    {
        // Retrieve the production that is currently active and reset it
        Production::where('is_active', 1)->update(['is_active' => 0]);
        // Store the id of the selected program
        $id = $request->input('activeProgram');
        // Find and update the program to be active
        Production::where('id', $id)->update(['is_active' => 1]);

        return redirect($request->root() . '/pm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //
        return redirect($request->root() . '/pm')->with('title', 'Productions');
    }
}
