<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function loginForm() {
        return view('login', [ 'title' => 'Dashboard']);
    }
    public function login(Request $request) {
        // Validate the users input
        $validationAttempt = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        // Ensure that the valid data is found in the database
        if (Auth::attempt($validationAttempt)) {
            // Reset the user's session
            $request->session()->regenerate();

            return redirect('/pm');
        }

        return back()->withErrors([ 'err' => 'Invalid Credentials' ]);
    }
    public function logout() {
        // Clear user's access by logging them out
        Auth::logout();
        return redirect('/');
    }
}
