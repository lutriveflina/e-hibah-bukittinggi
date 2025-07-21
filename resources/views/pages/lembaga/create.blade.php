@extends('components.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Formulir Inisiasi Badan/Lembaga</div>
        <!--end breadcrumb-->
    </div>
    <div class="col col-12">
        <form action="{{ route('lembaga.store') }}" method="post" enctype="multipart/form-data"></form>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Form Pendaftaran Lembaga
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="namaLembaga" class="form-label">Nama Badan/ Lembaga atau Sebutan Lainnya <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="namaLembaga" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="noTelp" class="form-label">No. Telp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="noTelp" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="propinsi" class="form-label">Propinsi <span class="text-danger">*</span></label>
                    <select class="form-select" id="propinsi" required>
                        <option selected disabled>Pilih Propinsi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                    <select class="form-select" id="kota" required>
                        <option selected disabled>Pilih Kota/Kabupaten</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" id="kecamatan">
                            <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="kelurahan" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="alamat" rows="2" required></textarea>
                </div>

            </div>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                Dokumen Lembaga
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="npwp" class="form-label">No. NPWP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="npwp" required>
                    </div>

                    <!-- Akta Kumham -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Akta Kumham/ SK Lembaga <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" required>
                        </div>
                    </div>

                    <!-- Surat Domisili -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Surat Domisili <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" required>
                        </div>
                    </div>

                    <!-- Izin Operasional -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Izin Operasional/ Tanda Daftar Lembaga <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" required>
                        </div>
                    </div>

                    <!-- Surat Pernyataan -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Surat Pernyataan Tidak Tumpang Tindih <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Scan Dokumen <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                Pimpinan Badan/ Lembaga atau Sebutan Lainnya
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Telp/HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Scan KTP <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="alert alert-secondary small">
                        Mohon periksa dan pastikan bahwa semua informasi yang Anda unggah sudah benar.
                        Harap diperhatikan bahwa jika terdapat kesalahan atau ketidaksesuaian pada data atau file yang
                        diunggah,
                        pengajuan hibah Anda berpotensi ditolak. Informasi usulan hibah Anda akan dipublikasikan melalui
                        e-Hibah.
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agreement" required>
                        <label class="form-check-label" for="agreement">
                            Saya setuju dengan pernyataan di atas
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>


    </div>
@endsection
