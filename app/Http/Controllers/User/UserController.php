<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', null)->latest()->get();
        return view('user.index', compact('users'));
    }

    public function show()
    {
        //normal kullanıcılar için de aynı tabloyu kullandığım için route model binding kullanmadım.s
        $user = User::where('role_id', '!=', null)->where('username', request('user'))->with('articles')->firstOrFail();
        return view('user.show', compact('user'));
    }
}
