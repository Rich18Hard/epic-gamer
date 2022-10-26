<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'jenis_kontak',
        'deskripsi'
    ];
    protected $table = 'kontak';
}
