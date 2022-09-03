<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'booked_by', 'invoice_number', 'NID','mobile'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}
