<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
    } 

    public function getRouteKeyName()
    {
        return 'slug';
    } 

    public function articles ()
    {
        return $this->belongsToMany(Article::class);
    } 
}
