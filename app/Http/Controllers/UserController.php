<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        // Obtain all users
        $users = User::all();

        return view('users.list', [ 'title' => 'Users', 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('users.add', [ 'title' => 'Users' ]);
    }

    /**
     * Add a new user to the database
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Retrieve the user submitted data
        $submission = $request->all();
        // Create a new instance of a user
        $newUser = new User();
        // Add the user submitted data to the newly created user instance
        $newUser->name = $submission['name'];
        $newUser->email = $submission['email'];
        // Hash the entered password
        $newUser->password = Hash::make($submission['password']);

        // Save the newly created user
        $newUser->save();

        return redirect('/pm/users');
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
        return view('users.edit', [ 'title' => 'Users' ]);
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
        return redirect('/pm/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Find the user associated with the id
        $userToBeRemoved = User::find($id);
        // Delete the user
        $userToBeRemoved->delete();
        
        return redirect('/pm/users');
    }
}
