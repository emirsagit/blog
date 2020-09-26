<?php

namespace App\Http\Controllers\Home;

use App\Models\Role;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'superAdmin')->first();
        $admins = User::where('role_id', $role->id)->get()->shuffle();
        $articles = Article::with('tags', 'author')->latest()->paginate(5);
        return view('home.index', compact('articles', 'admins'));
    } 
}
