<?php

namespace App\View\Components;

use Illuminate\View\Component;

class titlePartial extends Component
{
    public $title;
    public $subtitle;
    public function __construct($title, $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.title-partial');
    }
}
