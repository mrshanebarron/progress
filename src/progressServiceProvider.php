<?php

namespace MrShaneBarron\Progress;

use Illuminate\Support\ServiceProvider;

class ProgressServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-progress', Livewire\Progress::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-progress');
    }
}
