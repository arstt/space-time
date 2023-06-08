<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'slug',
    ];

    public function berita()
    {
        return $this->belongsToMany(Berita::class, 'berita_on_categories', 'category_id', 'berita_id');
    }
}
