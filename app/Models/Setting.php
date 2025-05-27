<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company_id',
        'theme',
        'primary_color',
        'secondary_color',
        'about_us',
        'email',
        'phone_1',
        'phone_2',
        'address_1',
        'address_2',
        'facebook_url',
        'instagram_url'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
