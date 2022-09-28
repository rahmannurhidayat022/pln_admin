@extends('../layout/' . $layout)

@section('subhead')
<title>Data karyawan</title>
@endsection

@section('subcontent')
<script>
let itemId;
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function getId(id) {
    itemId = id;
    return;
}

function getHostUrl() {
    const protocol = location.protocol;
    const slashes = protocol.concat("//");
    const host = slashes.concat(window.location.hostname);
    const port = location.port;
    return host + ':' + port;
}

async function removeItem() {
    try {
        const uri = getHostUrl() + '/data/karyawan/' + itemId;
        const response = await fetch(uri, {
            method: 'DELETE',
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Methods': 'POST,GET,OPTIONS, PUT, DELETE',
                'Access-Control-Allow-Headers': 'Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization',
                'X-CSRF-TOKEN': token,
            },
            body: {
                _token: token,
                id: itemId,
                _method: 'DELETE',
            },
        });
        window.location.reload();
        return;
    } catch (error) {
        console.error(error.message);
    }
}
</script>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            @extends('../layout/components/notif')

            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Data Karyawan</h2>
                </div>
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <!-- <button class="btn btn-primary mr-1 mb-2" data-tw-toggle="modal"
                            data-tw-target="#add-data">Tambah Data</button> -->
                        <button class="btn btn-outline-primary mr-1 mb-2" data-tw-toggle="modal"
                            data-tw-target="#upload_file">
                            <i data-lucide="file-text" class="w-5 h-5 mr-1"></i> Import Excel
                        </button>
                    </div>
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview" style="display: block;">
                            <div class="overflow-x-auto">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">NID</th>
                                            <th class="whitespace-nowrap">Nama</th>
                                            <th class="whitespace-nowrap">Jabatan</th>
                                            <th class="whitespace-nowrap">Grade</th>
                                            <th class="whitespace-nowrap">Bidang</th>
                                            <th class="whitespace-nowrap">Unit</th>
                                            <th class="whitespace-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($karyawans) > 0)
                                        @foreach($karyawans as $item)
                                        <tr>
                                            <td>{{$item->nid}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td>{{$item->grade}}</td>
                                            <td>{{$item->bidang}}</td>
                                            <td>{{$item->unit}}</td>
                                            <td>
                                                <button class="btn btn-dark mr-1 mb-2">
                                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                                </button>
                                                <button class="btn btn-warning mr-1 mb-2">
                                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                                </button>
                                                <button class="btn btn-danger mr-1 mb-2" data-tw-toggle="modal"
                                                    data-tw-target="#delete" onclick="getId({{$item->id}})">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {{ $karyawans->links('pagination::tailwind') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add-data" class="modal modal-slide-over" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header p-5">
                <h2 class="font-medium text-base mr-auto">Form Karyawan</h2>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                            <div class="mt-3">
                                <label for="nid" class="form-label">NID</label>
                                <input type="text" name="nid" id="nid" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label>Jenis Kelamin</label>
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="form-check mr-2">
                                        <input id="laki-laki" class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="laki-laki">
                                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input id="perempuan" class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="perempuan">
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input id="lainnya" class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="lainnya">
                                        <label class="form-check-label" for="lainnya">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select id="pendidikan" name="pendidikan" class="form-select mt-2 sm:mr-2">
                                <option value="SMA">SMA</option>
                                <option value="D1">Diploma I</option>
                                <option value="D2">Diploma II</option>
                                <option value="D3">Diploma III</option>
                                <option value="S1">Strata I</option>
                                <option value="S2">Strata II</option>
                                <option value="S3">Strata III</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <label for="tipe_karyawan" class="form-label">Tipe Karyawan</label>
                            <select id="tipe_karyawan" name="tipe_karyawan" class="form-select mt-2 sm:mr-2">
                                <option value="pjb">PJB</option>
                                <option value="pjbs">PJBS</option>
                                <option value="tad">TAD</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" name="grade" id="grade" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="bidang" class="form-label">Bidang</label>
                                <input type="text" name="bidang" id="bidang" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="number" name="unit" id="unit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label for="telp" class="form-label">No Telp</label>
                                <input type="number" name="telp" id="telp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-8">
                            <div class="mt-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea span="50" name="alamat" id="alamat" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                            <div class="mt-3">
                                <label>Jenis Kelamin</label>
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="form-check mr-2">
                                        <input id="aktif" class="form-check-input" type="radio" name="status"
                                            value="aktif">
                                        <label class="form-check-label" for="aktif">Aktif</label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input id="pasif" class="form-check-input" type="radio" name="status"
                                            value="pasif">
                                        <label class="form-check-label" for="pasif">Pasif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 mt-3">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="upload_file" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-10 text-center">
                <form class="w-full overflow-x-hidden" action="{{route('uploads')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="file" class="w-full flex flex-col px-4 py-6 border-2 border-blue-400 border-dashed">
                        <input id="file" name="file" type="file"
                            accept=".xlsx,.xlsm,.xltx,.xltm,.ods,.ots,.csv,.tsv,.xml" required />
                        <p class="text-slate-400 mt-5">Pilih file yang akan diupload. <br> <strong
                                class="font-bold text-blue-500">Pastikan
                                file sesuai format, agar tidak terjadi error saat upload</strong></p>
                    </label>
                    <div class="mt-10">
                        <button type="submit" class="btn btn-primary btn-lg w-full">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="delete" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24" onclick="removeItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection