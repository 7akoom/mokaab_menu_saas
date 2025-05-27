<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['company_id', 'title', 'main_text', 'sub_text'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
