
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - SewaSini</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">
</head>
<body>

<div class="register-page">

    <!-- Bagian Kiri -->
    <div class="register-left">
        <div class="register-brand">
            <i class="fas fa-home"></i>
            <span>SewaSini</span>
        </div>

        <div class="register-left-content">
            <h1>Temukan Hunian Nyaman Bersama SewaSini</h1>
            <p>
                Mulai perjalananmu untuk menemukan kos yang sesuai
                atau daftarkan kos milikmu dengan mudah melalui SewaSini.
            </p>

            <i class="fas fa-house-user register-big-icon"></i>
        </div>

        <div class="register-left-footer">
            © 2026 SewaSini
        </div>
    </div>

    <!-- Bagian Kanan -->
    <div class="register-right">
        <div class="register-form-wrapper">

            <h2>Buat Akun</h2>
            <p class="register-description">
                Silakan lengkapi data berikut untuk membuat akun SewaSini.
            </p>

            
<form action="{{ route('register') }}" method="POST">
    @csrf

    <label>Daftar Sebagai</label>

    <div class="account-type">
        <label class="account-option">
            <input type="radio" name="jenis_akun" value="penyewa"
                {{ old('jenis_akun', 'penyewa') == 'penyewa' ? 'checked' : '' }}>
            <span>
                <i class="fas fa-search"></i>
                Penyewa / Pencari Kos
            </span>
        </label>

        <label class="account-option">
            <input type="radio" name="jenis_akun" value="pemilik"
                {{ old('jenis_akun') == 'pemilik' ? 'checked' : '' }}>
            <span>
                <i class="fas fa-home"></i>
                Pemilik Kos
            </span>
        </label>
    </div>

    <div class="register-field">
        <label>Nama Lengkap</label>
        <input type="text" name="name"
            value="{{ old('name') }}"
            placeholder="Masukkan nama lengkap" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="register-field">
        <label>Email</label>
        <input type="email" name="email"
            value="{{ old('email') }}"
            placeholder="Masukkan email" required>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="register-field">
        <label>Nomor Telepon</label>
        <input type="tel" name="phone"
            value="{{ old('phone') }}"
            placeholder="Masukkan nomor telepon" required>
        @error('phone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="register-field">
        <label>Password</label>
        <input type="password" name="password"
            placeholder="Masukkan password" required>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="register-field">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation"
            placeholder="Ulangi password" required>
    </div>

    <button type="submit" class="register-submit">
        Daftar Akun
    </button>
</form>


            <p class="register-login-text">
                Sudah memiliki akun?
                <a href="{{ url('/login') }}">Login di sini</a>
            </p>

            <a href="{{ url('/') }}" class="register-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>

        </div>
    </div>

</div>
</body>
</html>
