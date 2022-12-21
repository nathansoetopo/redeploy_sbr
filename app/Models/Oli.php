<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oli extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_oli',
        'jenis',
        // 'harga',
        // 'keterangan',
        // 'part_code',
        'gambar',
    ];
}
