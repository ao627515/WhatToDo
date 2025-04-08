<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function showLoginForm()
    {
        return view('pages.auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function signin(Request $request)
    {
        //
    }

    public function signout(Request $request)
    {
        //
    }
}
