<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nid',
        'nama',
        'status_kepegawaian',
        'jabatan',
        'bidang',
        'bagian',
        'pendidikan',
        'jurusan',
        'pendidikan',
        'tempat_lahir',
        'tanggal_lahir',
        'telp',
        'email',
        'alamat',
        'kelamin',
        'agama',
        'usia',
        'no_ktp',
        'npwp',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
    ];
}