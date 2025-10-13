<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
        'itenerary',
        'gallery',
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'destination_id');
    }
    protected $casts = [
        'itenerary' => 'array',
        'gallery' => 'array',
    ];
    public function ThingToDos()
    {
        return $this->hasMany(ThingToDo::class, 'destination_id');
    }
}
