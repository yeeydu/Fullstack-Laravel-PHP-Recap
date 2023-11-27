<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  protected $fillable = [
    'title',
    'description',
    'image',
    'order',
    'is_active',
  ];
}
