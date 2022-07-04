<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $title, $name, $type, $autofocus, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $type, $autofocus = null, $value = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->type = $type;
        $this->autofocus = $autofocus;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
