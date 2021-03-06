<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('event-manager.dashboard');
    }

    /**
     * Show landing page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landing()
    {
        return view('landing');
    }
}
