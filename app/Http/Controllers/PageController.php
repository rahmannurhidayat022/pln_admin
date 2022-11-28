<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use App\Exports\KaryawanExport;
use App\Imports\TADImport;
use App\Exports\TADExport;
use App\Models\Karyawan;
use App\Models\TAD;
use App\Models\Bidang;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Session;
use Excel;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages/dashboard');
    }
    // export excel karyawan
    public function exportKaryawan()
    {
        return Excel::download(new KaryawanExport, 'karyawan.xlsx');
    }
    // export excel tad
    public function exportTAD()
    {
        return Excel::download(new TADExport, 'tad.xlsx');
    }
    public function karyawan_view(Request $request)
    {
        $search = $request->query('search');
        if($search) {
            $datas = Karyawan::where('nama', 'like', '%' . $search . '%')
            ->orWhere('nid', 'like', '%' . $search . '%')
            ->paginate(7);
            return view('pages/karyawan', [ 'karyawans' => $datas ]);
        }

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

    public function removeRecord(Request $request, $id)
    {
        $category = $request->query('category');
        if ($category == 'karyawan') {
            $res = Karyawan::find($id)->delete();
            if (!$res) {
                Session::flash('failed', 'Data gagal dihapus');
                return redirect('/data/karyawan');
            }
            Session::flash('success', 'Data berhasil dihapus');
            return redirect('/data/karyawan');
        }
        if ($category == 'tad') {
            $res = TAD::find($id)->delete();
            if (!$res) {
                Session::flash('failed', 'Data gagal dihapus');
                return redirect('/data/tad');
            }
            Session::flash('success', 'Data berhasil dihapus');
            return redirect('/data/tad');
        }

        return redirect()->back();
    }

    public function detailKaryawan(Request $request, $id) {
        $category = $request->query('category');
        if ($category == 'karyawan') {
            $res = Karyawan::find($id);
            return view('pages/detail_karyawan', compact('res'));
        }
        if ($category == 'tad') {
            $res = TAD::find($id);
            return view('pages/detail_karyawan', compact('res'));
        }

        return redirect()->back();
    }

    public function formKaryawan(Request $request, $id) {
        $category = $request->query('category');
        if ($category == 'karyawan') {
            $res = Karyawan::find($id);
            return view('pages/edit_karyawan', compact('res'));
        }

        if ($category == 'tad') {
            $res = TAD::find($id);
            return view('pages/edit_karyawan', compact('res'));
        }

        return redirect()->back();
    }

    public function editKaryawan(Request $request, $id) {
        $category = $request->query('category');
        try {
            if ($category == 'karyawan') {
                $res = Karyawan::find($id);
                $res->nid = $request->nid;
                $res->nama = $request->nama;
                $res->kelamin = $request->kelamin;
                $res->tempat_lahir = $request->tempat_lahir;
                $res->tanggal_lahir = $request->tanggal_lahir;
                $res->pendidikan = $request->pendidikan;
                $res->status_kepegawaian = $request->status_kepegawaian;
                $res->jabatan = $request->jabatan;
                $res->bagian = $request->bagian;
                $res->bidang = $request->bidang;
                $res->jurusan = $request->jurusan;
                $res->usia = $request->usia;
                $res->telp = $request->telp;
                $res->email = $request->email;
                $res->alamat = $request->alamat;
                $res->agama = $request->agama;
                $res->no_ktp = $request->no_ktp;
                $res->npwp = $request->npwp;
                $res->bpjs_kesehatan = $request->bpjs_kesehatan;
                $res->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
                $res->update();

                Session::flash('success', 'Data berhasil diperbaharui');
                return redirect('/data/karyawan');
            }

            if ($category == 'tad') {
                $res = TAD::find($id);
                $res->nama = $request->nama;
                $res->kelamin = $request->kelamin;
                $res->tempat_lahir = $request->tempat_lahir;
                $res->tanggal_lahir = $request->tanggal_lahir;
                $res->pendidikan = $request->pendidikan;
                $res->status_kontrak = $request->status_kontrak;
                $res->jabatan = $request->jabatan;
                $res->posisi = $request->posisi;
                $res->bidang = $request->bidang;
                $res->jurusan = $request->jurusan;
                $res->usia = $request->usia;
                $res->alamat = $request->alamat;
                $res->agama = $request->agama;
                $res->mkp = $request->mkp;
                $res->masa_kerja = $request->masa_kerja;
                $res->no_ktp = $request->no_ktp;
                $res->npwp = $request->npwp;
                $res->bpjs_kesehatan = $request->bpjs_kesehatan;
                $res->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
                $res->update();

                Session::flash('success', 'Data berhasil diperbaharui');
                return redirect('/data/tad');
            }

            return;
        } catch (\Throwable $th) {
            if ($category == 'karyawan') {
                Session::flash('failed', 'Data gagal diperbaharui');
                return redirect('/data/karyawan');
            }

            if ($category == 'tad') {
                Session::flash('failed', 'Data gagal diperbaharui');
                return redirect('/data/tad');
            }
        }
    }

    public function getChartData() {
        try {
            $karyawanFilteredByPjb_L = Karyawan::where('status_kepegawaian', '=', 'pjb')->where('kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByPjb_P = Karyawan::where('status_kepegawaian', '=', 'pjb')->where('kelamin', '=', 'perempuan')->count();
            $karyawanFilteredByPjbs_L = Karyawan::where('status_kepegawaian', '=', 'pjbs')->where('kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByPjbs_P = Karyawan::where('status_kepegawaian', '=', 'pjbs')->where('kelamin', '=', 'perempuan')->count();
            $karyawanFilteredByTad_L = TAD::where('kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByTad_P = TAD::where('kelamin', '=', 'perempuan')->count();

            $k_sma = Karyawan::where('pendidikan', '=', 'SMA')->count();
            $k_smk = Karyawan::where('pendidikan', '=', 'SMK')->count();
            $k_ma = Karyawan::where('pendidikan', '=', 'MA')->count();
            $k_d3 = Karyawan::where('pendidikan', '=', 'D3')->count();
            $k_s1 = Karyawan::where('pendidikan', '=', 'S1')->count();
            $k_s2 = Karyawan::where('pendidikan', '=', 'S2')->count();

            $t_sma = TAD::where('pendidikan', '=', 'SMA')->count();
            $t_smk = TAD::where('pendidikan', '=', 'SMK')->count();
            $t_ma = TAD::where('pendidikan', '=', 'MA')->count();
            $t_d3 = TAD::where('pendidikan', '=', 'D3')->count();
            $t_s1 = TAD::where('pendidikan', '=', 'S1')->count();
            $t_s2 = TAD::where('pendidikan', '=', 'S2')->count();

            $pjb_level1 = Karyawan::where('status_kepegawaian', '=', 'pjb')->where('usia', '<', '20')->count();
            $pjb_level2 = Karyawan::where('status_kepegawaian', '=', 'pjb')->whereBetween('usia', [20, 29])->count();
            $pjb_level3 = Karyawan::where('status_kepegawaian', '=', 'pjb')->whereBetween('usia', [30, 39])->count();
            $pjb_level4 = Karyawan::where('status_kepegawaian', '=', 'pjb')->whereBetween('usia', [40, 49])->count();
            $pjb_level5 = Karyawan::where('status_kepegawaian', '=', 'pjb')->where('usia', '>=', '50')->count();

            $pjbs_level1 = Karyawan::where('status_kepegawaian', '=', 'pjbs')->where('usia', '<', '20')->count();
            $pjbs_level2 = Karyawan::where('status_kepegawaian', '=', 'pjbs')->whereBetween('usia', [20, 29])->count();
            $pjbs_level3 = Karyawan::where('status_kepegawaian', '=', 'pjbs')->whereBetween('usia', [30, 39])->count();
            $pjbs_level4 = Karyawan::where('status_kepegawaian', '=', 'pjbs')->whereBetween('usia', [40, 49])->count();
            $pjbs_level5 = Karyawan::where('status_kepegawaian', '=', 'pjbs')->where('usia', '>=', '50')->count();

            $tad_level1 = TAD::where('usia', '<', '20')->count();
            $tad_level2 = TAD::whereBetween('usia', [20, 29])->count();
            $tad_level3 = TAD::whereBetween('usia', [30, 39])->count();
            $tad_level4 = TAD::whereBetween('usia', [40, 49])->count();
            $tad_level5 = TAD::where('usia', '>=', '50')->count();

            $data = [
                'status' => '200',
                'data' => [
                    'jumlah_karyawan' => [
                        'pjb' => [
                            'laki_laki' => $karyawanFilteredByPjb_L,
                            'perempuan' => $karyawanFilteredByPjb_P,
                        ],
                        'pjbs' => [
                            'laki_laki' => $karyawanFilteredByPjbs_L,
                            'perempuan' => $karyawanFilteredByPjbs_P,
                        ],
                        'tad' => [
                            'laki_laki' => $karyawanFilteredByTad_L,
                            'perempuan' => $karyawanFilteredByTad_P,
                        ],
                    ],
                    'pendidikan' => [
                        'SMU' => $k_sma + $k_smk + $k_ma + $t_sma + $t_smk + $t_ma,
                        'D3' => $k_d3 + $t_d3,
                        'S1' => $k_s1 + $t_s1,
                        'S2' => $k_s2 + $t_s2,
                    ],
                    'usia' => [
                        'pjb' => [
                            'level1' => $pjb_level1,
                            'level2' => $pjb_level2,
                            'level3' => $pjb_level3,
                            'level4' => $pjb_level4,
                            'level5' => $pjb_level5,
                        ],
                        'pjbs' => [
                            'level1' => $pjbs_level1,
                            'level2' => $pjbs_level2,
                            'level3' => $pjbs_level3,
                            'level4' => $pjbs_level4,
                            'level5' => $pjbs_level5,
                        ],
                        'tad' => [
                            'level1' => $tad_level1,
                            'level2' => $tad_level2,
                            'level3' => $tad_level3,
                            'level4' => $tad_level4,
                            'level5' => $tad_level5,
                        ],
                    ],
                ],
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'message' => 'Gagal memuat data chart' ], 400);
        }
    }

    public function tad(Request $request)
    {
        $search = $request->query('search');
        if($search) {
            $datas = TAD::where('nama', 'like', '%' . $search . '%')
            //->orWhere('nid', 'like', '%' . $search . '%')
            ->paginate(7);
            return view('pages/tad', [ 'tad' => $datas ]);
        }

        $datas = TAD::latest()->paginate(7);
        return view('pages/tad', [ 'tad' => $datas ]);
    }

    public function importFileTAD(Request $request)
    {
        if ($request->file('file')) {
            $import = Excel::import(new TADImport, $request->file('file'));
            if ($import) {
                Session::flash('success', 'Data berhasil ditambahkan');
                return redirect('/data/tad');
            } else {
                Session::flash('failed', 'Data gagal ditambahkan');
                return redirect('/data/tad');
            } 
        } else {
            return redirect('/data/karyawan')->with('info', 'Pilih file');
        }
    }

    public function bidangpage(Bidang $bidang) {
        $data = $bidang->orderBy('kode_bidang', 'asc')->get();

        return view('pages.bidang', [ 'data' => $data ]);
    }

    public function createbidang(Request $request, Bidang $bidang) {
        $request->validate([
            'kode_bidang' => 'required',
            'nama_bidang' => 'required',
        ]);

        $filtered = $bidang->where('kode_bidang', '=', $request->input('kode_bidang'))->get();
        
        if (count($filtered) > 0) {
            Session::flash('failed', 'Nilai Kode Bidang sudah dipakai');
            return redirect('/data/bidang'); 
        }
                
        $data = $request->all();
        $bidang->create($data);

        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect('/data/bidang');
    }

    public function deletebidang(Bidang $bidang, $id) {
        $res = $bidang->find($id)->delete();
        if (!$res) {
            Session::flash('failed', 'Data tidak ditemukan');
            return redirect('/data/bidang'); 
        }
        Session::flash('success', 'Data berhasil dihapus');
        return redirect('/data/bidang');
    }

    public function jabatanpage(Jabatan $jabatan) {
        $data = $jabatan->orderBy('kode_jabatan', 'asc')->get();

        return view('pages.jabatan', [ 'data' => $data ]);
    }

    public function createjabatan(Request $request, Jabatan $jabatan) {
        $request->validate([
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required',
            'superior' => 'required',
        ]);

        $filtered = $jabatan->where('kode_jabatan', '=', $request->input('kode_jabatan'))->get();
        
        if (count($filtered) > 0) {
            Session::flash('failed', 'Nilai Kode Jabatan sudah dipakai');
            return redirect('/data/jabatan'); 
        }
                
        $data = $request->all();
        $jabatan->create($data);

        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect('/data/jabatan');
    }

    public function deletejabatan(Jabatan $jabatan, $id) {
        $res = $jabatan->find($id)->delete();
        if (!$res) {
            Session::flash('failed', 'Data tidak ditemukan');
            return redirect('/data/jabatan'); 
        }
        Session::flash('success', 'Data berhasil dihapus');
        return redirect('/data/jabatan');
    }

    public function formkaryawanpage(Request $request, Bidang $bidang, Jabatan $jabatan) {
        if($request->query('category') && $request->query('category') == "karyawan" || $request->query('category') == "tad") {
            $bidangdata = $bidang->select('nama_bidang')->orderBy('nama_bidang', 'asc')->get();
            $jabatandata = $jabatan->select('nama_jabatan')->orderBy('nama_jabatan', 'asc')->get();

            return view('pages.form_karyawan', [ 'bidang' => $bidangdata, 'jabatan' => $jabatandata ]);
        }
        
        return redirect('/');
    }

    public function karyawanstore (Request $request, Karyawan $karyawan, TAD $tad) {
        if($request->query('category') && $request->query('category') == "karyawan" || $request->query('category') == "tad") {
            $category = $request->query('category');
            try {
                if ($category == 'karyawan') {
                    $karyawan->create([
                        "nid" => $request->nid,
                        "nama" => $request->nama,
                        "kelamin" => $request->kelamin,
                        "tempat_lahir" => $request->tempat_lahir,
                        "tanggal_lahir" => $request->tanggal_lahir,
                        "pendidikan" => $request->pendidikan,
                        "status_kepegawaian" => $request->status_kepegawaian,
                        "jabatan" => $request->jabatan,
                        "bagian" => $request->bagian,
                        "bidang" => $request->bidang,
                        "jurusan" => $request->jurusan,
                        "usia" => $request->usia,
                        "telp" => $request->telp,
                        "email" => $request->email,
                        "alamat" => $request->alamat,
                        "agama" => $request->agama,
                        "no_ktp" => $request->no_ktp,
                        "npwp" => $request->npwp,
                        "bpjs_kesehatan" => $request->bpjs_kesehatan,
                        "bpjs_ketenagakerjaan" => $request->bpjs_ketenagakerjaan,
                    ]);
    
                    Session::flash('success', 'Data berhasil diperbaharui');
                    return redirect('/data/karyawan');
                }
    
                if ($category == 'tad') {
                    $tad->create([
                        "nama" => $request->nama,
                        "kelamin" => $request->kelamin,
                        "tempat_lahir" => $request->tempat_lahir,
                        "tanggal_lahir" => $request->tanggal_lahir,
                        "pendidikan" => $request->pendidikan,
                        "status_kontrak" => $request->status_kontrak,
                        "jabatan" => $request->jabatan,
                        "posisi" => $request->posisi,
                        "bidang" => $request->bidang,
                        "jurusan" => $request->jurusan,
                        "usia" => $request->usia,
                        "alamat" => $request->alamat,
                        "agama" => $request->agama,
                        "mkp" => $request->mkp,
                        "masa_kerja" => $request->masa_kerja,
                        "no_ktp" => $request->no_ktp,
                        "npwp" => $request->npwp,
                        "bpjs_kesehatan" => $request->bpjs_kesehatan,
                        "bpjs_ketenagakerjaan" => $request->bpjs_ketenagakerjaan,
                    ]);
    
                    Session::flash('success', 'Data berhasil diperbaharui');
                    return redirect('/data/tad');
                }
    
                return;
            } catch (\Throwable $th) {
                if ($category == 'karyawan') {
                    Session::flash('failed', 'Data gagal diperbaharui');
                    return redirect('/data/karyawan');
                }
    
                if ($category == 'tad') {
                    Session::flash('failed', 'Data gagal diperbaharui');
                    return redirect('/data/tad');
                }
            }
        }
        
        return redirect('/');
    }
}