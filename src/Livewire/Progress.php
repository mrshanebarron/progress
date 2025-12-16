<?php

namespace MrShaneBarron\Progress\Livewire;

use Livewire\Component;

class Progress extends Component
{
    public int|float $value = 0;
    public int|float $max = 100;
    public string $size = 'md';
    public string $color = 'blue';
    public bool $showLabel = false;
    public bool $striped = false;
    public bool $animated = false;

    public function mount(int|float $value = 0, int|float $max = 100, string $size = 'md', string $color = 'blue', bool $showLabel = false, bool $striped = false, bool $animated = false): void
    {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->color = $color;
        $this->showLabel = $showLabel;
        $this->striped = $striped;
        $this->animated = $animated;
    }

    public function getPercentage(): float
    {
        return $this->max > 0 ? min(100, ($this->value / $this->max) * 100) : 0;
    }

    public function render()
    {
        return view('sb-progress::livewire.progress');
    }
}
