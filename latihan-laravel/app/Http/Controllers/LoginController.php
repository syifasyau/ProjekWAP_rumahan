<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if(!$user) {
            return redirect()->back()->with('error', "Email or password is invalid!");
        }

        if(!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', "Email or password is invalid!");
        }
        
        $request->session()->put('id', $user->id);
        $request->session()->put('name', $user->name);
        $request->session()->put('email', $user->email);
        $request->session()->put('is_logged_in', true);

        return redirect()->route('index')->with('success', "Howdy, " . $user->name . "!");
    }
}
