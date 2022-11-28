@extends('../layout/' . $layout)

@section('subhead')
<title>Data Bidang</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            @extends('../layout/components/notif')

            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Data Bidang</h2>
                </div>
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <button class="btn btn-primary mr-1 mb-2" data-tw-toggle="modal" data-tw-target="#form_bidang">
                            Tambah Bidang
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
                                            <th class="whitespace-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data) > 0)
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->kode_bidang}}</td>
                                            <td>{{$item->nama_bidang}}</td>
                                            <td>
                                                <a href="{{ url('/data/karyawan/'.$item->id).'?category=tad' }}"
                                                    class="btn btn-dark mr-1 mb-2">
                                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                                </a>
                                                <a href="{{ url('/edit/karyawan/'.$item->id).'?category=tad' }}"
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
                                        @else
                                        <tr>
                                            <div
                                                class="flex flex-row gap-2 items-center bg-blue-100 border-2 border-blue-400 rounded font-medium p-2 w-full">
                                                <i data-lucide="info" class="w-7 h-7"></i>
                                                Belum ada data
                                                bidang.
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
<div id="form_bidang" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-10 text-center">
                <form class="w-full overflow-x-hidden" action="" method="POST">
                    @csrf
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="kode">Kode Bidang:</label>
                        <input class="w-full rounded" type="text" id="kode" placeholder="BD01" required />
                    </div>
                    <div class="mb-2 flex flex-col items-start gap-2">
                        <label class="font-medium text-[16px]" id="nama_bidang">Nama Bidang:</label>
                        <input class="w-full rounded" type="text" id="nama_bidang" placeholder="Administrasi"
                            required />
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