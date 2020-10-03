<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title', 'body', 'thumbnail', 'subtitle', 'description', 'user_id', 'seo_title', 'video'
    ];


    public function fileCreate($file)
    {
        $name = $file->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $extension = $file->extension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $file->storeAs('img', $fileNameToStore);
        return $fileNameToStore;
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }
}
