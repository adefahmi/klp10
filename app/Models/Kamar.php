<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    // protected $fillable = ['tipe', 'harga', 'stok_tersedia', 'fasilitas', 'kapasitas_kamar', 'image'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function booking_details()
    {
        return $this->hasMany(Booking_Detail::class);
    }

    public function type()
    {
        return $this->belongsTo(TipeKamar::class, 'tipe_kamar_id');
    }
}
