<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\View\Component;

class CommentsPartial extends Component
{
    public $article;
    public $comments;
    
    public function __construct($article, $comments)
    {
        $this->article = $article;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.comments-partial');
    }
}
