<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to authenticate as a farmer
        if (Auth::guard('farmers')->attempt($fields)) {
            return redirect()->route('farmer.home')->with('success', 'Login successful');
        }

        // Attempt to authenticate as a consultant
        if (Auth::guard('consultants')->attempt($fields)) {
            return redirect()->route('consultant.home')->with('success', 'Login successful');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
