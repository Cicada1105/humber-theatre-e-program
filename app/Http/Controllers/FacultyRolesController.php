<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FacultyRole;

class FacultyRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        // Retrieve all faculty roles
        $facultyRoles = FacultyRole::all();

        return view('faculty-roles.list', [ 'title' => 'Faculty Roles', 'faculty_roles' => $facultyRoles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('faculty-roles.add', [ 'title' => 'Faculty Roles' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Retrieve the submitted request data
        $submission = $request->all();
        // Create a new faculty role
        $newFacultyRole = new FacultyRole();
        // Store the submitted valeus into the newly crated FacultyRole attributes
        $newFacultyRole->role = $submission['roleName'];
        // Save the newly created faculty role
        $newFacultyRole->save();

        // Redirect back to the list page
        return redirect($request->root() . '/pm/faculty-roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the faculty role associated with the requested id
        $facultyRole = FacultyRole::find($id);

        return view('faculty-roles.edit', [ 'title' => 'Faculty Roles', 'faculty_role' => $facultyRole ]);
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
        // Retrieve the submitted request data
        $submission = $request->all();
        // Retrieve the FacultyRole to be updated based on the passed in id
        $facultyRoleToBeUpdated = FacultyRole::find($id);
        // Update respective fields of the faculty role
        $facultyRoleToBeUpdated->role = $submission['roleName'];
        // Save the changes applied to the faculty role
        $facultyRoleToBeUpdated->save();

        // Redirect back to the list of faculty roles
        return redirect($request->root() . '/pm/faculty-roles');
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
        return redirect($request->root() . '/pm/faculty-roles');
    }
}
