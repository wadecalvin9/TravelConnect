<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
            'sitename',
            'email',
            'phone',
            'address',
            'facebook',
            'twitter',
            'instagram',
            'youtube',
            'hero_image',
            'hero_title',
            'hero_description',
            'about_title',
            'about_description',
            'mission',
            'vision'
    ];
}
