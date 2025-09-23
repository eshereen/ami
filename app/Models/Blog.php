<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory , Sluggable;
    protected $fillable = ['user_id', 'title', 'slug', 'content', 'image', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
