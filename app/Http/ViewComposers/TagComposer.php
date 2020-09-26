<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;


class TagComposer
{
    //birden fazla query sorgusu yapmamak için bu yöntemi kullandık.
    private $_tags;
    public function compose(View $view)
    {
        if (!$this->_tags) {
            $this->_tags = Tag::with('articles')->paginate(20);
        }
        return $view->with([
            'tags' => $this->_tags,
        ]);
    }
}
