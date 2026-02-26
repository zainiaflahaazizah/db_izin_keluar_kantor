@extends('layouts.anggota')

@section('title', 'Data Izin')

@section('content')

<section class="section-padding" id="section_2">
                <div class="container">

                    <!-- Judul Section -->
                    <div class="row mb-4">
                        <div class="col-lg-12 text-center">
                            <h2 class="mb-3">Data Izin Pegawai</h2>
                            <p class="text-muted">
                                Daftar izin keluar kantor pegawai yang telah diajukan
                            </p>
                        </div>
                    </div>

                    <!-- Card Tabel -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm border-1">

                                <!-- Card Header -->
                                <div class="card-header bg-white border-0 d-flex align-items-center">
                                    <h5 class="mb-0 fw-bold">Tabel Izin</h5>

                                    <a href="{{ route('anggota.izin.create') }}"
                                    class="btn btn-sm btn-success ms-auto">
                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Izin
                                    </a>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">

                                    {{-- Alert Success --}}
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle text-center">

                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Jabatan</th>
                                                    <th>Alasan</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Jam Kembali</th>
                                                    <th>Keterangan</th>
                                                    <th>Tujuan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

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
                                                            <span class="badge bg-warning text-dark">
                                                                Menunggu
                                                            </span>
                                                        @elseif ($izin->status === 'disetujui')
                                                            <span class="badge bg-success">
                                                                Disetujui
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger">
                                                                Ditolak
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">

                                                            <!-- Detail -->
                                                            <a href="{{ route('anggota.izin.show', $izin->id_izin) }}"
                                                            class="btn btn-sm btn-outline-info"
                                                            title="Detail">
                                                                <i class="bi bi-eye"></i>
                                                            </a>

                                                            <!-- Edit -->
                                                            <a href="{{ route('anggota.izin.edit', $izin->id_izin) }}"
                                                            class="btn btn-sm btn-outline-primary"
                                                            title="Edit">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>

                                                            <!-- Delete -->
                                                            <form action="{{ route('anggota.izin.destroy', $izin->id_izin) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin hapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-outline-danger"
                                                                        title="Hapus">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>

                                                            <!-- PDF -->
                                                            @if ($izin->status === 'disetujui')
                                                                <a href="{{ route('surat-keluar.pdf', $izin->id_izin) }}"
                                                                class="btn btn-sm btn-outline-secondary"
                                                                target="_blank"
                                                                title="Cetak PDF">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center text-muted">
                                                        Tidak ada data izin
                                                    </td>
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
            </section>

@endsection
