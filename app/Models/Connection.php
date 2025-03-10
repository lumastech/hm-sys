<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'user_id', 'follow_id_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
