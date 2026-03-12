@extends('layouts.anggota2')

@section('title', 'Tambah Dokumentasi')

@section('content')

    <div class="container">
            <div class="page-inner">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Dokumentasi</h3>

                    <ul class="breadcrumbs mb-3">
                        {{-- <li class="nav-home">
                            <a href="{{ url('dashboard') }}">
                                <i class="icon-home"></i>
                            </a>
                        </li> --}}

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('anggota.izin.index') }}">Forms</a>
                        </li>

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('anggota.dokumentasi.index') }}">Dokumentasi</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER -->

                <div class="row">
                    <div class="col-md-12">

                        <!-- FORM -->
                        <form action="{{ route('anggota.dokumentasi.store') }}" method="POST" id="dokumentasiForm" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

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
                                                    <label>Pegawai</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        value="{{ auth()->user()->pegawai->nama }}"
                                                        readonly>

                                                    <input type="hidden"
                                                        name="id_pegawai"
                                                        value="{{ auth()->user()->pegawai->id_pegawai }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Izin / Keterangan</label>

                                                <select name="id_izin" class="form-control">
                                                    <option value="">-- Pilih Izin --</option>

                                                    @foreach ($izins as $izin)
                                                        <option value="{{ $izin->id_izin }}">
                                                            {{ $izin->keterangan }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- Upload Dokumen -->
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Upload Foto</label>
                                                    <input type="file" id="foto" name="foto[]" class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg" multiple required onchange="previewFiles(event)">
                                                </div>

                                                @error('foto')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror

                                                <!-- Preview Gambar / Nama File -->
                                                <div class="mt-3">
                                                    <div class="mt-3" id="previewContainer"></div>
                                                </div>
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
                                    <a href="{{ route('anggota.dokumentasi.index') }}" class="btn btn-danger ms-2">Batal</a>
                                </div>

                            </div>
                        </form>
                        <!-- END FORM -->

                    </div>
                </div>

            </div>
        </div>

{{-- <script>
let selectedFiles = [];

function previewFiles(event) {
    const input = event.target;
    const container = document.getElementById('previewContainer');

    container.innerHTML = '';
    selectedFiles = Array.from(input.files);

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {

            const col = document.createElement('div');
            col.style.display = "inline-block";
            col.style.margin = "10px";
            col.style.textAlign = "center";

            col.innerHTML = `
                <div style="border:1px solid #ddd; padding:10px; border-radius:10px;">
                    <img src="${e.target.result}"
                         style="max-width:120px; border-radius:8px; margin-bottom:8px;">

                    <p style="font-size:12px; word-break:break-all;">
                        ${file.name}
                    </p>

                    <button type="button"
                            class="btn btn-sm btn-danger"
                            onclick="removeFile(${index})">
                        Hapus
                    </button>
                </div>
            `;

            container.appendChild(col);
        };

        reader.readAsDataURL(file);
    });
}

function removeFile(index) {
    selectedFiles.splice(index, 1);

    const dt = new DataTransfer();
    selectedFiles.forEach(file => dt.items.add(file));
    document.getElementById('foto').files = dt.files;

    previewFiles({ target: document.getElementById('foto') });
}
</script> --}}

<script>
let selectedFiles = [];

function previewFiles(event) {
    const input = event.target;
    const container = document.getElementById('previewContainer');

    const newFiles = Array.from(input.files);

    // Tambahkan file baru ke array lama (bukan replace)
    newFiles.forEach(file => {
        selectedFiles.push(file);
    });

    updateInputFiles();
    renderPreview();
}

function renderPreview() {
    const container = document.getElementById('previewContainer');
    container.innerHTML = '';

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {

            const col = document.createElement('div');
            col.style.display = "inline-block";
            col.style.margin = "10px";
            col.style.textAlign = "center";

            col.innerHTML = `
                <div style="border:1px solid #ddd; padding:10px; border-radius:10px;">
                    <img src="${e.target.result}"
                         style="max-width:120px; border-radius:8px; margin-bottom:8px;">

                    <p style="font-size:12px; word-break:break-all;">
                        ${file.name}
                    </p>

                    <button type="button"
                            class="btn btn-sm btn-danger"
                            onclick="removeFile(${index})">
                        Hapus
                    </button>
                </div>
            `;

            container.appendChild(col);
        };

        reader.readAsDataURL(file);
    });
}

function removeFile(index) {
    selectedFiles.splice(index, 1);
    updateInputFiles();
    renderPreview();
}

function updateInputFiles() {
    const dt = new DataTransfer();
    selectedFiles.forEach(file => dt.items.add(file));
    document.getElementById('foto').files = dt.files;
}
</script>

@endsection
