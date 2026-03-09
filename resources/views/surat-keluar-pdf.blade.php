<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Izin Keluar Kantor</title>
    <style>
        @page {
            margin: 40px 60px 60px 60px;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        hr {
            border: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }

        .no-border td {
            border: none;
            padding: 4px;
        }

        .ttd {
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <div class="center bold" style="margin-top: 0; margin-bottom: 20px;">
        BADAN PUSAT STATISTIK<br>
        KABUPATEN BANJAR
    </div>

    <hr>

    <div class="center bold" style="margin-top: 10px">
        <u>SURAT KETERANGAN KELUAR KANTOR</u>
    </div>

    <br>

    <p>
        Yang bertandatangan di bawah ini menerangkan bahwa:
    </p>

    <table class="no-border">
        <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td> {{ $izin->pegawai->nama}}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $izin->pegawai->nip }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $izin->pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td>Jenis Izin</td>
            <td>:</td>
            <td> {{ ucfirst($izin->alasan) }}</td>
        </tr>
    </table>

    <br>

    <table>
        <thead class="center">
            <tr>
                <th>Nama Kegiatan</th>
                <th>Lokasi</th>
                <th>Jam Keluar</th>
                <th>Jam Kembali</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="center">
                <td>{{ $izin->keterangan }}</td>
                <td>{{ $izin->lokasi_kegiatan }}</td>
                <td>{{ $izin->jam_keluar }}</td>
                <td>{{ $izin->jam_kembali }}</td>
                <td>{{ $izin->keterangan }}</td>
            </tr>
        </tbody>
    </table>

    <br><br>

    <p style="text-align: right; margin-top: 30px;">
        Martapura, {{ $izin->created_at->translatedFormat('d F Y') }}
    </p>

    <table class="no-border ttd">
        <tr class="center">
            <td>Mengetahui,<br>Plt. Kepala<br><br><br>(__________)</td>
            <td>Kepala Subbagian Umum<br><br><br><br>(__________)</td>
            <td>Pemohon<br><br><br><br>{{ $izin->pegawai->nama }}</td>
        </tr>
    </table>

    <br>

    <small>
        *) Realisasi kegiatan harus dilaporkan dan diparaf masing-masing pihak terkait.
    </small>

</body>
</html>
