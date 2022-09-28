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
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan',
        'tipe_karyawan',
        'jabatan',
        'grade',
        'bidang',
        'unit',
        'tanggal_masuk',
        'telp',
        'alamat',
    ];
}