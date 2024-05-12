<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Profile;
use App\Models\Kontak;

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
        View::share('tentangkamis', Profile::where('status',1)->orderby('judul')->get());
        View::share('kontak', Kontak::where('id',1)->first());
    }
}
