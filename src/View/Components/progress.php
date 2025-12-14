<?php

namespace MrShaneBarron\progress\View\Components;

use Illuminate\View\Component;

class progress extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-progress::components.progress');
    }
}
