@extends('layouts.kasubbag')

@section('title', 'Data Dokumentasi')

@section('content')

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Izin</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="{{route('kasubbag-umum.izin.index')}}">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="{{route('kasubbag-umum.izin.index')}}">Izin</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Detail</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Izin</h4>
                    </div>
                  </div>
                  <div class="card-body">
                        <div class="col-md-10 mx-auto">
                            <div class="card shadow-lg border-0 rounded-3">
                                <div class="card-body px-5 py-4">

                                    <h2 class="mb-0 text-primary fw-bold">
                                        <i class="fa fa-id-card me-2"></i> Detail Dokumentasi
                                    </h2>
                                    <p class="text-muted">Informasi lengkap dokumentasi izin</p>
                                    <hr class="mt-0 mb-4">

                                    {{-- <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">{{ $izin->pegawai->nama }}</h3>
                                        <span class="badge bg-info text-dark px-3 py-2" style="font-size: 14px;">
                                            {{ $izin->pegawai->nip }}
                                        </span>
                                    </div> --}}

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">foto</th>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $dokumentasi->foto) }}"
                                                            alt="Foto Dokumentasi"
                                                            style="max-width: 300px; height: auto;">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="text-end mt-4">
                                        <a href="{{ route('kasubbag-umum.izin.index') }}" class="btn btn-secondary">
                                            <i class="fa fa-arrow-left me-1"></i> Kembali
                                        </a>
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

@endsection
