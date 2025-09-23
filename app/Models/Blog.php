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

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // Check if image already has full path
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        // If image starts with 'storage/', use asset()
        if (str_starts_with($this->image, 'storage/')) {
            return asset($this->image);
        }

        // Otherwise, assume it's a filename and prepend the path
        return asset('storage/' . $this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
