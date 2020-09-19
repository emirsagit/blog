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
    public function index()
    {
        if(request('tag'))
        {
            $tag = request('tag');
            $articles = Tag::where('name', $tag)->firstOrFail()->articles;
            return view('article.index', compact('articles', 'tag'));
        }
        $articles = Article::with('tags')->latest()->paginate();
        $tags = $this->getAllUniqueTags($articles);
        return view('article.index', compact('articles', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('article.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateFormRequest $request)
    {
        $article = Article::create([
           'title' => $request->title, 
           'body' => $request->body, 
           'subtitle' => $request->subtitle, 
           'description' => $request->description, 
           'thumbnail' => $request->thumbnail, 
           'user_id' => 1
        ]);
        $article->tags()->attach($request->tags);
        return redirect(route('article.show', compact('article')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title, 
            'body' => $request->body, 
            'subtitle' => $request->subtitle, 
            'description' => $request->description, 
            'thumbnail' => $request->thumbnail, 
         ]);
         return redirect(route('article.show', compact('article')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
