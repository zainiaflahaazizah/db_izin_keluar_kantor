@extends('layouts.admin')

@section('title', 'Data Akun')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
                  <a href={{ route('akun.index') }}>Akun</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Isi Akun</a>
                </li>
              </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('akun.store') }}" method="POST" id="akunForm">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Formulir Data Akun</div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan Username" required>

                                            @error('username')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>

                                            <div class="input-group">
                                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" required>
                                                <span class="input-group-text" style="cursor: pointer" onclick="togglePassword()">
                                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                                </span>
                                            </div>

                                            @error('password')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <div class="input-box">
                                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
                                                    <option value="" disabled selected>Pilih Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kepala BPS">Kepala BPS</option>
                                                    <option value="Kasubbag Umum">Kepala Subbagian Umum</option>
                                                    <option value="Ketua Tim">Ketua Tim</option>
                                                    <option value="Anggota">Anggota</option>
                                                </select>
                                                {{-- <i class='bx bx-chevron-down'></i> --}}
                                            </div>
                                        </div>

                                            @error('role')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-action d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('akun.index') }}" class="btn btn-danger ms-2">Batal</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>

@endsection
