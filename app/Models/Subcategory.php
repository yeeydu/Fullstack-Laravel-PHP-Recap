<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }
}
