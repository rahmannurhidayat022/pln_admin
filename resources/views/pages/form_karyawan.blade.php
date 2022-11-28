@extends('../layout/' . $layout)

@section('subhead')
<title>Form Karyawan</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Form Tambah Data Karyawan</h2>
                </div>
                <div class="intro-y box px-5 pt-5 mt-5">
                    <form class="py-10" action="{{ url('/edit/karyawan/'.'?category='.Request::query('category')) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-4">
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="nid" class="form-label">NID</label>
                                    <input type="text" name="nid" id="nid" class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input id="laki-laki" class="form-check-input" type="radio" name="kelamin"
                                                value="laki-laki">
                                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input id="perempuan" class="form-check-input" type="radio" name="kelamin"
                                                value="perempuan">
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input type="text" name="agama" id="agama" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input type="number" name="usia" id="usia" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input type="number" name="no_ktp" id="no_ktp" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input type="text" name="npwp" id="npwp" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="bpjs_kesehatan" class="form-label">BPJS Kesehatan</label>
                                    <input type="text" name="bpjs_kesehatan" id="bpjs_kesehatan" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="bpjs_ketenagakerjaan" class="form-label">BPJS Ketenagakerjaan</label>
                                    <input type="text" name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                                </div>
                            </div>
                            @if(Request::query('category') == 'tad')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="status_kepegawaian" class="form-label">Status Kontrak</label>
                                <input type="text" name="status_kontrak" id="status_kontrak" class="form-control">
                            </div>
                            @endif
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="status_kepegawaian" class="form-label">Status Kepegawaian</label>
                                <select id="status_kepegawaian" name="status_kepegawaian"
                                    class="form-select mt-2 sm:mr-2">
                                    <option value="PJB">PJB</option>
                                    <option value="PJBS">PJBS</option>
                                </select>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <select id="pendidikan" name="pendidikan" class="form-select mt-2 sm:mr-2">
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="MA">MA
                                    </option>
                                    <option value="D3">Diploma III
                                    </option>
                                    <option value="S1">Strata I
                                    </option>
                                    <option value="S2">Strata II
                                    </option>
                                </select>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" id="jurusan" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select id="jabatan" name="jabatan" class="form-select sm:mr-2">
                                        @foreach($jabatan as $item)
                                        <option value="{{$item->nama_jabatan}}">{{$item->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="bidang" class="form-label">Bidang</label>
                                    <select id="bidang" name="bidang" class="form-select sm:mr-2">
                                        @foreach($bidang as $item)
                                        <option value="{{$item->nama_bidang}}">{{$item->nama_bidang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Request::query('category') == 'tad')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="mkp" class="form-label">Mulai Masuk MKP</label>
                                    <input type="date" name="mkp" id="mkp" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                    <input type="date" name="masa_kerja" id="masa_kerja" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="posisi" class="form-label">Posisi</label>
                                    <input type="text" name="posisi" id="posisi" class="form-control">
                                </div>
                            </div>
                            @endif
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="bagian" class="form-label">Bagian</label>
                                    <input type="text" name="bagian" id="bagian" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="text" name="email" id="unit" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="telp" class="form-label">No Telp</label>
                                    <input type="number" name="telp" id="telp" class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea rows="5" name="alamat" id="alamat" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-span-12 mt-3">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection