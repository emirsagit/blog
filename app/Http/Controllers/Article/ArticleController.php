<?php

namespace App\Http\Controllers\Article;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use MeiliSearch\Endpoints\Indexes;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // MeiliSearch is typo-tolerant:
        $articles = Article::search($request->search)->paginate();
        return view('article.index', compact('articles'));
        // Or if you want to get the result from meilisearch:
    }

    public function index()
    {
        if ($requestTag = request('tag')) {
            $tag = Tag::where('slug', $requestTag)->firstOrFail();
            $articles = $tag->articles()->with('tags')->get();
            return view('article.index', compact('articles', 'tag'));
        } elseif (request('user')) {
            $user = User::where('username', request('user'))->firstOrFail();
            $articles = $user->articles()->with('tags')->get();
            return view('article.index', compact('articles', 'user'));
        }
        $articles = Article::with('tags', 'author')->latest()->paginate();
        return view('article.index', compact('articles'));
    }


    public function show(Article $article)
    {
        $article = $article->load('author');
        $comments = $article->comments()->where('comment_id', null)->with('children', 'user', 'children.user')->latest()->get();
        return view('article.show', compact('article', 'comments'));
    }


    // protected function getAllUniqueTags($articles)
    // {
    //     return $articles
    //     ->pluck('tags')
    //     ->flatten()
    //     ->pluck('name')
    //     ->unique()
    //     ->map(function ($article) {
    //         return ucwords($article);
    //     });
    // } 
}
