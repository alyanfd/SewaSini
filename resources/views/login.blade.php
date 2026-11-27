
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SewaSini</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">
</head>
<body>

<div class="login-page">

    <!-- BAGIAN KIRI -->
    <div class="login-left">

        <div class="login-photo"></div>
        <div class="login-overlay"></div>

        <div class="login-brand">
            <i class="fas fa-home"></i>
            <span>SewaSini</span>
        </div>

        <div class="login-left-content">
            <h1>Selamat Datang Kembali!</h1>

            <p>
                Masuk ke akun SewaSini untuk melanjutkan perjalananmu
                menemukan kos nyaman atau mengelola kos milikmu.
            </p>
        </div>

        <div class="login-left-footer">
            © 2026 SewaSini
        </div>

    </div>

    <!-- BAGIAN KANAN -->
    <div class="login-right">

        <div class="login-form-wrapper">

            <h2>Login Akun</h2>

            <p class="login-description">
                Silakan masukkan email dan password untuk masuk ke akunmu.
            </p>

            <form>

                <div class="login-field">
                    <label>Email</label>
                    <div class="login-input">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Masukkan email">
                    </div>
                </div>

                <div class="login-field">
                    <label>Password</label>
                    <div class="login-input">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Masukkan password">
                    </div>
                </div>

                <div class="login-options">
                    <label>
                        <input type="checkbox">
                        Ingat Saya
                    </label>

                    <a href="#">Lupa Password?</a>
                </div>

                <button type="submit" class="login-submit">
                    Login
                </button>

            </form>

            <p class="login-register-text">
                Belum memiliki akun?
                <a href="{{ url('/daftar-akun') }}">Daftar Akun</a>
            </p>

            <a href="{{ url('/') }}" class="login-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

</body>
</html>
