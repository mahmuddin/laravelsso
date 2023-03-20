<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function getDifferentAccount(Request $request)
    {
        // Log out the current user
        Auth::logout();
        // Set the intended url to the authorize utl
        Session::put("url.intended", $request->current_url);
        // redirect to login form
        return redirect("login");
    }
}
