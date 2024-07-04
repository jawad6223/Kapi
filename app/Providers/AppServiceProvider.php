<?php

namespace App\Providers;



use App\Models\post;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    

        $post1 =post::where('status',0)->count();
            View::share('post1', $post1); 




 
}
}
