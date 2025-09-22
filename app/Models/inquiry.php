<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'people',
        'message',
        'date',
        'destination_id',
        'tour_id',
        'user_id',
    ];


    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
