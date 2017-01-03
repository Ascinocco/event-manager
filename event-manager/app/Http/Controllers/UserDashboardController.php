<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * New controller with auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Load initial dashboard page
     */
    public function index()
    {
        // get events assoc with user

        // send user events to view
        return view('dashboard.user.index');
    }

    /**
     * Create Events
     */
    public function createEvent()
    {
        return [
            "success" => true,
            "msg" => "Testing, reporting success for now"
        ];
    }
}