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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_modal"><i
                        class="bi bi-plus-lg"></i>
                    Tambah Pertanyaan</button>

                <!-- Modal -->
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
                                            <input wire:model='question' type="text" class="form-control"
                                                id="question" placeholder="Nama Pertanyaan">
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
                                    <td>{{ $child->question }}</td>
                                    <td><button wire:click='edit({{ $child->id }})'
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i>
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

</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#selectParent").on('change', function() {
                console.log("updateOrder");

                Livewire.dispatch("updateOrder");
            })

            Livewire.on("addModal", () => {
                $("#create_modal").modal('show');
            })

            Livewire.on("editModal", () => {
                $("#edit_modal").modal('show');
            })

            Livewire.on("closeModal", () => {
                $("#create_modal").modal('hide');
                $("#edit_modal").modal('hide');
            })
        });
    </script>
@endpush
