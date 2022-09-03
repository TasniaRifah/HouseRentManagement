<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
   // protected $table='Categories';//j table data insert korte hobe oi table er name bole dite hobe

   protected $fillable=['categories_name','is_active'];
    // public function products(){
    //     return $this->hasMany(Product::class);
    // }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    //query scope
    public function scopeActive($query){
return $query->where('is_active',true);
    }

}
