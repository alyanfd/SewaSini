
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - SewaSini</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">
</head>

<body style="background-color: #F7F9F7; font-family: 'Roboto', sans-serif;">

    <!-- Navbar -->
    <nav class="navbar bg-white shadow-sm px-4 py-3">
        <a href="{{ url('/home-pemilik') }}" class="navbar-brand">
            <h2 class="m-0" style="color: #75452F; font-weight: 700;">
                <i class="fas fa-home me-2" style="color: #8FB99A;"></i>
                SewaSini
            </h2>
        </a>

        <a href="{{ url('/home-pemilik') }}"
           class="btn rounded-pill px-3"
           style="border: 1px solid #8FB99A; color: #75452F;">
            <i class="fas fa-arrow-left me-2"></i>
            Kembali
        </a>
    </nav>

    <!-- Edit Profil -->
    <div class="container py-5">

        <div class="text-center mb-4">
            <h2 style="color: #75452F; font-weight: 700;">Edit Profil</h2>
            <p class="text-muted">
                Perbarui informasi akun SewaSini milikmu.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card border-0 shadow-sm" style="border-radius: 18px;">
                    <div class="card-body p-4 p-md-5">

                        <!-- Foto Profil -->
                        <div class="text-center mb-4">
                            <div class="mx-auto d-flex align-items-center justify-content-center rounded-circle"
                                 style="width: 95px; height: 95px; background-color: #EAF3EC; color: #8FB99A; font-size: 48px;">
                                <i class="fas fa-user"></i>
                            </div>

                            <h5 class="mt-3 mb-1" style="color: #75452F;">
                                Profil Pemilik Kos
                            </h5>

                            <small class="text-muted">Akun Pemilik Kos</small>
                        </div>

                        <hr class="mb-4">

                        <!-- Pesan Berhasil -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Pesan Kesalahan -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Periksa kembali data berikut:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="formEditProfil"
                              action="{{ route('profile.update') }}"
                              method="POST"
                              autocomplete="off">

                            @csrf
                            @method('PUT')

                            <div class="row g-4">

                                <!-- Informasi Profil -->
                                <div class="col-lg-6">
                                    <div class="p-4 h-100"
                                         style="background-color: #F7FAF7; border-radius: 14px;">

                                        <h5 style="color: #75452F; margin-bottom: 25px;">
                                            Informasi Profil
                                        </h5>

                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="name"
                                                   value="{{ old('name', $user->name) }}"
                                                   placeholder="Masukkan nama lengkap"
                                                   autocomplete="off"
                                                   required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email"
                                                   class="form-control"
                                                   name="email"
                                                   value="{{ old('email', $user->email) }}"
                                                   placeholder="Masukkan email"
                                                   autocomplete="off"
                                                   required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="tel"
                                                   class="form-control"
                                                   name="phone"
                                                   value="{{ old('phone', $user->phone) }}"
                                                   placeholder="Masukkan nomor telepon"
                                                   autocomplete="off"
                                                   required>
                                        </div>

                                    </div>
                                </div>

                                <!-- Keamanan Akun -->
                                <div class="col-lg-6">
                                    <div class="p-4 h-100"
                                         style="background-color: #F7FAF7; border-radius: 14px;">

                                        <h5 style="color: #75452F; margin-bottom: 10px;">
                                            Keamanan Akun
                                        </h5>

                                        <p class="text-muted mb-4">
                                            Isi bagian ini jika ingin mengganti password akun.
                                            Kosongkan jika tidak ingin menggantinya.
                                        </p>

                                        <!-- Password Saat Ini -->
                                        <div class="mb-3">
                                            <label class="form-label">Password Saat Ini</label>

                                            <div class="input-group">
                                                <input type="password"
                                                       class="form-control"
                                                       id="passwordLama"
                                                       name="current_password"
                                                       placeholder="Masukkan password saat ini"
                                                       autocomplete="new-password">

                                                <button class="btn btn-outline-secondary"
                                                        type="button"
                                                        onclick="togglePassword('passwordLama', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Password Baru -->
                                        <div class="mb-3">
                                            <label class="form-label">Password Baru</label>

                                            <div class="input-group">
                                                <input type="password"
                                                       class="form-control"
                                                       id="passwordBaru"
                                                       name="password"
                                                       placeholder="Masukkan password baru"
                                                       autocomplete="new-password">

                                                <button class="btn btn-outline-secondary"
                                                        type="button"
                                                        onclick="togglePassword('passwordBaru', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Konfirmasi Password -->
                                        <div class="mb-3">
                                            <label class="form-label">Konfirmasi Password Baru</label>

                                            <div class="input-group">
                                                <input type="password"
                                                       class="form-control"
                                                       id="konfirmasiPassword"
                                                       name="password_confirmation"
                                                       placeholder="Ulangi password baru"
                                                       autocomplete="new-password">

                                                <button class="btn btn-outline-secondary"
                                                        type="button"
                                                        onclick="togglePassword('konfirmasiPassword', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-end gap-2 mt-4">

                                <a href="{{ url('/home-pemilik') }}"
                                   class="btn btn-light px-4">
                                    Batal
                                </a>

                                <button type="submit"
                                        class="btn px-4"
                                        style="background-color: #75452F; color: white;">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Perubahan
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Copyright -->
    <div class="footer-copyright">
        <p>© 2026 SewaSini. Semua hak dilindungi.</p>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>
