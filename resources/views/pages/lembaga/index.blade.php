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
                <a href="{{ route('lembaga.create') }}">
                    <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Lembaga</button>
                </a>

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

    <div class="row">
        <div class="col col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="col col-12">
                        <div class="mb-3">
                            <label for="search" class="form-label">Cari Lembaga</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="mb-3">
                                    <label for="filter" class="form-label">Email</label>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="mb-3">
                                    <label for="filter" class="form-label">No. Telp</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">+62</span>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" disabled></textarea>
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
                        <h5 class="mb-0">Nama Lembaga</h5>
                    </div>
                </div>
            </div>
        </div>
    @endsection
