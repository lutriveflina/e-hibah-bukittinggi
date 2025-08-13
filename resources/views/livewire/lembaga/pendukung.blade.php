<div>
    <div class="card p-3 mb-3">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Surat Domisili *</label>
                <input type="text" wire:model.defer="no_domisili" class="form-control" value="{{ old('no_domisili') }}">
            </div>
            <div class="col-md-4">
                <label>Tanggal *</label>
                <input type="date" wire:model.defer="date_domisili" class="form-control"
                    value="{{ old('date_domisili') }}">
            </div>
            <div class="col-md-4">
                <label>Scan Dokumen *</label>
                <input type="file" wire:model="file_domisili" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Izin Operasional / Tanda Daftar Lembaga *</label>
                <input type="text" wire:model.defer="no_operasional" class="form-control"
                    value="{{ old('no_operasional') }}">
            </div>
            <div class="col-md-4">
                <label>Tanggal *</label>
                <input type="date" wire:model.defer="date_operasional" class="form-control"
                    value="{{ old('date_operasional') }}">
            </div>
            <div class="col-md-4">
                <label>Scan Dokumen *</label>
                <input type="file" wire:model="file_operasional" class="form-control">
            </div>
        </div>
    </div>

    {{-- Card Lihat Dokumen --}}
    <div class="card p-3 mb-3">
        <div class="d-flex gap-2">
            <button class="btn btn-warning">Lihat Dokumen Surat Domisili</button>
            <button class="btn btn-warning">Lihat Dokumen Izin Operasional</button>
        </div>
    </div>

    {{-- Card Data Bank --}}
    <div class="card p-3">
        <h5>Data Bank</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Bank *</label>
                <select wire:model.defer="id_bank" class="form-control">
                    <option value="">Pilih Bank</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Atas Nama *</label>
                <input type="text" wire:model.defer="atas_nama" class="form-control" value="{{ old('atas_nama') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nomor Rekening *</label>
                <input type="text" wire:model.defer="no_rek" class="form-control" value="{{ old('no_rek') }}">
            </div>
            <div class="col-md-6">
                <label>Scan Buku Rekening *</label>
                <input type="file" wire:model="photo_rek" class="form-control">
            </div>
        </div>

        <button wire:click="update" class="btn btn-primary w-100">Update</button>
    </div>
</div>