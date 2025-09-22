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
        return $this->belongsTo(Destination::class, 'destination_id');
    }

     protected $casts = [
        'itenary' => 'array',
        'images' => 'array',
    ];
}
