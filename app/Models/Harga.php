<?php

namespace App\Models;

use App\Models\Motor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Harga extends Model
{
    use HasFactory;
    protected $table = 'hargas';
    protected $guarded = ['id'];

    public function motor()
    {
        return $this->belongsTo(Motor::class,'motor_id');
    }
}
