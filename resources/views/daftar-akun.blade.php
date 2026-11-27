
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

    <!-- BAGIAN KIRI -->
    <div class="register-left">

        <!-- Foto dan gradasi -->
        <div class="register-photo"></div>
        <div class="register-overlay"></div>

        <!-- Logo -->
        <div class="register-brand">
            <i class="fas fa-home"></i>
            <span>SewaSini</span>
        </div>

        <!-- Tulisan sambutan -->
        <div class="register-left-content">

            <h1>Temukan Hunian Nyaman Bersama SewaSini</h1>

            <p>
                Mulai perjalananmu untuk menemukan kos yang sesuai
                atau daftarkan kos milikmu dengan mudah melalui SewaSini.
            </p>

        </div>

        <!-- Copyright -->
        <div class="register-left-footer">
            © 2026 SewaSini
        </div>

    </div>


    <!-- BAGIAN KANAN -->
    <div class="register-right">

        <div class="register-form-wrapper">

            <h2>Buat Akun</h2>

            <p class="register-description">
                Silakan lengkapi data berikut untuk membuat akun SewaSini.
            </p>


            <!-- FORM PENDAFTARAN -->
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- JENIS AKUN -->
                <div class="register-field">

                    <label>Daftar Sebagai</label>

                    <div class="account-type">

                        <label class="account-option">
                            <input
                                type="radio"
                                name="jenis_akun"
                                value="penyewa"
                                {{ old('jenis_akun', 'penyewa') == 'penyewa' ? 'checked' : '' }}
                            >

                            <span>
                                <i class="fas fa-search"></i>
                                Penyewa / Pencari Kos
                            </span>
                        </label>

                        <label class="account-option">
                            <input
                                type="radio"
                                name="jenis_akun"
                                value="pemilik"
                                {{ old('jenis_akun') == 'pemilik' ? 'checked' : '' }}
                            >

                            <span>
                                <i class="fas fa-home"></i>
                                Pemilik Kos
                            </span>
                        </label>

                    </div>

                    @error('jenis_akun')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <!-- NAMA LENGKAP -->
                <div class="register-field">

                    <label>Nama Lengkap</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <!-- EMAIL -->
                <div class="register-field">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                    >

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <!-- NOMOR TELEPON -->
                <div class="register-field">

                    <label>Nomor Telepon</label>

                    <input
                        type="tel"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Masukkan nomor telepon"
                        required
                    >

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <!-- PASSWORD -->
                <div class="register-field">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <!-- KONFIRMASI PASSWORD -->
                <div class="register-field">

                    <label>Konfirmasi Password</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                    >

                </div>


                <!-- TOMBOL DAFTAR -->
                <button type="submit" class="register-submit">
                    Daftar Akun
                </button>

            </form>


            <!-- LINK LOGIN -->
            <p class="register-login-text">
                Sudah memiliki akun?
                <a href="{{ url('/login') }}">Login di sini</a>
            </p>


            <!-- KEMBALI KE BERANDA -->
            <a href="{{ url('/') }}" class="register-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

</body>
</html>
