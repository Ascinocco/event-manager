<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
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
        return view('settings.user.vue', ['user' => $user]);
    }

    public function getUser()
    {
        return response()->json(Auth::user());
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
        // check if we have passwords or not
        if($request->input('oldPassword')){

            // validate user data
            $this->validate($request, [
                'name' => 'name|required|max:50',
                'email' => 'required|email',
                'oldPassword' => 'password|required',
                'newPassword' => 'password|required',
                'confirmPassword' => 'password|required',
            ]);

            // check if password match
            $newPassword = $request->input('newPassword');
            $confirmPassword = $request->input('confirmPassword');

            if ($newPassword !== $confirmPassword) {
                return [
                    'error' => true,
                    'msg' => 'New Password and Confirmation password do not match',
                ];
            }

            // need the user to check if old password is the password in the db
            $user = Auth::user();
            $oldPassword = $request->input('oldPassword');

            //check the password
            if (!Hash::check($oldPassword, $user->password)) {
                return [
                    'error' => true,
                    'msg' => 'Your old password does not match the password we have on file for you.',
                ];
            }

            // update the user
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($newPassword);

            if ($user->save()) {
                return [
                    'success' => true,
                    'msg' => 'Account Information Updated!',
                    'user' => $user,
                ];
            } else {
                return [
                    'error' => true,
                    'msg' => 'An error occurred updating your account. Please try again.',
                    'user' => $user,
                ];
            }


        }

        // if we don't have a password validate other fields
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);

        // update user
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->save()) {
            return [
                'success' => true,
                'msg' => 'Account Information Updated!',
                'user' => $user,
            ];
        } else {
            return [
                'error' => true,
                'msg' => 'An error occurred updating your account. Please try again.',
                'user' => $user,
            ];
        }
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