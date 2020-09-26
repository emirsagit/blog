<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Tag;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateFormRequest;

class AdminArticleController extends Controller
{
    public function index()
    {
        $this->authorize('author');

        $userRole = auth()->user()->role->name;
        if ($userRole === "admin" || $userRole === "superAdmin") {
            $articles = Article::with('author')->orderBy('title')->paginate(20);
        } else {
            $articles = auth()->user()->articles()->orderBy('title')->paginate(20);
        }

        return view('admin.article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $user = auth()->user();
        if ($user->id != $article->user_id) {
            $userRole = $user->role->name;
            $userRole === "admin" || $userRole === "superAdmin" ? true : abort(403);
        }

        $tags = Tag::all();

        return view('admin.article.show', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleCreateFormRequest $request)
    {
        $user = auth()->user();
        if ($user->id != $article->user_id) {
            $userRole = $user->role->name;
            $userRole === "admin" || $userRole === "superAdmin" ? true : abort(403);
        }

        if ($request->file('thumbnail')) {
            $article->fileUpload($request->file('thumbnail'));
        }

        if ($request->tags) {
            $article->tags()->sync($request->tags);
        }

        $article->update($request->only([
            'title', 'body', 'subtitle', 'description', 'seo_title', 'video'
        ]));
        

        return redirect()->back()->with([
            'status' => "Başarıyla güncellendi"
        ]);
    }

    public function create()
    {
        return view('admin.article.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(ArticleCreateFormRequest $request)
    {
        $user = auth()->user();

        if ($request->file('thumbnail')) {
            $fileNameToStore = $article->fileCreate($request->file('thumbnail'));
        }
        $fileNameToStore = "noimage.jpg";

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'video' => $request->video,
            "user_id" => $user->id,
            "thumbnail" => "/storage/img/" . $fileNameToStore
        ]);

        $article->tags()->attach($request->tags);

        return redirect()->back()->with([
            'status' => "Başarıyla eklendi"
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with([
            'status' => "Makale silindi"
        ]);
    } 
}
