<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $legend;
    public $id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $id)
    {
        $this->legend = $legend;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.checkbox');
    }
}
