@extends('layouts.admin')

@section('title', 'Data Akun')

@section('content')


<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Akun</h3>
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
                  <a href="#">Akun</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Akun</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('akun.create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Akun
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot class="text-center align-middle">
                          <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($akuns as $akun)
                                <tr>
                                    <td>{{ $akun->username }}</td>
                                    <td>{{ $akun->password }}</td>
                                    <td>{{ $akun->role }}</td>
                                    <td>
                                    <div class="form-button-action d-flex gap-2">

                                        {{-- SHOW / DETAIL --}}
                                        <a href="{{ route('akun.show', $akun->id_akun) }}"
                                        class="btn btn-link btn-info"
                                        data-bs-toggle="tooltip"
                                        title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('akun.edit', $akun->id_akun) }}"
                                        class="btn btn-link btn-primary"
                                        data-bs-toggle="tooltip"
                                        title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <form action="{{ route('akun.destroy', $akun->id_akun) }}"
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
                                        <td colspan="10" class="text-center">Tidak ada data akun</td>
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
