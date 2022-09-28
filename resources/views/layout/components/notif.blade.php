@if (Session::has('success'))
<div id="success-modal-preview" class="modal overflow-y-auto show" tabindex="-1" aria-hidden="false"
    style="padding-left: 0px; margin-top: 0px; margin-left: 0px; z-index: 10000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        icon-name="check-circle" data-lucide="check-circle"
                        class="lucide lucide-check-circle w-16 h-16 text-success mx-auto mt-3">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <div class="text-3xl mt-5">Sukses!</div>
                    <div class="text-slate-500 mt-2">{{Session::get('success')}}</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (Session::has('failed'))
<div id="danger-modal-preview" class="modal overflow-y-auto show" tabindex="-1" aria-hidden="false"
    style="padding-left: 0px; margin-top: 0px; margin-left: 0px; z-index: 10000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        icon-name="x-circle" data-lucide="x-circle"
                        class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <div class="text-3xl mt-5">Gagal!</div>
                    <div class="text-slate-500 mt-2">{{Session::get('failed')}}</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif