<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Auth\TokenGuard;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        /*Auth::extend('api_token', function ($app, $name, array $config) {
            return new TokenGuard(Auth::createVolunteerProvider($config['provider']), $app->request);
        });*/
        //
        Passport::routes();
        Passport::personalAccessClientId('client-id');
        //Passport::ignoreMigrations();
        //Passport::loadKeysFrom('C:/Users/Delilah Dessalegn/Documents/Bluemoon/Corona-Volunteer/storage');
       
    }
}
