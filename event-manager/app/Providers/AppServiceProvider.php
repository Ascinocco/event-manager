<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * Custom password, password confirmation and name validators
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Password Requirements:
         *  8 character minimum
         *  At least 1 number
         *  At least 1 uppercase
         *  At least 1 lowercase
         *
         * @attribute - name of the the attribute being validated
         * @value - the value of the attribute
         * @parameters - the parameters to validate the rule against
         * @validator - instance of the validator object
         */
        Validator::extend('password', function ($attribute, $value, $parameters, $validator){
            $uppercase = preg_match('@[A-Z]@', $value);
            $lowercase = preg_match('@[a-z]@', $value);
            $number    = preg_match('@[0-9]@', $value);

            if (!$uppercase || !$lowercase || !$number || strlen($value) < 8) {
                return false;
            } else {
                return true;
            }
        });

        /**
         * Allows for alpha and space characters as well as unicode characters
         * for names with special characters
         */
        Validator::extend('name', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
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
