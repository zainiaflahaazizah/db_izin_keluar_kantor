@extends('layouts.admin')

@section('title', 'Data Pegawai')

@section('content')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Detail Pegawai</h3>
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
                  <a href="#">Detail</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Detail Pegawai</h4>
                    </div>
                  </div>
                    <div class="card-body">
                        <div class="col-md-10 mx-auto">
                            <div class="card shadow-lg border-0 rounded-3">
                                <div class="card-body px-5 py-4">

                                    <h2 class="mb-0 text-primary fw-bold">
                                        <i class="fa fa-id-card me-2"></i> Detail Pegawai
                                    </h2>
                                    <p class="text-muted">Informasi lengkap pegawai BPS</p>
                                    <hr class="mt-0 mb-4">

                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">{{ $pegawai->nama }}</h3>
                                        <span class="badge bg-info text-dark px-3 py-2" style="font-size: 14px;">
                                            {{ $pegawai->jabatan }}
                                        </span>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">NIP</th>
                                                    <td>{{ $pegawai->nip ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIP BPS</th>
                                                    <td>{{ $pegawai->nip_bps ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jabatan</th>
                                                    <td>{{ $pegawai->jabatan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Wilayah</th>
                                                    <td>{{ $pegawai->wilayah }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <span class="badge
                                                            @if ($pegawai->status == 'Aktif') bg-success
                                                            @elseif ($pegawai->status == 'Cuti') bg-warning text-dark
                                                            @else bg-secondary
                                                            @endif
                                                        px-3 py-2">
                                                            {{ $pegawai->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Pendidikan</th>
                                                    <td>{{ $pegawai->pendidikan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>{{ $pegawai->tempat_lahir }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>{{ $pegawai->tanggal_lahir }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Agama</th>
                                                    <td>{{ $pegawai->agama }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="text-end mt-4">
                                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">
                                            <i class="fa fa-arrow-left me-1"></i> Kembali
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>


@endsection
