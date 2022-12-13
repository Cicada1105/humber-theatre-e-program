<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
     * Display the current active production
     *
     * @return \Illuminate\Http\Response
     */
    public function publish()
    {
        // Set any (Should be one) production set as published to false
        Production::where('is_published', 1)->update(['is_published' => 0]);
        // Set the active program is_published attribute to true
        $productionToBePublished = Production::where('is_active', 1)->first();
        $productionToBePublished->is_published = 1;

        $productionToBePublished->save();

        return redirect('/pm');
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
        
        //Remove the instance of the photo if it exists
        if (File::exists($submission['posterPhoto']->hashName())) {
          unlink(storage_path('app/public/production_images/'.$submission['posterPhoto']->hashName()));
        }
        // Store the image file in the contributors_images directory under the public folder
        $path = $request->file('posterPhoto')->store('production_images','public');
        // Store path in the database
        $newProduction->poster_img_src = $path;
        $newProduction->poster_img_caption = $submission['posterCaption'];

        $newProduction->title = $submission['title'];
        $newProduction->authors = $submission['authors'];
        $newProduction->blurb = $submission['blurb'];
        $newProduction->directors = $submission['directors'];
        $newProduction->choreographers = $submission['choreographers'];
        $newProduction->dates = $submission['dates'];
        $newProduction->location = $submission['location'];
        $newProduction->content_warning = $submission['contentWarning'];

        // Set additional fields to empty (added on other pages)
        $newProduction->land_acknowledgment = "";
        $newProduction->about_humber = "";
        $newProduction->special_thanks = "";

        // Save instance of production to database
        $newProduction->save();

        return redirect('/pm');
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
     * Display the edit form for the requested production
     * 
     * @param int $id
     */
    public function edit($id) {
        return view('productions.edit', PG_TITLE);
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

        return redirect('/pm');
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
