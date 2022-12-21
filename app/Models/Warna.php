<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;

    protected $table = 'warna';

    protected $guarded = ['id'];

    public function motor(){
        return $this->belongsToMany(Motor::class, 'warna_motor', 'id_warna', 'id_motor')->withPivot('image');
    }
}
