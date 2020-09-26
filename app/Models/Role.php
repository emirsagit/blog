<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name', 'label'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    } 
}
