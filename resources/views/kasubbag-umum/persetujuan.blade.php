@extends('layouts.kasubbag')

@section('title', 'Data Pegawai')

@section('content')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Persetujuan</h3>
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
                  <a href="#">Tabel Persetujuan</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Tabel Persetujuan</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Row </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Create a new row using this form, make sure you
                              fill them all
                            </p>
                            <form>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill name"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Position</label>
                                    <input
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill position"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Office</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill office"
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Add
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan/Unit Kerja</th>
                            <th>Alasan Keluar</th>
                            <th>Jam keluar</th>
                            <th>Jam Kembali</th>
                            <th>Keterangan</th>
                            <th>Tujuan Persetujuan</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan/Unit Kerja</th>
                            <th>Alasan Keluar</th>
                            <th>Jam keluar</th>
                            <th>Jam Kembali</th>
                            <th>Keterangan</th>
                            <th>Tujuan Persetujuan</th>
                            <th style="width: 10%">Status</th>
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
                                    <td>{{ $izin->jam_kembali ?? '-' }}</td>
                                    <td>{{ $izin->keterangan ?? '-' }}</td>
                                    <td>{{ $izin->tujuan_persetujuan }}</td>

                                    {{-- STATUS --}}
                                    <td>
                                        @if ($izin->status === 'menunggu')
                                            <span class="badge bg-warning">Menunggu</span>
                                        @elseif ($izin->status === 'disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td>
                                        @if ($izin->status === 'menunggu' && str_contains($izin->tujuan_persetujuan, 'Kepala Subbagian Umum'))

                                        <div class="d-flex justify-content-center gap-1">

                                        {{-- SETUJUI --}}
                                        <form action="{{ route('approval.setujui', $izin->id_izin) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="btn btn-success btn-sm"
                                                data-bs-toggle="tooltip"
                                                title="Setujui">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        </form>

                                        {{-- TOLAK --}}
                                        <form action="{{ route('approval.tolak', $izin->id_izin) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                data-bs-toggle="tooltip"
                                                title="Tolak">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        </form>

                                        </div>

                                        @elseif ($izin->status !== 'menunggu')

                                        <span class="text-muted fst-italic">Selesai</span>

                                        @else

                                        <span class="text-muted fst-italic">Tidak ada aksi</span>

                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">
                                        Tidak ada data persetujuan
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
        </div>

@endsection
