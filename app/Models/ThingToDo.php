<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThingToDo extends Model
{
    protected $fillable = [
        'destination_id',
        'tour_id',
        'title',
        'description',
        'image',
    ];

    public function destination()
    {
        return $this->belongsTo(destination::class, 'destination_id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
