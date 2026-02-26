@extends('layouts.anggota')

@section('title', 'Data Dokumentasi')

@section('content')

<section class="section-padding" id="section_2">
    <div class="container">

        <!-- Judul Section -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Data Dokumentasi</h2>
                <p class="text-muted">
                    Daftar dokumentasi kegiatan pegawai
                </p>
            </div>
        </div>

        <!-- Card Tabel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-1">

                    <!-- Card Header -->
                    <div class="card-header bg-white border-0 d-flex align-items-center">
                        <h5 class="mb-0 fw-bold">Tabel Dokumentasi</h5>

                        <a href="{{ route('ketua-tim.dokumentasi.create') }}"
                           class="btn btn-sm btn-success ms-auto">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Dokumentasi
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
                                        <th>Foto</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse ($dokumentasis as $dokumentasi)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($dokumentasi->foto) }}"
                                                 class="img-thumbnail"
                                                 width="120">
                                        </td>
                                        <td>
                                            {{ $dokumentasi->latitude }},
                                            {{ $dokumentasi->longitude }}
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center gap-2">

                                                <!-- Detail -->
                                                <a href="{{ route('ketua-tim.dokumentasi.show', $dokumentasi->id_dokumentasi) }}"
                                                   class="btn btn-sm btn-outline-info"
                                                   title="Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('ketua-tim.dokumentasi.edit', $dokumentasi->id_dokumentasi) }}"
                                                   class="btn btn-sm btn-outline-primary"
                                                   title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('ketua-tim.dokumentasi.destroy', $dokumentasi->id_dokumentasi) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger"
                                                            title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            Tidak ada data dokumentasi
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
