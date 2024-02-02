<?php

namespace App\View\Components;

use Illuminate\View\Component;

class master extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */public $titre;
    public function __construct($titre)
    {
        $this->titre=$titre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.master');
    }
}
