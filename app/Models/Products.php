<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'title',
      'description',
      'category_id',
      'order',
      'image',
      'is_active',
    ];

    public function category(){

      return $this->belongsTo(Category::class);
      //return $this->hasOne('App\Category');

    }
}
