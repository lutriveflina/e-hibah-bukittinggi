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
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Selamat Datang <span
                                    class="text-primary">{{ ucwords(auth()->user()->name) }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 row-cols-xxl-6">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
                            <i class="bi bi-file"></i>
                        </div>
                        <p class="mb-0">Permohonan</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-info">
                            <i class="bi bi-file-earmark"></i>
                        </div>
                        <p class="mb-0">Draft</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->whereBetween('id_status', [1, 3])->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-warning text-warning">
                            <i class="bi bi-search"></i>
                        </div>
                        <p class="mb-0">Diperiksa</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->whereBetween('id_status', [4, 5])->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>
                        <p class="mb-0">Direkomendasi</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->where('id_status', 7)->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
                            <i class="bi bi-flag-fill"></i>
                        </div>
                        <p class="mb-0">Dikoreksi</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->whereIn('id_status', [8, 10, 11, 12])->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                            <i class="bi bi-file-earmark-x-fill"></i>
                        </div>
                        <p class="mb-0">Ditolak</p>
                        <h3 class="mt-4 mb-0">{{ $permohonan->where('id_status', 9)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
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
                                        <h3 class="mb-0">16</h3>
                                        <p class="mb-0">Pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 mb-0 border shadow-none">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-tiffany text-white">
                                            <i class="bi bi-file-earmark-break-fill"></i>
                                        </div>
                                        <h3 class="mb-0">25</h3>
                                        <p class="mb-0">Permohonan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 mb-0 border shadow-none">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-success text-white">
                                            <i class="bi bi-file-earmark-check-fill"></i>
                                        </div>
                                        <h3 class="mb-0">35</h3>
                                        <p class="mb-0">Posts</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 mb-0 border shadow-none">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-pink text-white">
                                            <i class="bi bi-exclamation-square-fill"></i>
                                        </div>
                                        <h3 class="mb-0">18</h3>
                                        <p class="mb-0">Files</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 mb-0 border shadow-none">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-purple text-white">
                                            <i class="bi bi-tags-fill"></i>
                                        </div>
                                        <h3 class="mb-0">22</h3>
                                        <p class="mb-0">Categories</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col">
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-orange text-white">
                                        <i class="bi bi-chat-left-quote-fill"></i>
                                    </div>
                                    <h3 class="mb-0">45</h3>
                                    <p class="mb-0">Comments</p>
                                </div>
                            </div>
                        </div> --}}
                            <div class="col">
                                <div class="card radius-10 mb-0 border shadow-none">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-danger text-white">
                                            <i class="bi bi-file-earmark-x-fill"></i>
                                        </div>
                                        <h3 class="mb-0">45</h3>
                                        <p class="mb-0">Comments</p>
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
                                <h5 class="mb-0">User Status</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
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

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Statistics</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-center gap-4">
                            <div id="chart3"></div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="bi bi-circle-fill text-primary me-1"></i> Visitors:
                                    <span class="me-1">89</span>
                                </li>
                                <li class="list-group-item"><i class="bi bi-circle-fill text-danger me-1"></i>
                                    Subscribers:
                                    <span class="me-1">45</span>
                                </li>
                                <li class="list-group-item"><i class="bi bi-circle-fill text-success me-1"></i>
                                    Contributor:
                                    <span class="me-1">35</span>
                                </li>
                                <li class="list-group-item"><i class="bi bi-circle-fill text-orange me-1"></i> Author:
                                    <span class="me-1">62</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Site Speed</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-6 col-xl-6">
                                <div id="chart4"></div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-6">
                                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 g-3">
                                    <div class="col">
                                        <div class="card radius-10 mb-0 shadow-none bg-light-purple">
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0 text-purple">75</h5>
                                                    <p class="mb-0 text-purple">Grade</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 mb-0 shadow-none bg-light-orange">
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0 text-orange">1.9mb</h5>
                                                    <p class="mb-0 text-orange">Page Size</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 mb-0 shadow-none bg-light-success">
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0 text-success">634 mc</h5>
                                                    <p class="mb-0 text-success">Load Time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 mb-0 shadow-none bg-light-primary">
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0 text-primary">48</h5>
                                                    <p class="mb-0 text-primary">Requests</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent p-3">
                        <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Posts vs Comments</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                                    <div class="font-13"><i class="bi bi-circle-fill text-info"></i><span
                                            class="ms-2">Posts</span></div>
                                    <div class="font-13"><i class="bi bi-circle-fill text-orange"></i><span
                                            class="ms-2">Comments</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Statistics</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    @endsection

    @push('scripts')
        <script src="/assets/js/index5.js"></script>
    @endpush
