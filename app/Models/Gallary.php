<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
    /** @use HasFactory<\Database\Factories\GallaryFactory> */
    use HasFactory;
    protected $fillable = ['product_id', 'name', 'description', 'image', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
