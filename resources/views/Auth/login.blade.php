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
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder=" " required>
                <label>Username</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="Password" name="password" placeholder=" " required>
                <label>Password</label>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Ingat saya</label>
                <a href="#">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn">Masuk</button>
            {{-- <div class="register-link">
                <p>Belum punya akun? <a href="#">register</a></p>
            </div> --}}
        </form>
    </div>

</body>

<script src="{{ asset('assets/js/auth.js') }}"></script>

</html>
