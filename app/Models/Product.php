<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    // public function variants()
    // {
    //     return $this->hasMany(ProductVariant::class);
    // }
    use HasFactory;
}
