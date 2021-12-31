<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input_H extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $id;
    public $type;
    public $name;
    public $value;
    public $isRequired;
    public $isReadonly;
    public $placeholder;
    
    public function __construct(
        $label = "",
        $id = "",
        $type = "text",
        $name = "",
        $value = "",
        $isRequired = false,
        $isReadonly = false,
        $placeholder = ""
    )
    {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
        $this->isReadonly = $isReadonly;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.input_h');
    }
}
