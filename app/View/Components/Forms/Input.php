<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $type;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $type, $placeholder = NULL)
    {
        $this->id = $id;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
