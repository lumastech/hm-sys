<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anouncement extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'image', 'importance', 'start_date', 'end_date', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
