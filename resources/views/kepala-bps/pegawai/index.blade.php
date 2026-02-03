@extends('layouts.kepala')

@section('title', 'Pegawai')
@section('page-title', 'Daftar Pegawai')


@section('content')

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Tabel Pegawai</h3>
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
                  <a href="{{ route('pegawai.index') }}">Pegawai</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Pegawai</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('pegawai.create') }}">
                        <i class="fa fa-plus"></i>
                        Tambah Pegawai
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
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIP BPS</th>
                            <th>Jabatan</th>
                            <th>Wilayah</th>
                            <th>Status</th>
                            <th>Pendidikan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>

                        <tfoot class="text-center align-middle">
                          <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIP BPS</th>
                            <th>Jabatan</th>
                            <th>Wilayah</th>
                            <th>Status</th>
                            <th>Pendidikan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>

                        <tbody>
                            @forelse ($pegawais as $pegawai)
                                <tr>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->nip }}</td>
                                    <td>{{ $pegawai->nip_bps }}</td>
                                    <td>{{ $pegawai->jabatan }}</td>
                                    <td>{{ $pegawai->wilayah }}</td>
                                    <td>{{ $pegawai->status }}</td>
                                    <td>{{ $pegawai->pendidikan }}</td>
                                    <td>{{ $pegawai->tempat_lahir }}</td>
                                    <td>{{ $pegawai->tanggal_lahir }}</td>
                                    <td>{{ $pegawai->agama }}</td>
                                    <td>
                                    <div class="form-button-action d-flex gap-2">

                                        {{-- SHOW / DETAIL --}}
                                        <a href="{{ route('pegawai.show', $pegawai->id_pegawai) }}"
                                        class="btn btn-link btn-info"
                                        data-bs-toggle="tooltip"
                                        title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('pegawai.edit', $pegawai->id_pegawai) }}"
                                        class="btn btn-link btn-primary"
                                        data-bs-toggle="tooltip"
                                        title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('pegawai.destroy', $pegawai->id_pegawai) }}"
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
                                        <td colspan="10" class="text-center">Tidak ada data pegawai</td>
                                    </tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                        {{-- <div class="d-flex justify-content-center mt-3">
                            {{ $pegawais->links() }}
                        </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
