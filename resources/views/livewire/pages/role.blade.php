<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Role</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Role</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRole"><i
                        class="bi bi-plus-lg"></i> Tambah</button>
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="createRole" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light">Tambah Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="roleName" class="form-label">Nama Role</label>
                                            <input wire:model='name' type="text" class="form-control"
                                                id="permissionName" placeholder="Masukkan nama permission">
                                        </div>
                                        <div class="mb-3">
                                            <label for="selectedPermissions" class="form-label">Permission</label>
                                            <select wire:ignore class="multiple-select" id="selectedPermissions"
                                                data-placeholder="Choose anything" multiple="multiple">
                                                @foreach ($permissions as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="guard_name" class="form-label">Guard Name</label>
                                            <select wire:model='guard_name' class="form-control" id="guard_name">
                                                <option value="web">Pilih Guard Name</option>
                                                <option selected value="web">Web</option>
                                                <option value="api">API</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click.prevent='save' type="button" class="btn btn-primary">Save
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
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Guard Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr wire:key="{{ $item->id }}">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->guard_name }}</td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRole"><i
                                            class="bi bi-pencil-square"></i> Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            const modal = $('#createRole');
            const select = $('#selectedPermissions');

            modal.on('shown.bs.modal', function() {
                select.select2({
                    dropdownParent: modal,
                    placeholder: 'Choose anything',
                    allowClear: true,
                    width: '100%'
                });

                // 🧠 Kirim data ke Livewire secara manual
                select.on('change', function() {
                    const selectedValues = $(this).val(); // array of value
                    console.log(selectedValues);

                    @this.set('selectedPermissions', selectedValues);
                });
            });

            // Optional: Destroy select2 saat modal ditutup
            modal.on('hidden.bs.modal', function() {
                select.select2('destroy');
            });
        });
    </script>
@endpush
