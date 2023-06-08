<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaOnCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'berita_id',
        'category_id',
    ];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
