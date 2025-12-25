<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $fillable = [
        'name',
    ];

    public function power_types()
    {
        return $this->hasMany(PowerType::class);
    }
}
