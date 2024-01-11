<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomevalidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        validator::extend('custom_password',function($attribute,$value,$parameter,$validator){
            return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])[\S]{8,}$/',$value);
        });
        validator::replacer('custom_password',function($message, $attribute, $rule, $parameters){
            return str_replace(':attribute', $attribute, 'The :attribute must contain at least one capital letter, one small letter, one number, one special character, and be at least 8 characters long.');
        });
    }
}
