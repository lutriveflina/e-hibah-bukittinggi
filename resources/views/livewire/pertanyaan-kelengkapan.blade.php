<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pertanyaan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pertanyaan</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                    data-bs-target="#import_modal">
                    Import Pertanyaan</button>
                <button type="button" class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                    data-bs-target="#create_modal">
                    Tambah Pertanyaan</button>

                <!-- Import Modal -->
                <div wire:ignore.self class="modal fade" id="import_modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary" id="modalHeader">
                                <h5 class="modal-title text-light">Import Pertanyaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="file_import" class="form-label">File yang akan diimport</label>
                                            <input wire:model='file_import' type="file" class="form-control"
                                                id="file_import">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click.prevent='import' type="button" class="btn btn-primary"
                                    id="import">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Create Modal -->
                <div wire:ignore.self class="modal fade" id="create_modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary" id="modalHeader">
                                <h5 class="modal-title text-light">Tambah Pertanyaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Pertanyaan</label>
                                            <input wire:model='question' type="text" class="form-control" id="question"
                                                placeholder="Nama Pertanyaan">
                                        </div>
                                        <div wire:ignore class="mb-3">
                                            <label for="selectParent" class="form-label">Parent</label>
                                            <select wire:model='id_parent' class="form-select" id="selectParent">
                                                <option value="">Tidak Ada Parent</option>
                                                @foreach ($parents as $item)
                                                <option value="{{ $item->id }}">{{ $item->question }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="selectOrder" class="form-label">Urutan</label>
                                            <select wire:model='order' class="form-select" id="selectOrder"
                                                wire:key="order-{{ implode('-', $orders) }}">
                                                @foreach ($orders as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click.prevent='store' type="button" class="btn btn-primary"
                                    id="saveButton">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    @if (session('success'))
    <div class="mb-3">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="card">
        <div class="card-body">
            <div wire:ignore class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $item)
                        <tr wire:key="parent-{{ $item->id }}">
                            <td colspan="3" class="bg-warning">{{ $item->question }}</td>
                        </tr>
                        @foreach ($item->children as $child)
                        <tr wire:key="child-{{ $child->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td class="wrap-text">{{ $child->question }}</td>
                            <td><button wire:click='edit({{ $child->id }})' class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i>
                                    Edit</button></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning" id="modalHeader">
                    <h5 class="modal-title text-dark">Edit Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="question" class="form-label">Pertanyaan</label>
                                <input wire:model='question' type="text" class="form-control" id="question"
                                    placeholder="Nama Pertanyaan">
                            </div>
                            <div wire:ignore class="mb-3">
                                <label for="selectParent" class="form-label">Parent</label>
                                <select wire:model='id_parent' class="form-select" id="selectParent">
                                    <option value="">Tidak Ada Parent</option>
                                    @foreach ($parents as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->question }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="selectOrder" class="form-label">Urutan</label>
                                <select wire:model='order' class="form-select" id="selectOrder"
                                    wire:key="order-{{ implode('-', $orders) }}">
                                    @foreach ($orders as $item)
                                    <option value="{{ $item }}">
                                        {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent='store' type="button" class="btn btn-warning" id="saveButton">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Overlay Loading --}}
    <div class="modal fade" id="loading-overlay" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Sedang mengimpor...</span>
                </div>
                <span class="ms-3 text-white">Sedang mengimpor data...</span>
            </div>
        </div>
    </div>

    {{-- Modal Hasil Import --}}
    <div class="modal fade" id="resultModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hasil Import</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="importResultBody">
                    <!-- Hasil import akan diisi lewat JS -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    $(document).ready(function() {
            $("#selectParent").on('change', function() {
                console.log("updateOrder");

                Livewire.dispatch("updateOrder");
            })

            Livewire.on('import-start', function () {
                $("#import_modal").modal('hide');
                $("#loading-overlay").modal('show');
            });

            Livewire.on('import-finished', function (event) {
                console.log(event);
                
                $("#loading-overlay").modal('hide');

                let data = event.detail;
                let html = `
                    <p><strong>Total Data:</strong> ${data.total}</p>
                    <p><strong>Berhasil:</strong> ${data.success}</p>
                    <p><strong>Gagal:</strong> ${data.failed}</p>
                `;

                if (data.errors.length > 0) {
                    html += `<p><strong>Error:</strong></p><ul>`;
                    data.errors.forEach(err => { html += `<li>${err}</li>`; });
                    html += `</ul>`;
                }

                $("#importResultBody").html(html);
                $("#resultModal").modal('show');
            });

            Livewire.on("addModal", () => {
                $("#create_modal").modal('show');
            });

            Livewire.on("editModal", () => {
                $("#edit_modal").modal('show');
            });

            Livewire.on("closeModal", () => {
                $("#import_modal").modal('hide');
                $("#create_modal").modal('hide');
                $("#edit_modal").modal('hide');
            });
        });
</script>
@endpush