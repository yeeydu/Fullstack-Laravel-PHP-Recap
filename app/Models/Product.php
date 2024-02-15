<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'summary',
        'description',
        'brand',
        'color',
        'size',
        'price',
        'category_id',
        'subcategory_id',
        'sale',
        'sale_price',
        'image',
        'is_active',
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);
        //return $this->hasOne('App\Category');

    }

    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
        //return $this->hasOne('App\Category');

    }

    public function product_image()
    {
        return $this->hasMany(\App\Models\Product_image::class, 'product_id');
    }
}
