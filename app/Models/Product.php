<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'business_id', 'name', 'description', 'image', 'price', 'status'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
