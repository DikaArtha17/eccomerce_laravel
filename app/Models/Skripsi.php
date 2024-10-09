<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'judul', 'nama', 'nim', 'angkatan', 'dosenPembimbing1', 'dosenPembimbing2'
    ];
}
