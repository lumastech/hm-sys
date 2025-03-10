<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    protected $fillable = [
        'attended_by', 'phone', 'email', 'name', 'subject', 'description', 'image', 'status'
    ];

    public function attendedBy()
    {
        return $this->belongsTo(User::class, 'attended_by');
    }
}