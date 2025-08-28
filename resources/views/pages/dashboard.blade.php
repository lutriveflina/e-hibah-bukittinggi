@extends('components.layouts.app')

@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboards</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">CMS Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-12 col-lg-12 col-xl-12 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Selamat Datang <span class="text-primary">{{ ucwords(auth()->user()->name)
                                }}</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->hasRole('Super Admin'))
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Perngguna</p>
                            <h4 class="mb-0 text-primary">{{ $user->count() }}</h4>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="border-top my-2"></div>
                    <small class="mb-0"><span class="text-success">+2.5 <i class="bi bi-arrow-up"></i></span> Compared
                        to
                        last month</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Lembaga</p>
                            <h4 class="mb-0 text-success">{{ $lembaga->count() }}</h4>
                        </div>
                        <div class="ms-auto fs-2 text-success">
                            <i class="bi bi-buildings"></i>
                        </div>
                    </div>
                    <div class="border-top my-2"></div>
                    <small class="mb-0"><span class="text-success">+3.6 <i class="bi bi-arrow-up"></i></span> Compared
                        to
                        last month</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Pencairan</p>
                            <h4 class="mb-0 text-pink">Rp. 0</h4>
                        </div>
                        <div class="ms-auto fs-2 text-pink">
                            <i class="bi bi-patch-check"></i>
                        </div>
                    </div>
                    <div class="border-top my-2"></div>
                    <small class="mb-0"><span class="text-danger">-1.8 <i class="bi bi-arrow-down"></i></span>
                        Compared to
                        last month</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Return</p>
                            <h4 class="mb-0 text-orange">146</h4>
                        </div>
                        <div class="ms-auto fs-2 text-orange">
                            <i class="bi bi-recycle"></i>
                        </div>
                    </div>
                    <div class="border-top my-2"></div>
                    <small class="mb-0"><span class="text-success">+3.7 <i class="bi bi-arrow-up"></i></span> Compared
                        to
                        last month</small>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    @endif

    <div class="row">
        <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-success text-white">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <h3 class="mb-0">{{ $permohonan->count() }}</h3>
                                    <p class="mb-0">Permohonan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-tiffany text-white">
                                        <i class="bi bi-file-earmark-break-fill"></i>
                                    </div>
                                    <h3 class="mb-0">{{ $permohonan->whereBetween('id_status', [1, 3])->count() }}
                                    </h3>
                                    <p class="mb-0">Draft</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-success text-white">
                                        <i class="bi bi-file-earmark-check-fill"></i>
                                    </div>
                                    <h3 class="mb-0">{{ $permohonan->whereBetween('id_status', [4, 6])->count() }}
                                    </h3>
                                    <p class="mb-0">Diperiksa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-pink text-white">
                                        <i class="bi bi-exclamation-square-fill"></i>
                                    </div>
                                    <h3 class="mb-0">{{ $permohonan->where('id_status', 7)->count() }}</h3>
                                    <p class="mb-0">Direkomendasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-purple text-white">
                                        <i class="bi bi-tags-fill"></i>
                                    </div>
                                    <h3 class="mb-0">
                                        {{ $permohonan->whereIn('id_status', [8, 10, 11, 12])->count() }}
                                    </h3>
                                    <p class="mb-0">Dikoreksi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-danger text-white">
                                        <i class="bi bi-file-earmark-x-fill"></i>
                                    </div>
                                    <h3 class="mb-0">{{ $permohonan->where('id_status', 9)->count() }}</h3>
                                    <p class="mb-0">Ditolak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Pencairan</h5> <small>Dalam Juta Rupiah*</small>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    @endsection

    @push('scripts')
    <script src="/assets/js/index5.js"></script>
    @endpush