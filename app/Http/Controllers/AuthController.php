<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Services\AuthServiceInterface;

class AuthController extends Controller
{

    protected AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($this->authService->signin($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('todos.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signout(Request $request)
    {
        $this->authService->signout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('signin'));
    }
}
