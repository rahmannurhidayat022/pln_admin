<?php

namespace App\Imports;

use App\Models\TAD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class TADImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TAD([
            'nama' => $row['nama_karyawan'],
            'no_ktp' => $row['nomor_ktp'],
            'npwp' => $row['npwp'],
            'bpjs_kesehatan' => $row['bpjs_kesehatan'],
            'bpjs_ketenagakerjaan' => $row['bpjs_ketenagakerjaan'],
            'kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'tanggal_lahir' => \Carbon\Carbon::parse($row['tanggal_lahir'])->format('Y-m-d H:i:s'),
            'tempat_lahir' => $row['tempat_lahir'],
            'usia' => $row['usia'],
            'alamat' => $row['alamat'],
            'mkp' => \Carbon\Carbon::parse($row['mulai_masuk_mkp'])->format('Y-m-d H:i:s'),
            'masa_kerja' => \Carbon\Carbon::parse($row['masa_kerja'])->format('Y-m-d H:i:s'),
            'status_kontrak' => $row['status_kontrak'],
            'pendidikan' => $row['pendidikan_terakhir'],
            'jurusan' => $row['jurusan_pendidikan'],
            'jabatan' => $row['jabatan'],
            'bidang' => $row['bidang'],
            'posisi' => $row['posisi'],
            'pt'=> $row['pt'],
        ]);
    }
}