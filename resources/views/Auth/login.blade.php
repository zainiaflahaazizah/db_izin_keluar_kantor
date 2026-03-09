<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="wrapper">
    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <h1>Login</h1>

        <div class="input-box">
            <input type="text" name="username" placeholder=" " required>
            <label>Username</label>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" id="password" name="password" placeholder=" " required>
            <label>Password</label>

            <!-- icon mata -->
            <i class='bx bx-hide toggle-password'
            id="togglePassword"></i>
        </div>

        <div class="remember-forgot">
            <label><input type="checkbox">Ingat saya</label>
            <a href="#">Lupa kata sandi?</a>
        </div>

        <button type="submit" class="btn">Masuk</button>
    </form>
</div>

<script src="{{ asset('assets/js/auth.js') }}"></script>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('password');
    const icon = this;

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bx-hide');
        icon.classList.add('bx-show');
    } else {
        password.type = 'password';
        icon.classList.remove('bx-show');
        icon.classList.add('bx-hide');
    }
});
</script>

</body>
</html>
