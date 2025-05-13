<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = ['bed_number', 'room_id', 'status'];

    // Relationship: A bed belongs to a room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
