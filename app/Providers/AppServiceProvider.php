<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Used for user name validation
         */
        Validator::extend('alpha_with_spaces', function($value) {
            if (preg_match('/^[a-zA-Z ]+$/i', $value))
            {
                return true;
            } else
            {
                return false;
            }
        });

        /**
         * Used for role validation
         * Probably needed later...
         */
//        Validator:extend('valid_role', function($value) {
//            $roles = [
//                'USER',
//                'ADMIN'
//            ];
//
//            foreach ($roles as $role)
//            {
//                if ($role === $value)
//                {
//                    return true;
//                }
//            }
//
//            return false;
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
