@extends('layouts.kepala')

@section('title', 'Data Izin')

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
                  <a href="#">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Izin</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Izin</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('kasubbag-umum.izin.create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Izin
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
                            <th>Jabatan</th>
                            <th>Alasan</th>
                            <th>Jam Keluar</th>
                            <th>Jam Kembali</th>
                            <th>Keterangan</th>
                            <th>Tujuan Persetujuan</th>
                            <th>Status</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot class="text-center align-middle">
                          <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Alasan</th>
                            <th>Jam Keluar</th>
                            <th>Jam Kembali</th>
                            <th>Keterangan</th>
                            <th>Tujuan Persetujuan</th>
                            <th>Status</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($izins as $izin)
                                <tr>
                                    <td>{{ $izin->pegawai->nama }}</td>
                                    <td>{{ $izin->pegawai->nip }}</td>
                                    <td>{{ $izin->pegawai->jabatan }}</td>
                                    <td>{{ $izin->alasan }}</td>
                                    <td>{{ $izin->jam_keluar }}</td>
                                    <td>{{ $izin->jam_kembali }}</td>
                                    <td>{{ $izin->keterangan }}</td>
                                    <td>{{ $izin->tujuan_persetujuan }}</td>
                                    <td>
                                        @if ($izin->status === 'menunggu')
                                            <span class="badge bg-warning">Menunggu</span>
                                        @elseif ($izin->status === 'disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                    <div class="form-button-action d-flex gap-2">

                                        {{-- SHOW / DETAIL --}}
                                        <a href="{{ route('kasubbag-umum.izin.show', $izin->id_izin) }}"
                                        class="btn btn-link btn-info"
                                        data-bs-toggle="tooltip"
                                        title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('kasubbag-umum.izin.edit', $izin->id_izin) }}"
                                        class="btn btn-link btn-primary"
                                        data-bs-toggle="tooltip"
                                        title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- DOKUMENTASI (HANYA JIKA DISETUJUI)
                                        @if ($izin->status === 'disetujui')
                                            <a href="{{ route('izin.dokumentasi.create', $izin->id_izin) }}"
                                            class="btn btn-link btn-success"
                                            data-bs-toggle="tooltip"
                                            title="Tambah Dokumentasi">
                                                <i class="fa fa-camera"></i>
                                            </a>
                                        @endif --}}

                                        {{-- DELETE --}}
                                        <form action="{{ route('kasubbag-umum.izin.destroy', $izin->id_izin) }}"
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


                                        {{-- CETAK PDF (hanya jika disetujui, opsional) --}}
                                        @if ($izin->status == 'disetujui')
                                            <a href="{{ route('surat-keluar.pdf', $izin->id_izin) }}"
                                            class="btn btn-link btn-danger"
                                            data-bs-toggle="tooltip"
                                            title="Cetak Surat PDF"
                                            target="_blank">
                                                <i class="fa fa-file-pdf"></i>
                                            </a>
                                        @endif

                                    </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data izin</td>
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
