<?php

namespace MrShaneBarron\progress;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\progress\Livewire\progress;
use MrShaneBarron\progress\View\Components\progress as Bladeprogress;
use Livewire\Livewire;

class progressServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-progress.php', 'ld-progress');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-progress');

        Livewire::component('ld-progress', progress::class);

        $this->loadViewComponentsAs('ld', [
            Bladeprogress::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-progress.php' => config_path('ld-progress.php'),
            ], 'ld-progress-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-progress'),
            ], 'ld-progress-views');
        }
    }
}
