<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;

    public $fillable = ['Klub', 'Logo', 'id_liga'];

    public function klub()
    {
        return $this->belongsTo(Liga::class, 'id_liga');
    }

    public function pemain()
    {
        return $this->hasMany(Pemain::class, 'id_klub');
    }

    public function fan()
    {
        return $this->belongstoMany(Fan::class, 'fan_klub','id_klub', 'id_fan');
    }
}
