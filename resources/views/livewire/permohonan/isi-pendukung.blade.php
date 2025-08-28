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

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                                        <input type="file" wire:model="file_pernyataan_tanggung_jawab"
                                            class="form-control">
                                        @error('file_pernyataan_tanggung_jawab')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Berkas RAB <span class="text-danger">*</span></label>
                                        <input type="file" wire:model="file_rab" class="form-control">
                                        @error('file_rab')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Struktur Pengurus <span
                                                class="text-danger">*</span></label>
                                        <input type="file" wire:model="struktur_pengurus" class="form-control">
                                        @error('struktur_pengurus')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Saldo Akhir Rekening Bank <span
                                                class="text-danger">*</span></label>
                                        <input type="file" wire:model="saldo_akhir_rek" class="form-control">
                                        @error('saldo_akhir_rek')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-semibold mb-2">Surat Pernyataan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Surat Pernyataan Tidak Tumpang Tindih <span
                                                class="text-danger">*</span></label>
                                        <input type="text" wire:model="no_tidak_tumpang_tindih" class="form-control">
                                        @error('no_tidak_tumpang_tindih')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                            <input type="date" wire:model="tanggal_tidak_tumpang_tindih"
                                                class="form-control">
                                            @error('tanggal_tidak_tumpang_tindih')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Surat Pernyataan <span
                                                class="text-danger">*</span></label>
                                        <input type="file" wire:model="file_tidak_tumpang_tindih" class="form-control">
                                        @error('file_tidak_tumpang_tindih')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button wire:click='store' class="btn btn-primary form-control">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>