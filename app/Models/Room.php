<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    protected $fillable = ['room_number', 'hostel_id', 'capacity', 'status'];

    // Relationship: A room belongs to a hostel
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    // Relationship: A room has many beds
    public function beds()
    {
        return $this->hasMany(Bed::class);
    }
}