<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mybee(){
        return view('user_pages.mybee');
    } 
    
    public function notes(){
        return view('user_pages.notes');
    }
    public function profile(){
        return view('user_pages.profile');
    }
}
