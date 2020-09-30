<?php

namespace App\Http\Controllers\Admin\Author;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;
use Illuminate\Support\Facades\Hash;

class AdminAuthorController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $role = Role::where('name', 'author')->first();

        $authors = User::where('role_id', $role->id)->orderBy('name')->paginate(20);

        return view('admin.author.index', compact('authors'));
    }

    public function show(User $author)
    {
        $this->authorize('admin');

        $roles = Role::get();

        return view('admin.author.show', compact('author', 'roles'));
    }

    public function update(User $author, UserUpdateFormRequest $request)
    {
        $this->authorize('admin');

        if (auth()->user()->id === $author->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        if ($request->role === 'admin' || $request->role === 'superAdmin') {
            $this->authorize('superAdmin');
        }

        $author->updateUser($request);

        return back()->with([
            'author' => $author,
            'status' => 'Kullanıcı bilgileri güncellendi'
        ]);
    }

    public function destroy(User $author)
    {
        $this->authorize('admin');

        if (auth()->user()->id === $this->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        if ($author->role && ($author->role->name === 'admin' || $author->role->name === 'superAdmin')) {
            $this->authorize('superAdmin');
        }

        $author->delete();
        
        return back()->with([
            'status' => 'Kullanıcı silindi'
        ]);
    }
}
