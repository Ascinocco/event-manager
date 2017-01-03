<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \App\User;
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

    /**
     * Updates user account information
     *
     * @param Request $request
     * @return array - user object
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email'
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return ['user' => $user];
    }

    public function delete()
    {
        $user = Auth::user();
        if ($user->delete()) {
            return ["success" => "true"];
        } else {
            return ["error" => "true", "msg" => "Could not delete account"];
        }
    }
}