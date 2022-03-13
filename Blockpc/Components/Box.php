<?php

namespace Blockpc\Components;

use Illuminate\View\Component;

class Box extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('blockpc::components.box');
    }
}