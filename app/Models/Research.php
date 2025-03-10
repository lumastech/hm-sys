<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'business_id', 'user_id', 'category', 'image', 'description', 'visibility', 'status'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collaborations()
    {
        return $this->hasMany(ResearchCollaboration::class);
    }
}
