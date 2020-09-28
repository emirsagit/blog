<?php

namespace App\Http\Controllers\Comment;

use App\Models\Role;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'body' => 'required|min:4'
        ]);
        $attributes['user_id'] = request()->user()->id;
        if($parent = $request->parent) {
            $attributes['comment_id'] = $parent;
        }
        $article = Article::where('slug', $request->article)->firstOrFail();
        $article->comments()->create($attributes);

        $users = $this->getAdminsAndArticleAuthor($article);
        Notification::send($users ,new CommentNotification($article, $request->body));
        return redirect()->back()->with([
            'status' => 'Yorumunuz kaydedildi.'
        ]);
    } 

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment);
        $article = Article::where('slug', $request->article)->firstOrFail();
        $user = auth()->user();
        if ($user->id === $article->user_id || $user->can('admin') || $user->id === $comment->user_id)
        {
            $comment->delete();
        }
        return redirect()->back()->with([
            'status' => 'Yorum silindi'
        ]);
    } 

    protected function getAdminsAndArticleAuthor($article)
    {
        $users = User::where(function ($q) {
            $roleAdmin = Role::where('name', 'admin')->first();
            $roleSuperAdmin = Role::where('name', 'superAdmin')->first();    
            $q->where('role_id', $roleAdmin->id)
                ->orWhere('role_id', $roleSuperAdmin->id);
        })
            ->get();
        if ($article->author->role->name === "author") {
            $users->push($article->author);
        }
        return $users;
    } 
}
