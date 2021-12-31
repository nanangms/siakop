<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Textarea_V extends Component
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

    
    public function __construct(
        $label = "",
        $id = "",
        $type = "text",
        $name = "",
        $value = "",
        $isRequired = false
    )
    {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.textarea_v');
    }
}
