<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAD extends Model
{
    use HasFactory;
    protected $table = 'tad';
    protected $fillable = [
        'nama',
        'jabatan',
        'bidang',
        'posisi',
        'pendidikan',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'kelamin',
        'agama',
        'usia',
        'no_ktp',
        'npwp',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'mkp',
        'masa_kerja',
        'status_kontrak',
        'pt',
    ];
}