<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            <h4>Form Pendukung Permohonan</h4>
        </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('permohonan') }}">Permohonan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pendukung Permohonan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-semibold mb-2">Surat Permohonan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Surat Pernyataan Pertanggung JAwab <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model="file_penyataan_tanggung_jawab"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Berkas RAB <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="file_rab" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Struktur Pengurus <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model="struktur_pengurus" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Berkas RAB <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="Saldo AKhir " class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
