<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pengguna</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" wire:click='create' class="btn btn-primary">Tambah</button>

                <div wire:ignore.self class="modal fade" id="create-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light">Tambah Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="user-name" class="form-label">Nama Pengguna</label>
                                            <input wire:model='name' type="text" class="form-control" id="user-name"
                                                placeholder="Masukkan nama pengguna">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input wire:model='email' type="email" class="form-control" id="email"
                                                placeholder="Masukkan email pengguna">
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select wire:model='role' id="role" class="form-select">
                                                @foreach ($roles as $key => $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div x-show="$wire.role == 2 || $wire.role == 3 || $wire.role == 4"
                                            class="mb-3">
                                            <label for="skpd" class="form-label">SKPD {{ $skpd }}</label>
                                            <select wire:model='skpd' id="skpd" class="form-select">
                                                <option value="">--- Pilih SKPD ---</option>
                                                @foreach ($skpds as $key => $skpd)
                                                <option value="{{ $skpd->id }}">{{ $skpd->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($urusans && $urusans->count())
                                        <div>
                                            <label for="urusan" class="form-label">Urusan</label>
                                            <select wire:model='urusan' id="urusan" class="form-select">
                                                <option value="">--- Pilih Urusan ---</option>
                                                @foreach ($urusans as $urusan)
                                                <option value="{{ $urusan->id }}">{{ $urusan->nama_urusan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click.prevent='store' type="button" class="btn btn-primary">Save
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
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Instansi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->has_role->name }}</td>
                            <td>{{ $user->skpd->name ?? ($user->lembaga->name ?? '') }}</td>
                            <td>
                                <button wire:click='edit({{ $user->id }})' class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i>
                                    Edit</button>
                                <button wire:click='verifyDelete({{ $user->id }})' class="btn btn-sm btn-danger"><i
                                        class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Instansi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Ubah Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Nama Pengguna</label>
                                <input wire:model='name' type="text" class="form-control" id="user-name"
                                    placeholder="Masukkan nama pengguna">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input wire:model='email' type="email" class="form-control" id="email"
                                    placeholder="Masukkan email pengguna">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select wire:model='role' id="role" class="form-select">
                                    @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div x-show="$wire.role != 1 || $wire.role != 5" class="mb-3">
                                <label for="skpd" class="form-label">Instansi</label>
                                <select wire:model='skpd' id="skpd" class="form-select">
                                    <option value="">--- Pilih SKPD ---</option>
                                    @foreach ($skpds as $key => $skpd)
                                    <option value="{{ $skpd->id }}">{{ $skpd->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent='update' type="button" class="btn btn-warning">Simpan
                        Perubahan</button>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="delete-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title">Hapus Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100">
                                <tr>
                                    <td>Nama Pengguna</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>{{ $user->has_role->name }}</td>
                                </tr>
                                <tr>
                                    <td>Instansi</td>
                                    <td>:</td>
                                    <td>{{ $user->skpd->name ?? ($user->lembaga->name ?? '') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent='delete' type="button" class="btn btn-danger">Hapus
                        Pengguna</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
            Livewire.on("createModal", () => {
                $('#create-modal').modal('show');
            });

            $("#create-modal #skpd").on('change', function(){
                Livewire.dispatch('updatedSkpd');
            })

            Livewire.on("editModal", () => {
                $('#edit-modal').modal('show');
            });

            Livewire.on("verifyingDelete", () => {
                $('#delete-modal').modal('show');
            });

            Livewire.on("closeModal", () => {
                $('#create-modal').modal('hide');
                $('#edit-modal').modal('hide');
                $('#delete-modal').modal('hide');
            });
        })
</script>
@endpush