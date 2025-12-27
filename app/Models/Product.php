<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Sluggable;

    protected $slugSourceField = 'ami_model';

    protected $fillable = ['name','ami_model','slug','subcategory_id','engine','image','description','fuel_type','frequency','status'];

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

    public function powertype_values()
    {
        return $this->hasMany(PowertypeValue::class);
    }

    public function gallaries()
    {
        return $this->hasMany(Gallary::class);
    }
}
