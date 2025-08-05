<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PTPN4</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="logo-circle">
                <img src="{{ asset('images/logo.png') }}" alt="PTPN Logo" class="logo-login">
            </div>
            <div class="welcome-msg">Selamat Datang!</div>
            <div class="welcome-sub">Silahkan Login Terlebih Dahulu</div>
            {{-- <a href="{{ route('register') }}" class="btn-signup">Sign Up</a> --}}
        </div>
        <div class="right">
            <div class="sign-in-title">Sign in</div>
            {{-- <div class="social-buttons">
                <div class="social-btn" title="Facebook">f</div>
                <div class="social-btn" title="Google">G</div>
                <div class="social-btn" title="Twitter">X</div>
            </div> --}}
            {{-- <div class="or-text">atau gunakan akun anda</div> --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                @error('username')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <label for="password">Password :</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" required autofocus>
                @error('password')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn-login">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
