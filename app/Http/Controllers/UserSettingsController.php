<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    /**
     * Loads view for editing user account
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.edit', ['user' => Auth::user()]);
    }

    /**
     * Handles updating the users account info
     * @param Request $request
     * @return Response $response
     */
    public function update(Request $request)
    {
        $this->commonValidation($request);

        if ($request->input('password'))
        {
            $this->validatePassword($request);
        }

        $user = Auth::user();
        $user->name  = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password'))
        {
            $user->password = $request->input('password');
        }

        if($user->save())
        {
            $data = [
                'error'   => false,
                'message' => 'Your account has been updated.',
                'user'    => $user,
            ];

            return response()->json($data, 200);
        } else
        {
            $data = [
                'error'   => true,
                'message' => 'An error occured updating your account.',
                'user'    => $user,
            ];

            return response()->json($data, 500);
        }
    }

    /**
     * Validate common fields
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    private function commonValidation(Request $request)
    {
        $rules = [
            'name'  => 'alpha_with_spaces|required|max:100',
            'email' => 'unique:users,email_address|required|email',
            'role'  => 'alpha'
        ];

        $validator = Validator::make($request, $rules);

        if ($validator->fails())
        {
            return response()->json($validator->messages(), 400);
        }

        return null;
    }

    /**
     * Validate users updated password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function validatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed'
        ];

        $validator = Validator::make($request, $rules);

        if ($validator->fails())
        {
            return response()->json($validator->messages(). 400);
        }

        return null;
    }
}
