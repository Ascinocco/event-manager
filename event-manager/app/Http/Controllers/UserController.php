<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * New controller instance with authentication checks
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Load the initital settings page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('settings.user.index', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        return $data;
    }
}