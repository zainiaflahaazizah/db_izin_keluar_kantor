@extends('layouts.kasubbag')

@section('title', 'Data Dokumentasi')

@section('content')

<div class="container">
            <div class="page-inner">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Dokumentasi</h3>

                    <ul class="breadcrumbs mb-3">
                        <li class="nav-home">
                            <a href="{{ url('dashboard') }}">
                                <i class="icon-home"></i>
                            </a>
                        </li>

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('izin.index') }}">Forms</a>
                        </li>

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('kasubbag-umum.dokumentasi.index') }}">Dokumentasi</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER -->

                <div class="row">
                    <div class="col-md-12">

                        <!-- FORM -->
                        <form action="{{ route('kasubbag-umum.dokumentasi.store') }}" method="POST" id="dokumentasiForm" enctype="multipart/form-data">
                            @csrf

                            <div class="card">

                                <!-- CARD HEADER -->
                                <div class="card-header">
                                    <div class="card-title">
                                        Formulir Pengajuan Dokumentasi Keluar Kantor
                                    </div>
                                </div>

                                <!-- CARD BODY -->
                                <div class="card-body">
                                    <div class="row">

                                        <!-- KOLOM KIRI -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <!-- Upload Dokumen -->
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Upload Foto</label>
                                                    <input type="file" id="foto" name="foto" class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg" onchange="previewFile(event)">
                                                </div>

                                                @error('foto')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror

                                                <!-- Preview Gambar / Nama File -->
                                                <div class="mt-3">
                                                    <img id="previewImage" src=""
                                                        style="max-width: 250px; display: none; border-radius: 10px;">

                                                    <p id="fileName"
                                                    style="display:none; font-weight: bold; margin-top: 10px;">
                                                    </p>
                                                </div>
                                            </div>

                                        {{--<div class="col-md-6">
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <input type="hidden"    name="id_izin" value="{{ $izin->id }}">
                                                </div>
                                            </div>
                                        </div>  --}}

                                        {{-- <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Lokasi (Otomatis dari Peta)</label>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input
                                                            type="text"
                                                            name="latitude"
                                                            id="latitude"
                                                            class="form-control @error('latitude') is-invalid @enderror"
                                                            placeholder="Latitude"
                                                            readonly>
                                                        </div>

                                                    <div class="col-md-6">
                                                        <input
                                                            type="text"
                                                            name="longitude"
                                                            id="longitude"
                                                            class="form-control @error('longitude') is-invalid @enderror"
                                                            placeholder="Longitude"
                                                            readonly>
                                                        </div>
                                                    </div>

                                                    @error('latitude')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    @error('longitude')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!-- END KOLOM KIRI -->
                                    </div>
                                </div>
                                <!-- END CARD BODY -->

                                <!-- CARD ACTION -->
                                <div class="card-action d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('kasubbag-umum.dokumentasi.index') }}" class="btn btn-danger ms-2">Batal</a>
                                </div>

                            </div>
                        </form>
                        <!-- END FORM -->

                    </div>
                </div>

            </div>
        </div>

@endsection
