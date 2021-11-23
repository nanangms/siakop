<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadchumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $link1;
    public $link2;
    public $menu1;
    public $menu2;
    public $menu3;
    public function __construct($title,$menu2=null,$menu3=null,$link2=null,$menu1=null,$link1=null)
    {
        $this->title = $title;
        $this->link1 = $link1;
        $this->menu1 = $menu1;
        $this->link2 = $link2;
        $this->menu2 = $menu2;
        $this->menu3 = $menu3;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.breadchumb');
    }
}
