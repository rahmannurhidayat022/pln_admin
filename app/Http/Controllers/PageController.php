<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use Excel;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages/dashboard');
    }

    public function karyawan_view()
    {
        return view('pages/karyawan');
    }

    public function importFile(Request $request)
    {
        if ($request->file('file')) {
            $import = Excel::import(new KaryawanImport, $request->file('file'));
            if ($import) {
                return redirect('/data/karyawan')->with('success', 'Data berhasil ditambahkan');
            } else {
                return redirect('/data/karyawan')->with('failed', 'Data gagal ditambahkan');
            } 
        } else {
            return redirect('/data/karyawan')->with('info', 'Pilih file');
        }
    }
}