<?php

namespace App\Http\Controllers\Admin\Administrator;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;

class AdminAdministratorController extends Controller
{
    public function index()
    {
        $this->authorize('superAdmin');

        $admins = User::where(function ($q) {
            $roleAdmin = Role::where('name', 'admin')->first();
            $roleSuperAdmin = Role::where('name', 'superAdmin')->first();    
            $q->where('role_id', $roleAdmin->id)
                ->orWhere('role_id', $roleSuperAdmin->id);
        })
            ->with('role')
            ->paginate(20);

        return view('admin.administrator.index', compact('admins'));
    }

    public function show(User $admin)
    {
        $this->authorize('superAdmin');

        $roles = Role::get();

        return view('admin.administrator.show', compact('admin', 'roles'));
    }

    public function update(User $admin, UserUpdateFormRequest $request)
    {
        $this->authorize('superAdmin');

        if (auth()->user()->id === $admin->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        $admin->updateUser($request);

        return back()->with([
            'admin' => $admin,
            'status' => 'Kullanıcı bilgileri güncellendi'
        ]);
    }

    public function destroy(User $admin)
    {
        $this->authorize('superAdmin');

        if (auth()->user()->id === $admin->id) {
            abort(403, 'Bu bölümden kendi profilinizde değişiklik yapamazsınız. Değişiklik için lütfen hesabım bölümünü kullanın...');
        }

        $admin->delete();
        
        return back()->with([
            'status' => 'Kullanıcı silindi'
        ]);
    }
}
