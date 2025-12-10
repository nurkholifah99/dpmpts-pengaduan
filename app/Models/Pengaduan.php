<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'nama','nik','email','no_hp','alamat',
        'subjek_pengaduan','isi_pengaduan','lampiran','status'
    ];

    protected $casts = ['lampiran' => 'array'];
}