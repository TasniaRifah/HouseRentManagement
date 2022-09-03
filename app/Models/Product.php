<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','image','rent','description','address','discount','is_active'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
