<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select_H extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $id;
    public $name;
    public $isRequired;
    public $isSelect2;

    public function __construct($label = "",
        $id = "",
        $name = "",
        $isRequired = false,
        $isSelect2 = false)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->isRequired = $isRequired;
        $this->isSelect2 = $isSelect2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.select_h');
    }
}
