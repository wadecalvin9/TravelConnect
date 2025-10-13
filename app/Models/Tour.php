<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'destination_id',
        'name',
        'description',
        'image',
        'price',
        'special',
        'popular',
        'duration',
        'itenary',
        'images',
    ];


    public function destination()
    {
        return $this->belongsTo(destination::class, 'destination_id');
    }

     protected $casts = [
        'itenary' => 'array',
        'images' => 'array',
    ];

    public function ThingToDos()
    {
        return $this->hasMany(ThingToDo::class, 'tour_id');
    }
}
