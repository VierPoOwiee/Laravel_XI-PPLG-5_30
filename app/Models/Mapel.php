<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use Hasfactory;

    protected $fillable = [
        'id_mapel',
        'nama_mapel',
        'id_guru',
        'nama_guru',
    ];
}
