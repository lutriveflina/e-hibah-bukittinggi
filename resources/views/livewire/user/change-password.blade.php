<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ubah Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Ubah Password</h3>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" wire:model='current_password' type="text" class="form-control"
                            id="user-name" placeholder="Masukkan Password Saat Ini">
                        @error('current_password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru</label>
                        <input type="password" wire:model='new_password' type="text" class="form-control"
                            id="new_password" placeholder="Masukkan Password Baru">
                        @error('current_password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm_new_password" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" wire:model='confirm_new_password' type="text" class="form-control"
                            id="confirm_new_password" placeholder="Masukan Ulang Password Baru">
                        @error('current_password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button wire:click='update' class="btn btn-warning w-100" id="update_password"
                            @disabled(!$is_confirm)><i class="bi bi-floppy"></i>
                            Ubah
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $("#confirm_new_password, #new_password").on('change', function() {
                Livewire.dispatch('confirm_passowrd')
            })
        });
    </script>
@endpush
