<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powertype extends Model
{
    /** @use HasFactory<\Database\Factories\PowertypeFactory> */
    use HasFactory;
    protected $fillable = ['power_id', 'name', 'note'];

    public function power()
    {
        return $this->belongsTo(Power::class);
    }

    public function values()
    {
        return $this->hasMany(PowertypeValue::class);
    }
}
