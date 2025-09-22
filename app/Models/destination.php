<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}
