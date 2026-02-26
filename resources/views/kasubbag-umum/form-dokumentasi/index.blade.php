@extends('layouts.kepala')

@section('title', 'Data Dokumentasi')

@section('content')

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Dokumentasi</h3>
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
                  <a href="#">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Dokumentasi</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Dokumentasi</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('kasubbag-umum.dokumentasi.create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Dokumentasi
                        </a>
                    </div>
                  </div>
                  <div class="card-body">

                    @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session("success") }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                    @endif

                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover">
                        <thead class="text-center align-middle">
                          <tr>
                            <th>Foto</th>
                            <th>Lokasi</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot class="text-center align-middle">
                          <tr>
                            <th>Foto</th>
                            <th>Lokasi</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>
                        <tbody class="text-center align-middle">
                            @forelse ($dokumentasis as $dokumentasi)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($dokumentasi->foto) }}" width="100">
                                    </td>
                                    <td>
                                        {{ $dokumentasi->latitude }}, {{ $dokumentasi->longitude }}
                                    </td>
                                    <td>
                                    <div class="form-button-action d-flex gap-2">

                                        {{-- SHOW / DETAIL --}}
                                        <a href="{{ route('kasubbag-umum.dokumentasi.show', $dokumentasi->id_dokumentasi) }}"
                                        class="btn btn-link btn-info"
                                        data-bs-toggle="tooltip"
                                        title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('kasubbag-umum.dokumentasi.edit', $dokumentasi->id_dokumentasi) }}"
                                        class="btn btn-link btn-primary"
                                        data-bs-toggle="tooltip"
                                        title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('kasubbag-umum.dokumentasi.destroy', $dokumentasi->id_dokumentasi) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-link btn-danger"
                                                    data-bs-toggle="tooltip"
                                                    title="Hapus">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>

                                    </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data dokumentasi</td>
                                    </tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

@endsection
