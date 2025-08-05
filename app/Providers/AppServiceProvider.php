<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('status_buttons', function($expression){
            return "<?php echo view('components.status_buttons', ['json' => $expression])->render(); ?>";
        });
        Blade::directive('action_buttons', function($expression){
            return "<?php echo view('components.action_buttons', ['json' => $expression])->render(); ?>";
        });
    }
}
