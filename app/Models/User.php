<?php

namespace App\Models;

use App\File\File;
use App\Models\Role;
use App\Models\Article;
use Illuminate\Support\Arr;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function getRouteKeyName()
    {
        return 'username';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'thumbnail', 'about', 'tel', 'address', 'interests', 'instagram', 'facebook', 'linkedin', 'twitter', 'github', 'username'
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
        // if (! $value) {
        //     return $value;
        // }
        // return Arr::wrap($value);   
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
        $roles = collect($this->role->name);
        if ($roles->contains('superAdmin')) {
            $roles->push('admin', 'author');
        } elseif ($roles->contains('admin')) {
            $roles->push('author');
        }
        return $roles;
    }

    public function updateUser($request)
    {
        $columns = ['name', 'email', 'about', 'tel', 'address', 'interests', 'instagram', 'facebook', 'linkedin', 'twitter', 'github'];
        $this->isInRequestandSet($columns, $request);
        $this->password = $request->password ? Hash::make($request->password) : $this->password;
        if ($request->file('thumbnail')) {
            $file = new File($request->file('thumbnail'), $this->thumbnail, "img/users/");
            $file->deleteFile("/img/noimage.png");
            $this->thumbnail = $file->uploadFile();
        }
        //me'den işlem yapıyorsak ya da role değişikliği yoksa
        if (! $request->role) {
            $this->save();
            return;
        }

        //me den işlem yapıyorsak kötü niyetli üye için
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

    public function isInRequestandSet($columns, $request)
    {
        foreach ($columns as $column) {
            $this->$column = $request->$column ? $request->$column : null;
        }
    }
}
