<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;

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

    public function profile($slug)
    {
        
        $profile = User::where('slug', $slug)->first();
        if(!$profile)
            abort(404);
        return view('profile')->with('profile', $profile);
    }

    public function me()
    {

    }
}
