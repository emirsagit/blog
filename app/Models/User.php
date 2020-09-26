<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'thumbnail', 'about', 'tel', 'address', 'interests', 'instagram', 'facebook', 'linkedin', 'twitter', 'github'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getInterestsAttribute($value)
    {
        return $value === null ? $value : explode(',', $value);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getAllRoles()
    {
        // if user have superadmin role adding admin and author role to this user make it easy to work. Otherwise 
        // we must have belongstoMany relationship and define more gates or policies 
        if ($this->role) {
            $roles = collect($this->role->name);
            if ($roles->contains('superAdmin')) {
                $roles->push('admin', 'author');
            } elseif ($roles->contains('admin')) {
                $roles->push('author');
            }
            return $roles;
        }
    }

    public function updateUser($request)
    {
        $columns = ['name', 'email', 'about', 'tel', 'address', 'interests', 'instagram', 'facebook', 'linkedin', 'twitter', 'github'];
        $this->isInRequestandSet($columns, $request);
        $this->password = $request->password ? Hash::make($request->password) : $this->password;
        if ($request->file('thumbnail')) {
            $this->fileUpload($request->file('thumbnail'));
        }
        //
        if (!$request->role) {
            $this->save();
            return;
        }

        if ($this->id === auth()->user()->id) {
            $this->save();
            return;
        }

        if ($request->role === 'guest') {
            $this->role_id = null;
            $this->save();
            return;
        }

        $role = Role::where('name', $request->role)->firstOrFail();
        $this->role_id = $role->id;
        $this->save();
    }

    public function fileUpload($file)
    {
        $name = $file->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $extension = $file->extension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $file->storeAs('img/users', $fileNameToStore);
        Storage::delete($this->thumbnail);
        $this->thumbnail = "/storage/img/users/" . $fileNameToStore;
    }

    public function isInRequestandSet($columns, $request)
    {
        foreach ($columns as $column) {
            $this->$column = $request->$column ? $request->$column : null;
        }
    }
}
