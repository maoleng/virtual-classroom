<?php

namespace App\Providers;

use App\Models\Course;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer([
            'theme.master'
        ], static function ($view) {
            $data = [
                'courses' => Course::query()->orderByDesc('created_at')->limit(10)->get(),
            ];

            $view->with($data);
        });
    }
}
