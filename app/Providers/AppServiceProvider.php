<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        //Paginator::useBootstrapFive(); -> for using this you have to add bootstrap cdn
//        Gate::define('edit', function (User $user, Job $job){
//            return $job->employer->user->is($user);
//        });
    }
}
