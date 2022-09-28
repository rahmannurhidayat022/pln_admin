<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Session;
use Excel;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages/dashboard');
    }

    public function karyawan_view()
    {
        $datas = Karyawan::latest()->paginate(7);
        return view('pages/karyawan', [ 'karyawans' => $datas ]);
    }

    public function importFile(Request $request)
    {
        if ($request->file('file')) {
            $import = Excel::import(new KaryawanImport, $request->file('file'));
            if ($import) {
                Session::flash('success', 'Data berhasil ditambahkan');
                return redirect('/data/karyawan');
            } else {
                Session::flash('failed', 'Data berhasil ditambahkan');
                return redirect('/data/karyawan');
            } 
        } else {
            return redirect('/data/karyawan')->with('info', 'Pilih file');
        }
    }
}