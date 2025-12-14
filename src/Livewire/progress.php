<?php

namespace MrShaneBarron\Progress\Livewire;

use Livewire\Component;

class Progress extends Component
{
    public int|float $value = 0;
    public int $max = 100;
    public string $size = 'md';
    public string $color = 'blue';
    public string $type = 'bar';
    public bool $showValue = false;
    public bool $striped = false;
    public bool $animated = false;

    public function mount(
        int|float $value = 0,
        int $max = 100,
        string $size = 'md',
        string $color = 'blue',
        string $type = 'bar',
        bool $showValue = false,
        bool $striped = false,
        bool $animated = false
    ): void {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
        $this->showValue = $showValue;
        $this->striped = $striped;
        $this->animated = $animated;
    }

    public function getPercentage(): float
    {
        return min(100, max(0, ($this->value / $this->max) * 100));
    }

    public function render()
    {
        return view('ld-progress::livewire.progress');
    }
}
