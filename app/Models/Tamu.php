<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tamu extends Authenticatable
{
    protected $fillable = array('pengenal', 'nomor_pengenal', 'nama', 'alamat', 'telepon', 'email', 'password','repassword');

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
