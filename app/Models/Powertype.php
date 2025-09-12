<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powertype extends Model
{
    /** @use HasFactory<\Database\Factories\PowertypeFactory> */
    use HasFactory;
    protected $fillable = ['product_id', 'name', 'value', 'note'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
