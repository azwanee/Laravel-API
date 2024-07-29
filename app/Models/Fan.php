<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    use HasFactory;

    public $fillable = ['Nama'];

    public function klub()
    {
        return $this->belongsToMany(Klub::class, 'fan_klub', 'id_fan', 'id_klub');
    }
}
