<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'user_id', 'business_id', 'type', 'category', 'title', 'description', 'image', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function threads()
    {
        return $this->hasMany(ForumThread::class);
    }
}
