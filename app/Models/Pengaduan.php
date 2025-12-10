<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama', 'nik', 'email', 'no_hp', 'alamat',
        'subjek_pengaduan', 'isi_pengaduan', 'lampiran', 'status'
    ];

    protected $casts = [
        'lampiran' => 'array',
        'status' => 'string'
    ];
}