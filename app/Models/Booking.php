<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = array('total_transaksi', 'total_berbayar');

    public function bookings()
    {
        return $this->hasMany(Booking_Detail::class);
    }
}
