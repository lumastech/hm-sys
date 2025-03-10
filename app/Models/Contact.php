<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id', 'priority', 'name', 'phone', 'phone_2', 'email', 'address', 'city', 'district', 'province', 'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
