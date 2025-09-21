<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Sluggable;

    protected $fillable = ['name','model_name','slug','subcategory_id','image','description','fuel_type','frequency','status'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function powertypes()
    {
        return $this->hasMany(Powertype::class);
    }

    public function gallaries()
    {
        return $this->hasMany(Gallary::class);
    }
}
