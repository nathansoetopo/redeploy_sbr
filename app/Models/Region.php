<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_polisi',
        'provinsi',
        'wilayah',
        'kota',
        'gambar',
    ];

    public function harga()
    {
        return $this->belongsToMany(Motor::class, 'hargas', 'plat', 'motor_id')->withPivot('harga');
    }
}
