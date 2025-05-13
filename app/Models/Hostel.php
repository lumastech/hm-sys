<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model {
    protected $fillable = ['name', 'address', 'vendor_id', 'description', 'status'];

    // Relationship: A hostel belongs to a vendor (User)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    // Relationship: A hostel has many rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
