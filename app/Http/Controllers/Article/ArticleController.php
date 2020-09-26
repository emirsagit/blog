<?php

namespace App\Http\Controllers\Article;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateFormRequest;
use PhpParser\ErrorHandler\Collecting;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        if(request('tag'))
        {
            $articles = $tag->articles()->get();
            return view('article.index', compact('articles', 'tag'));
        }
        $articles = Article::with('tags')->latest()->paginate();
        $tags = $this->getAllUniqueTags($articles);
        return view('article.index', compact('articles', 'tags'));
    }


    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }


    protected function getAllUniqueTags($articles)
    {
        return $articles
        ->pluck('tags')
        ->flatten()
        ->pluck('name')
        ->unique()
        ->map(function ($article) {
            return ucwords($article);
        });
    } 
}
