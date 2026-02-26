    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Keluar Kantor</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
        }
        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        .no-border {
            border: none;
        }
        .ttd {
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="center bold">
        BADAN PUSAT STATISTIK<br>
        KABUPATEN BANJAR
        <hr>
        <u>SURAT KETERANGAN KELUAR KANTOR</u>
    </div>

    <br>

    <p>
        Yang bertandatangan di bawah ini memohon izin keluar kantor untuk:
    </p>

    <p>
        <input type="checkbox"> Melaksanakan Tugas <br>
        <input type="checkbox"> Urusan Pribadi
    </p>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Kegiatan</th>
                <th rowspan="2">Lokasi Kegiatan</th>
                <th colspan="2">Jam</th>
                <th colspan="2">Target / Realisasi</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Paraf</th>
            </tr>
            <tr>
                <th>Keluar</th>
                <th>Kembali</th>
                <th>Target</th>
                <th>Realisasi</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <br><br>

    <p>
        Martapura, {{ date('d F Y') }}
    </p>

    <table class="no-border ttd">
        <tr class="no-border">
            <td class="no-border center">
                Mengetahui,<br><br>
                Saksi 1<br>
                Plt. Kepala
                <br><br><br>
                (...........................)
            </td>
            <td class="no-border center">
                Saksi 2<br>
                Kepala Subbagian Umum
                <br><br><br><br>
                (...........................)
            </td>
            <td class="no-border center">
                Saksi 3<br>
                Ketua Tim Terkait
                <br><br><br><br>
                (...........................)
            </td>
        </tr>
    </table>

    <br><br>

    <div class="center">
        Pemohon
        <br><br><br>
        (...........................)
    </div>

    <br>

    <small>
        *) Realisasi kegiatan harus dilaporkan dan diparaf masing-masing saksi, kemudian diarsipkan di Subbagian Umum.
    </small>

</body>
</html>
