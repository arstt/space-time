<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected  $fillable = [
        'title',
        'slug',
        'image',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'berita_on_categories', 'berita_id', 'category_id');
    }
}
