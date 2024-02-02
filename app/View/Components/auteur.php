<?php

namespace App\View\Components;

use Illuminate\View\Component;

class auteur extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $auteurs;
    public function __construct($auteurs)
    {
       $this->auteurs=$auteurs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auteur');
    }
}
