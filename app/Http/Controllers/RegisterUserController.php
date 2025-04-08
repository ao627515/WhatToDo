<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        // Create the user
        $user = User::create($validatedData);

        // Log the user in
        Auth::login($user);

        return redirect()->route('todos.index');
    }
}
