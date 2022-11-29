@extends('../layout/' . $layout)

@section('subhead')
<title>Data Jabatan</title>
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
        const uri = getHostUrl() + '/data/jabatan/' + itemId;
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
                    <h2 class="text-lg font-medium truncate mr-5">Data Jabatan</h2>
                </div>
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <button class="btn btn-primary mr-1 mb-2" data-tw-toggle="modal" data-tw-target="#form_jabatan">
                            Tambah Jabatan
                        </button>
                    </div>
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview" style="display: block;">
                            <div class="overflow-x-auto">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">Kode</th>
                                            <th class="whitespace-nowrap">Nama</th>
                                            <th class="whitespace-nowrap">Jenjang</th>
                                            <th class="whitespace-nowrap">Superior</th>
                                            <th class="whitespace-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data) > 0)
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->kode_jabatan}}</td>
                                            <td>{{$item->nama_jabatan}}</td>
                                            <td>{{$item->jenjang}}</td>
                                            <td>{{$item->superior}}</td>
                                            <td>
                                                <button class="btn btn-danger mr-1 mb-2" data-tw-toggle="modal"
                                                    data-tw-target="#delete" onclick="getId({{$item->id}})">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <div
                                                class="flex flex-row gap-2 items-center bg-blue-100 border-2 border-blue-400 rounded font-medium p-2 w-full">
                                                <i data-lucide="info" class="w-7 h-7"></i>
                                                Belum ada data
                                                jabatan.
                                            </div>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="form_jabatan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-10 text-center">
                <form class="w-full overflow-x-hidden" action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="kode_jabatan">Kode Jabatan:</label>
                        <input class="w-full rounded" type="text" name="kode_jabatan" id="kode_jabatan"
                            placeholder="JB01" required />
                    </div>
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="nama_jabatan">Nama Jabatan:</label>
                        <input class="w-full rounded" type="text" name="nama_jabatan" id="nama_jabatan"
                            placeholder="HRD" required />
                    </div>
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="jenjang">Jenjang:</label>
                        <select class="w-full py-3 px-2 rounded" name="jenjang" id="jenjang">
                            <option value="MA">MA</option>
                            <option value="MM">MM</option>
                            <option value="MD">MD</option>
                            <option value="SPV-A">SPV-A</option>
                            <option value="SPV-D">SPV-D</option>
                            <option value="F1">F1</option>
                            <option value="F2">F2</option>
                            <option value="F3">F3</option>
                            <option value="F4">F4</option>
                            <option value="F5">F5</option>
                            <option value="F6">F6</option>
                            <option value="Helper">Helper</option>
                        </select>
                    </div>
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="nama_jabatan">Superior:</label>
                        <select class="w-full py-3 px-2 rounded" name="superior" id="superior">
                            <option value="GENERAL MANAGER">GENERAL MANAGER</option>
                            <option value="MANAJER ENJINIRING & QA">MANAJER ENJINIRING & QA</option>
                            <option value="SPV SENIOR SYSTEM OWNER TURBINE & AUX">SPV SENIOR SYSTEM OWNER TURBINE & AUX</option>
                            <option value="SPV SENIOR SYSTEM OWNER BOILER & AUX">SPV SENIOR SYSTEM OWNER BOILER & AUX</option>
                            <option value="SPV SENIOR SYSTEM OWNER COMMON AUX">SPV SENIOR SYSTEM OWNER COMMON AUX</option>
                            <option value="SPV SENIOR COMPONENT ANALYST">SPV SENIOR COMPONENT ANALYST</option>
                            <option value="SPV SENIOR CONDITION BASED MAINTENANCE">SPV SENIOR CONDITION BASED MAINTENANCE</option>
                            <option value="SPV SENIOR MANAJEMEN MUTU & KINERJA">SPV SENIOR MANAJEMEN MUTU & KINERJA</option>
                            <option value="SPV SENIOR MANAJEMEN RISIKO & KEPATUHAN">SPV SENIOR MANAJEMEN RISIKO & KEPATUHAN</option>
                            <option value="MANAJER OPERASI">MANAJER OPERASI</option>
                            <option value="SPV SENIOR RENDAL OPERASI">SPV SENIOR RENDAL OPERASI</option>
                            <option value="SPV SENIOR PRODUKSI A">SPV SENIOR PRODUKSI A</option>
                            <option value="SPV SENIOR PRODUKSI B">SPV SENIOR PRODUKSI B</option>
                            <option value="SPV SENIOR PRODUKSI C">SPV SENIOR PRODUKSI C</option>
                            <option value="SPV SENIOR PRODUKSI D">SPV SENIOR PRODUKSI D</option>
                            <option value="SUPERVISOR COAL & ASH HANDLING A">SUPERVISOR COAL & ASH HANDLING A</option>
                            <option value="SUPERVISOR COAL & ASH HANDLING B">SUPERVISOR COAL & ASH HANDLING B</option>
                            <option value="SUPERVISOR COAL & ASH HANDLING C">SUPERVISOR COAL & ASH HANDLING C</option>
                            <option value="SUPERVISOR COAL & ASH HANDLING D">SUPERVISOR COAL & ASH HANDLING D</option>
                            <option value="SPV SENIOR KIMIA">SPV SENIOR KIMIA</option>
                            <option value="MANAJER PEMELIHARAAN">MANAJER PEMELIHARAAN</option>
                            <option value="SPV SENIOR RENDAL PEMELIHARAAN">SPV SENIOR RENDAL PEMELIHARAAN</option>
                            <option value="SPV SENIOR OUTAGE MANAGEMENT">SPV SENIOR OUTAGE MANAGEMENT</option>
                            <option value="SPV SENIOR HAR MESIN 1 (B,T & AAB)">SPV SENIOR HAR MESIN 1 (B,T & AAB)</option>
                            <option value="SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)">SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)</option>
                            <option value="SPV SENIOR HAR LISTRIK">SPV SENIOR HAR LISTRIK</option>
                            <option value="SPV SENIOR SARANA">SPV SENIOR SARANA</option>
                            <option value="SPV SENIOR LINGKUNGAN">SPV SENIOR LINGKUNGAN</option>
                            <option value="MANAJER LOGISTIK">MANAJER LOGISTIK</option>
                            <option value="SPV SENIOR INVENTORI KTRL & KATALOGER">SPV SENIOR INVENTORI KTRL & KATALOGER</option>
                            <option value="SPV SENIOR PENGADAAN">SPV SENIOR PENGADAAN</option>
                            <option value="SPV SENIOR ADMIN. GUDANG">SPV SENIOR ADMIN. GUDANG</option>
                            <option value="MANAJER KEU & ADMIN">MANAJER KEU & ADMIN</option>
                            <option value="SPV SENIOR KEUANGAN">SPV SENIOR KEUANGAN</option>
                            <option value="SPV SENIOR SDM">SPV SENIOR SDM</option>
                            <option value="SPV SENIOR UMUM & CSR">SPV SENIOR UMUM & CSR</option>
                        </select>
                    </div>
                    <div class="mt-3">
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