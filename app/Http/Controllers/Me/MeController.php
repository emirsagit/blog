<?php

namespace App\Http\Controllers\Me;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;

class MeController extends Controller
{
    public function index()
    {
        return view('me.index');
    }

    public function update(User $me, UserUpdateFormRequest $request)
    {
        $this->authorize('author');
        if (!$me->id === auth()->user()->id) {
            abort(403);
        }
        $me->updateUser($request);
        return back()->with([
            'status' => 'Başarıyla güncellendi'
        ]);
    }
}
