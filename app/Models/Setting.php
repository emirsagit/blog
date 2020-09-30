<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'about', 'logo', 'tel', 'email', 'whatsapp', 'facebook', 'instagram', 'linkedin', 'twitter', 'github', 'homeTitle', 'homeSubtitle', 'contactTitle', 'contactSubtitle', 'authorTitle', 'authorSubtitle', 'categoryTitle', 'categorySubtitle', 'homeSeoTitle', 'homeSeoDescription', 'categorySeoTitle', 'categorySeoDescription', 'contactSeoTitle', 'contactSeoDescription', 'authorSeoTitle', 'authorSeoDescription',
    ];

    

}
