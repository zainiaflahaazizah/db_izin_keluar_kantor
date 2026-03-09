@extends('layouts.admin')

@section('title', 'Data Pegawai')

@section('content')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Forms</h3>
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
                  <a href={{ route('admin.pegawai.index') }}>Pegawai</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Isi Data Pegawai</a>
                </li>
              </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.pegawai.store') }}" method="POST" id="pegawaiForm">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Formulir Pegawai Kantor</div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama Anda" required>

                                            @error('nama')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" placeholder="Masukkan NIP Anda" required>

                                            @error('nip')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nip_bps">NIP BPS</label>
                                            <input type="text" id="nip_bps" name="nip_bps" class="form-control @error('nip_bps') is-invalid @enderror" value="{{ old('nip_bps') }}" placeholder="Masukkan NIP BPS Anda" required>
                                        </div>

                                            @error('nip_bps')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <div class="input-box">
                                                <select id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" required>
                                                    <option value="" disabled selected>Pilih Jabatan</option>
                                                    <option value="Kepala BPS">Kepala BPS</option>
                                                    <option value="Kepala Subbagian Umum">Kepala Subbagian Umum</option>
                                                    <option value="Ketua Tim">Ketua Tim</option>
                                                    <option value="Anggota">Anggota</option>
                                                    <option value="Mahasiswa Magang/PKL">Mahasiswa Magang/PKL</option>
                                                </select>
                                                <i class='bx bx-chevron-down'></i>
                                            </div>
                                        </div>

                                            @error('jabatan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="wilayah">Wilayah</label>
                                            <input type="text" id="wilayah" name="wilayah" class="form-control @error('wilayah') is-invalid @enderror" value="{{ old('wilayah') }}" placeholder="Masukkan Wilayah Anda" required>
                                        </div>

                                            @error('wilayah')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" placeholder="Masukkan Status Anda" required>
                                        </div>

                                            @error('status')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" value="{{ old('pendidikan') }}" placeholder="Contoh: S1, D3, SMA" required>
                                        </div>

                                                @error('pendidikan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir..." required>
                                        </div>

                                            @error('tempat_lahir')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                                        </div>

                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input type="text" id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}" required>
                                        </div>

                                            @error('agama')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="card-action d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-danger ms-2">Batal</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection
