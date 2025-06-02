<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'type',
        'manufacture',
        'price',
        'discount',
        'qty',
        'dimention',
        'size',
        'color',
        'delivery',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
