<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="wrapper">
        <form action="">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder=" " required>
                <label>Username</label>
                <i class='bx bxs-user'></i>
            </div>
            {{-- <div class="input-box">
                <input type="email" name="email" placeholder=" " required>
                <label>Email</label>
                <i class='bx bxs-user'></i>
            </div> --}}
            <div class="input-box">
                <input type="Password" name="password" placeholder=" " required>
                <label>Password</label>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="Password" name="password_confirmation" placeholder=" " required>
                <label>Konfirmasi Password</label>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="termsCheckbox" onclick="toggleDaftarButton()">
                <label class="form-check-label" for="termsCheckbox">
                    Saya setuju dengan <a href="#">Syarat dan Ketentuan</a>
                </label>
            </div>

            <button type="submit" class="btn" id="daftarButton" disabled>Daftar</button>
            <div class="register-link">
                <p>Sudah punya akun? <a href="#">Masuk</a></p>
            </div>
        </form>
    </div>

</body>

<script src="{{ asset('assets/js/auth.js') }}"></script>

<!-- Script -->
<script>
    // 1. Dapatkan referensi ke checkbox dan tombol
    const checkbox = document.getElementById('termsCheckbox');
    const tombolDaftar = document.getElementById('daftarButton');

    // 2. Definisikan fungsi yang akan memeriksa status checkbox
    function toggleDaftarButton() {
        // Jika checkbox dicentang (checked)
        if (checkbox.checked) {
            // Hapus atribut 'disabled' -> Tombol menjadi Enabled
            tombolDaftar.removeAttribute('disabled');
        } else {
            // Tambahkan atribut 'disabled' -> Tombol menjadi Disabled
            tombolDaftar.setAttribute('disabled', 'disabled');
        }
    }
</script>
</html>
