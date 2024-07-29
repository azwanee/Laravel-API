<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    public $fillable = ['Liga', 'Negara'];

    public function klub()
    {
        return $this->hasMany(Klub::class, 'id_liga');
    }
}
