<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        if (auth()->user()->roles->first()) {
            return view('home');
        }

        return redirect()->route('home');
    }
}
