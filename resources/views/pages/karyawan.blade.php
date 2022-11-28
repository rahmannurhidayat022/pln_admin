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
        const uri = getHostUrl() + '/data/karyawan/' + itemId + '?category=karyawan';
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

            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Data Karyawan PJB/PJBS</h2>
                </div>
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <a class="btn btn-primary mr-1 mb-2" href="/form-karyawan?category=karyawan">Tambah</a>
                        <!-- <button class="btn btn-primary mr-1 mb-2" data-tw-toggle="modal"
                            data-tw-target="#add-data">Tambah Data</button> -->
                        <button class="btn btn-outline-primary mr-1 mb-2" data-tw-toggle="modal"
                            data-tw-target="#upload_file">
                            <i data-lucide="file-text" class="w-5 h-5 mr-1"></i> Import Excel
                        </button>
                        <!-- button export excel -->
                        <a href="{{ route('export.karyawan') }}" class="btn btn-outline-primary mr-1 mb-2">
                            <i data-lucide="book-open" class="w-5 h-5 mr-1"></i> Export Excel
                        </a>
                        <!-- search karyawan data -->
                        <form action="{{ route('karyawan') }}" method="GET">
                            <input type="text" name="search" placeholder="masukan name/nid" required />
                            <button type="submit" class="btn btn-primary mr-1 mb-2">Search</button>
                        </form>
                        <!-- button reload data -->
                        <a href="{{ route('karyawan') }}" class="btn btn-outline-primary mr-1 mb-2">
                            <i data-lucide="refresh-ccw" class="w-5 h-5 mr-1"></i>
                        </a>
                    </div>

                    <div class="preview" style="display: block;">
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">NID</th>
                                        <th class="whitespace-nowrap">Nama</th>
                                        <th class="whitespace-nowrap">Email</th>
                                        <th class="whitespace-nowrap">Status</th>
                                        <th class="whitespace-nowrap">Jabatan</th>
                                        <th class="whitespace-nowrap">Bidang</th>
                                        <th class="whitespace-nowrap">Bagian</th>
                                        <th class="whitespace-nowrap"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($karyawans) > 0)
                                    @foreach($karyawans as $item)
                                    <tr>
                                        <td>{{$item->nid}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->status_kepegawaian}}</td>
                                        <td>{{$item->jabatan}}</td>
                                        <td>{{$item->bidang}}</td>
                                        <td>{{$item->bagian}}</td>
                                        <td>
                                            <a href="{{ url('/data/karyawan/'.$item->id).'?category=karyawan' }}"
                                                class="btn btn-dark mr-1 mb-2">
                                                <i data-lucide="eye" class="w-5 h-5"></i>
                                            </a>
                                            <a href="{{ url('/edit/karyawan/'.$item->id).'?category=karyawan' }}"
                                                class="btn btn-warning mr-1 mb-2">
                                                <i data-lucide="edit" class="w-5 h-5"></i>
                                            </a>
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