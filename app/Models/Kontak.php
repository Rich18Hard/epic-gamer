<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'id_jenis',
        'deskripsi'
    ];
    protected $table = 'kontak';
    public function siswa(){
        return $this->belongsToMany('app\Models\Siswa', 'id_siswa');
    }
    public function jeniskontak(){
        return $this->belongsTo('app\Models\jenisKontak', 'id_siswa');
    }
}
