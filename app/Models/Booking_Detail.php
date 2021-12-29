<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = array('tanggal_mulai', 'tanggal_akhir', 'quantity');
    public $useTimestamps = true;
    public $table = 'booking_details';

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function kamars()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
