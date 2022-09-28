<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Karyawan([
            'nid' => $row[0],
            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'telp' => $row[5],
            'alamat' => $row[6],
            'pendidikan' => $row[5],
            'tipe_karyawan' => $row[6],
            'tanggal_masuk' => $row[7],
            'jabatan' => $row[8],
            'grade' => $row[9],
            'bidang' => $row[10],
            'unit' => $row[11],
        ]);
    }
}