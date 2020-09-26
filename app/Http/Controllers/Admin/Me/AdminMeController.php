<?php

namespace App\Http\Controllers\Admin\Me;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;

class AdminMeController extends Controller
{
    public function index()
    {
        $this->authorize('author');
        $user = auth()->user();
        return view('admin.me.index', compact('user'));
    } 

    public function update(User $me, UserUpdateFormRequest $request)
    {
        $this->authorize('author');
        if (! $me->id === auth()->user()->id){
            abort(403);
        }
        $me->updateUser($request);
        return back()->with([
            'status' => 'Başarıyla güncellendi'
        ]);
    } 
}
