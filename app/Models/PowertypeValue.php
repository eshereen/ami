<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowertypeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'powertype_id',
        'value',
    ];

    /**
     * Get the powertype that owns the value.
     */
    public function powertype()
    {
        return $this->belongsTo(Powertype::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
