<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'user_id', 'contact_id', 'name', 'type', 'category', 'subcategory', 'description', 'logo', 'image_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function researches()
    {
        return $this->hasMany(Research::class);
    }
}
