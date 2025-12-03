<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Izin Keluar Kantor</title>
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons untuk ikon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="{{ asset('assets/css/form-izin.css') }}" rel="stylesheet">
</head>
<body>

    <div class="wrapper">
        <form action="#" method="post">
            <div class="form-header">
                <img src="{{ asset('assets/img/logo-bps (1).png') }}" alt="Logo Kantor" class="logo-kantor">
                <h1>Formulir Izin Keluar Kantor</h1>
            </div>

            <!-- 1. NAMA --><div class="input-box">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                <i class='bx bxs-user'></i>
            </div>

            <!-- 2. NIM --><div class="input-box">
                <label for="nim">NIM (Nomor Induk Pegawai/Mahasiswa)</label>
                <input type="text" id="nim" name="nim" placeholder="Masukkan NIM Anda" required>
                <i class='bx bxs-id-card'></i>
            </div>

            <!-- 3. JABATAN --><div class="input-box">
                <label for="jabatan">Jabatan/Unit Kerja</label>
                <select id="jabatan" name="jabatan" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <option value="Ketua Tim">Kepala BPS</option>
                    <option value="Ketua Tim">Kepala Subbagian Umum</option>
                    <option value="Staf">Ketua TIm</option>
                    <option value="Mahasiswa Magang/PKL">Anggota</option>
                </select>
            </div>

            <!-- 4. ALASAN KELUAR (Radio Group) --><div class="input-box">
                <label>Alasan Keluar</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="alasan_keluar" value="Pribadi" required> Pribadi
                    </label>
                    <label>
                        <input type="radio" name="alasan_keluar" value="Dinas"> Dinas
                    </label>
                </div>
            </div>

            <!-- 5. WAKTU KELUAR & KEMBALI --><div style="display: flex; gap: 20px;">
                <div class="input-box" style="flex: 1;">
                    <label for="jam_keluar">Jam Keluar</label>
                    <input type="time" id="jam_keluar" name="jam_keluar" required>

                </div>
                <div class="input-box" style="flex: 1;">
                    <label for="jam_kembali">Jam Kembali (Estimasi)</label>
                    <input type="time" id="jam_kembali" name="jam_kembali" required>

                </div>
            </div>

            <!-- 6. KETERANGAN --><div class="input-box">
                <label for="keterangan">Keterangan/Detail Keperluan</label>
                <textarea id="keterangan" name="keterangan" placeholder="Jelaskan secara singkat tujuan dan keperluan Anda keluar kantor..." required></textarea>
            </div>

            <!-- 7. TUJUAN FORM (Persetujuan) --><div class="input-box">
                <label for="tujuan">Tujuan Persetujuan (Atasan)</label>
                <select id="tujuan" name="tujuan" required>
                    <option value="" disabled selected>Pilih Tujuan Persetujuan</option>

                    <!-- DAFTAR KETUA TIM BERDASARKAN NAMA INDIVIDU --><option value="Ketua Tim - Bpk. Ahmad">Ketua Tim - Bpk. Ahmad (Sosial)</option>
                    <option value="Ketua Tim - Ibu Siti">Ketua Tim - Ibu Siti (Distribusi)</option>
                    <option value="Ketua Tim - Bpk. Joni">Ketua Tim - Bpk. Joni (Produksi)</option>
                    <option value="Ketua Tim - Ibu Ani">Ketua Tim - Ibu Ani (IPDS)</option>

                    <option value="Kepala Bagian Umum">Kepala Bagian Umum</option>
                    <option value="Kepala BPS">Kepala BPS</option>
                </select>
            </div>

            <button type="submit" class="btn">Ajukan Izin Keluar</button>

        </form>
    </div>

</body>
</html>
