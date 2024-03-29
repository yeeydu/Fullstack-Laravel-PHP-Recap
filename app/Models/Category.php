<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'child_id'];

    public function subcategory()
    {
        return $this->hasMany(\App\Models\Subcategory::class, 'child_id');
    }
}
