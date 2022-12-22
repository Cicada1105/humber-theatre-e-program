<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\FacultyInvolvement;
use App\Models\FacultyRole;
use App\Models\Production;

define('PG_TITLE', [ 'title' => 'Faculty' ]);

class FacultyController extends Controller
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
        // Retrieve all faculty
        $faculty = Faculty::all();
        // Retrieve faculty roles
        $facultyRoles = FacultyRole::all();

        // Pass in id of current active program
        return view('faculty.list', [ 'title' => 'Faculty', 'faculty' => $faculty, 'faculty_roles' => $facultyRoles, 'active_program' => $activeProgram ]);
    }

    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('faculty.add', PG_TITLE);
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Retrieve the sumitted request data
        $submission = $request->all();
        // Create a new Faculty
        $newFacultyMember = new Faculty();
        // Store submitted values into the newly created faculty attributes
        $newFacultyMember->first_name = $submission['firstName'];
        $newFacultyMember->last_name = $submission['lastName'];
        // Save newly created Faculy 
        $newFacultyMember->save();
        
        return redirect($request->root() . '/pm/faculty');
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
        return view('faculty.details', PG_TITLE);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the faculty member associated with the requested id
        $faculty = Faculty::find($id);

        return view('faculty.edit', [ 'title' => 'Faculty', 'faculty' => $faculty ]);
    }

    /**
     * Update a single faculty member
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve the user submitted data
        $submission = $request->all();
        // Find the specified faculty member assocatiated with this request
        $facultyToBeUpdated = Faculty::find($id);
        // Update respective fields of the faculty member
        $facultyToBeUpdated->first_name = $submission["firstName"];
        $facultyToBeUpdated->last_name = $submission["lastName"];
        // Save the changes applied to the faculty member
        $facultyToBeUpdated->save();

        return redirect($request->root() . '/pm/faculty');
    }

    /**
     * Update all faculty members active "status" in being in current production
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateActiveFaculty(Request $request) {
        // ‰etrieve the active program
        $activeProgram = Production::where('is_active', 1)->first();
        // Reset/remove faculty involvement in the current active program
        FacultyInvolvement::where('production_id', $activeProgram->id)->delete();
        // Retrieve the faculty from the requet
        $submittedFaculty = $request->all();
        
        // Check if any faculty where submitted
        if (isset($submittedFaculty['faculty'])) {
            // Loop through submitted faculty, save the selected active faculty to the involvement table
            foreach($submittedFaculty['faculty'] as $facultyId=>$info) {
                // Only include faculty that have been set to active
                if (isset($info['is_active'])) {
                    // Create a new faculty involvement model instance
                    $involvement = new FacultyInvolvement();
                    // Assign respective attributes
                    $involvement->production_id = $activeProgram->id;
                    $involvement->faculty_id = $facultyId;
                    $involvement->faculty_role_id = $info['role'] ?? null;

                    // Save newly created faculty involvement
                    $involvement->save();
                }
            }
        }

        return redirect($request->root() . '/pm/faculty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        // Check if the faculty is currently involved with any program
        $facultyInvolvement = FacultyInvolvement::where('faculty_id', $id)->get();

        if (count($facultyInvolvement)) { // Faculty is currently involved in a program
            // Retrieve the faculty member info for a personalized error
            $facultyMember = $facultyInvolvement[0]->faculty;
            // Return back to the faculty list page with an error message
            $errMsg = "{$facultyMember->first_name} {$facultyMember->last_name} cannot be deleted. {$facultyMember->first_name} {$facultyMember->last_name} is currently involved in one or more programs";
            return back()->withErrors([ 'err' => $errMsg ]);
        }
        // Find the faculty to be deleted
        $facultyToBeDeleted = Faculty::find($id);
        // Remove the faculty based on the passed in id
        $facultyToBeDeleted->delete();

        return redirect($request->root() . '/pm/faculty');
    }
}
