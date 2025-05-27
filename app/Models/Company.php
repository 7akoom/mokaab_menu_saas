<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company  extends Authenticatable
{
    protected $fillable = [
        'name',
        'domain',
        'email',
        'phone',
        'password',
        'start_date',
        'expire_date',
    ];


    public function casts()
    {
        return [
            'password' => 'hashed'
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInActive($query)
    {
        return $query->where('status', false);
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->status ? 'مفعلة' : 'غير مفعلة';
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return $this->status ? 'bg-gradient-success' : 'bg-gradient-danger';
    }

    public function logo()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function settings()
    {
        return $this->hasOne(\App\Models\Setting::class);
    }

    public function banner()
    {
        return $this->hasOne(\App\Models\Banner::class);
    }


    public function categories()
    {
        return $this->hasMany(\App\Models\Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class);
    }
}
