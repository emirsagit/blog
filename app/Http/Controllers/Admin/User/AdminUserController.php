<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $users = User::where('role_id', null)->orderBy('name')->paginate(20);
        
        return view('admin.user.index', compact('users'));
    }

    public function show(User $user)
    {
        $this->authorize('admin');

        return view('admin.user.show', compact('user'));
    }

    public function update(User $user, UserUpdateFormRequest $request)
    {
        $this->authorize('admin');
        if (auth()->user()->id === $user->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        if ($request->role === 'admin' || $request->role === 'superAdmin') {
            $this->authorize('superAdmin');
        }

        $user->updateUser($request);

        return back()->with([
            'user' => $user,
            'status' => 'Kullanıcı bilgileri güncellendi'
        ]);
    }

    public function destroy(User $user)
    {
        $this->authorize('admin');

        if (auth()->user()->id === $this->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        if ($user->role && ($user->role->name === 'admin' || $user->role->name === 'superAdmin')) {
            $this->authorize('superAdmin');
        }

        $user->delete();

        return back()->with([
            'status' => 'Kullanıcı silindi'
        ]);
    }
}
