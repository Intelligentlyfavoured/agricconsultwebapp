<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farmer;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $farmer = Farmer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($farmer);

        return redirect()->route('farmer.home')->with('success', 'Registration successful');
    }
}
