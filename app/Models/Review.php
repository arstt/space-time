<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "destination_id",
        "user_id",
        "title",
        "content",
        "rating"
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
