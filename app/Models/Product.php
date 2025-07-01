<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'price', 'description', 'category'];

    // One product has many images
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
