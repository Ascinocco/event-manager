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
     * TODO: Password reset
     * TODO: profile picture upload and change
     *
     *
     * @param Request $request
     * @return array - user object
     */
    public function update(Request $request)
    {
        if($request->input('oldPassword')){
            $this->validate($request, [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'oldPassword' => 'password',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|max:50',
                'email' => 'required|email',
            ]);
        }

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return ['user' => $user];
    }

    /**
     * Delete's logged in user
     * TODO: proper return messages and status codes
     *
     * @return array - success or failure messages
     */
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