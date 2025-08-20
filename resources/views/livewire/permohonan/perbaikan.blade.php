<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            <h4>Perbaikan</h4>
        </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('permohonan') }}">Permohonan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Perbaikan</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="ms-auto">
            <a href="{{ $this->checkRab() ? 'javascript:' : route('permohonan') }}"
                @if ($this->checkRab()) title="RAB Belum Diperbarui" @endif>
                <button class="btn btn-primary" @disabled($this->checkRab())>
                    Back
                </button>
            </a>
        </div> --}}
    </div>

    {{-- Proposal --}}
    <div class="mb-4">
        <div class="card">
            <div class="card-body">

                <h3 class="font-semibold mt-6 mb-2">Proposal</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">No Proposal <span class="text-danger">*</span></label>
                            <input type="text" wire:model="no_proposal" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengajuan <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" wire:model="tanggal_proposal" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Proposal <span class="text-danger">*</span></label>
                    <input type="text" wire:model="judul_proposal" class="form-control">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Scan Proposal Baru <span class="text-danger">*</span></label>
                            <input type="file" wire:model="file_proposal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#fileModal"
                                data-file-url="{{ Storage::url($permohonan->file_proposal) }}">Lihat
                                Dokumen Lama</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Scan RAB Baru <span class="text-danger">*</span></label>
                                <input type="file" wire:model="file_rab" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#fileModal"
                                    data-file-url="{{ Storage::url($permohonan->pendukung?->file_rab) }}">Lihat
                                    Dokumen lama</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="card">
            <div class="card-body">

                @if (session()->has('warning_rab'))
                    <div class="alert alert-secondary" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <h3 class="font-semibold mt-6 mb-2">RAB</h3>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label for="totalPengajuan" class="form-label">Total Pengajuan <span
                                class="text-danger">*</span></label>
                        <input wire:model.change='nominal_rab' type="number" class="form-control" id="totalPengajuan"
                            placeholder="Masukkan total pengajuan">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nominalRAB" class="form-label">Nominal RAB <span
                                class="text-danger">*</span></label>
                        <input type="text" wire:model='total_kegiatan' class="form-control" id="nominalRAB"
                            placeholder="Masukkan nominal RAB" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nominalRAB" class="form-label">&nbsp;</label><br>
                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#update_rab_modal">Update
                            Kegiatan dan Rincian</button>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Rincian Kegiatan</th>
                                <th>Volume</th>
                                <th>Satuan<br>(Liter, KD, dan Sebagainya)</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatans as $kegiatan)
                                <tr class="bg-warning">
                                    <td colspan="4" class="text-start">{{ $kegiatan->nama_kegiatan }}</td>
                                    <td class="text-end">
                                        {{ number_format(
                                            collect($kegiatan->rincian)->pluck('subtotal')->filter(fn($val) => is_numeric($val))->sum(),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                </tr>
                                @foreach ($kegiatan->rincian as $rincian)
                                    <tr class="">
                                        <td class="text-start">{{ $rincian->keterangan }}</td>
                                        <td>{{ $rincian->volume }}</td>
                                        <td class="text-start">{{ $rincian->satuan->name }}</td>
                                        <td class="text-end">{{ number_format($rincian->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-end">{{ number_format($rincian->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="d-grid">
                    <button wire:click='saveRab' class="btn btn-primary" @disabled($this->checkRab())>Simpan
                        Perubahan</button>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="fileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="modalFileContent">
                    <p>Memuat konten...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fileModal = document.getElementById('fileModal');
            const modalContent = document.getElementById('modalFileContent');

            fileModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const fileUrl = button.getAttribute('data-file-url');
                const extension = fileUrl.split('.').pop().toLowerCase();

                // Reset isi
                modalContent.innerHTML = '<p>Memuat konten...</p>';

                if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
                    modalContent.innerHTML =
                        `<img src="${fileUrl}" alt="Gambar" class="img-fluid rounded shadow">`;
                } else if (extension === 'pdf') {
                    modalContent.innerHTML =
                        `<iframe src="${fileUrl}" width="100%" height="600px" style="border:none;"></iframe>`;
                } else {
                    modalContent.innerHTML = `<p class="text-danger">Jenis file tidak didukung.</p>`;
                }
            });
        });
    </script>
@endpush
