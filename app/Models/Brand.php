<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public function getUpdatedAtColumn() {
        return null;
    }
       protected $fillable=['title'];
}
