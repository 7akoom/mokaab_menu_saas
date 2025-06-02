<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'position',
        'description'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
