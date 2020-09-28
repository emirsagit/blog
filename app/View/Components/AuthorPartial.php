<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class AuthorPartial extends Component
{
    public $author;
    public function __construct(User $author)
    {
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.author-partial');
    }
}
