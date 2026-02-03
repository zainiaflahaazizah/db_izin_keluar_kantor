<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Kata Sandi</title>

  <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    {{-- Form untuk mengirim permintaan reset password --}}
    <form method="POST" action="#">
      @csrf

      <h1 style="margin-bottom: 20px">Lupa Kata Sandi</h1>

      <p style="font-size: 14px; text-align: center; color: rgba(255, 255, 255, .7); margin-bottom: 20px; line-height: 1.4;">
        Masukkan Email yang terdaftar di akun Anda. Kami akan mengirimkan tautan reset kata sandi melalui email.
      </p>

      <div class="input-box">
        <input type="email"
               placeholder="Masukkan Email Terdaftar"
               name="email"
               required
               autofocus>
        <i class='bx bxs-envelope'></i>
      </div>

      @error('email')
        <p style="color: #FF6347; font-size: 12px; margin-top: -15px; margin-bottom: 10px;">{{ $message }}</p>
      @enderror

      @if (session('status'))
        <p style="color: #4CAF50; font-size: 14px; margin-bottom: 20px;">
            {{ session('status') }}
        </p>
      @endif

      <button type="submit" class="btn">Kirim Tautan Reset</button>

      <div class="register-link">
        <p><a href="{{ url ('') }}">Kembali ke Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
