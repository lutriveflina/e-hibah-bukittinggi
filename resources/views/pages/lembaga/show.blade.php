@extends('components.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Lembaga</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lembaga</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                {{-- @can('create', App\Models\Lembaga::class)
                    <a href="{{ route('lembaga.create') }}">
                        <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Lembaga</button>
                    </a>
                @endcan --}}

                <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</button>
                <button type="button" class="btn btn-warning split-bg-warning dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Edit Lembaga</a>
                    <a class="dropdown-item" href="javascript:;">Edit Data Pendukung</a>
                    <a class="dropdown-item" href="javascript:;">Edit Pengurus</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#profil_nav" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Profil</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#pendukung_nav" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Data pendukung</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#pengurus_nav" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Pengurus</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="profil_nav" role="tabpanel">
                <div class="row">
                    <div class="col col-md-9 p-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="col col-12">
                                    <div class="mb-3">
                                        <label for="search" class="form-label">Cari Lembaga</label>
                                        <input type="text" class="form-control" value="{{ $lembaga->name }}" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <div class="mb-3">
                                                <label for="filter" class="form-label">Email</label>
                                                <input type="text" class="form-control" value="{{ $lembaga->email }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col col-6">
                                            <div class="mb-3">
                                                <label for="filter" class="form-label">No. Telp</label>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text">+62</span>
                                                    <input type="text" class="form-control" value="{{ $lembaga->phone }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" rows="3" disabled>{{ $lembaga->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt="Avatar"
                                        class="rounded-circle img-fluid mb-3" style="width: 100px; height: 100px;">
                                    <h5 class="mb-0">{{ $lembaga->name }}</h5>
                                    <h5 class="mb-0">{{ $lembaga->pengurus[0]->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pendukung_nav" role="tabpanel">
                <div class="row">
                    <div class="col col-12 p-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="npwp" class="form-label">No. NPWP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="npwp" id="npwp"
                                        value="{{ old('npwp') }}" required>
                                    @error('npwp')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Akta Kumham -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Akta Kumham/ SK Lembaga <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_akta_kumham"
                                            value="{{ old('no_akta_kumham') }}" required>
                                        @error('no_akta_kumham')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date_akta_kumham"
                                            value="{{ old('date_akta_kumham') }}" required>
                                        @error('date_akta_kumham')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file_akta_kumham"
                                            value="{{ old('file_akta_kumham') }}" required>
                                        @error('file_akta_kumham')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Surat Domisili -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Surat Domisili <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_domisili"
                                            value="{{ old('no_domisili') }}" required>
                                        @error('no_domisili')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date_domisili"
                                            value="{{ old('date_domisili') }}" required>
                                        @error('date_domisili')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file_domisili"
                                            value="{{ old('file_domisili') }}" required>
                                        @error('file_domisili')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Izin Operasional -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Izin Operasional/ Tanda Daftar Lembaga <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_operasional"
                                            value="{{ old('no_operasional') }}" required>
                                        @error('no_operasional')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date_operasional"
                                            value="{{ old('date_operasional') }}" required>
                                        @error('date_operasional')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file_operasional"
                                            value="{{ old('file_operasional') }}" required>
                                        @error('file_operasional')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Surat Pernyataan -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Surat Pernyataan Tidak Tumpang Tindih <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_pernyataan"
                                            value="{{ old('no_pernyataan') }}" required>
                                        @error('no_pernyataan')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date_pernyataan"
                                            value="{{ old('date_pernyataan') }}" required>
                                        @error('date_pernyataan')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file_pernyataan"
                                            value="{{ old('file_pernyataan') }}" required>
                                        @error('file_pernyataan')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="pengurus_nav" role="tabpanel">
                <div class="card mb-4">
                    <div class="card-header h4">
                        Pimpinan Badan/ Lembaga atau Sebutan Lainnya
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name_pimpinan"
                                    value="{{ $lembaga }}" required>
                                @error('name_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email_pimpinan"
                                    value="{{ old('email_pimpinan') }}" required>
                                @error('email_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nik" value="{{ old('nik') }}"
                                    required>
                                @error('nik')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">No. Telp/HP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}"
                                    required>
                                @error('no_hp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Scan KTP <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="scan_ktp"
                                    value="{{ old('scan_ktp') }}" required>
                                @error('scan_ktp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="2" name="alamat_pimpinan" required>{{ old('alamat_pimpinan') }}</textarea>
                            @error('alamat_pimpinan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header h4">
                        Sekretaris
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name_pimpinan"
                                    value="{{ old('name_pimpinan') }}" required>
                                @error('name_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email_pimpinan"
                                    value="{{ old('email_pimpinan') }}" required>
                                @error('email_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nik" value="{{ old('nik') }}"
                                    required>
                                @error('nik')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">No. Telp/HP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}"
                                    required>
                                @error('no_hp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Scan KTP <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="scan_ktp"
                                    value="{{ old('scan_ktp') }}" required>
                                @error('scan_ktp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="2" name="alamat_pimpinan" required>{{ old('alamat_pimpinan') }}</textarea>
                            @error('alamat_pimpinan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header h4">
                        Bendahara
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name_pimpinan"
                                    value="{{ old('name_pimpinan') }}" required>
                                @error('name_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email_pimpinan"
                                    value="{{ old('email_pimpinan') }}" required>
                                @error('email_pimpinan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nik" value="{{ old('nik') }}"
                                    required>
                                @error('nik')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">No. Telp/HP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}"
                                    required>
                                @error('no_hp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Scan KTP <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="scan_ktp"
                                    value="{{ old('scan_ktp') }}" required>
                                @error('scan_ktp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="2" name="alamat_pimpinan" required>{{ old('alamat_pimpinan') }}</textarea>
                            @error('alamat_pimpinan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
