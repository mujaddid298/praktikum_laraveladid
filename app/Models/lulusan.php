<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lulusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jk',
        'jurusan',
        'prodi',
        'ipk',
        'tahun'
    ];
}
