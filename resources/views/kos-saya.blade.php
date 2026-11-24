
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Saya - SewaSini</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">

    <style>
        body {
            background-color: #F7F9F7;
            font-family: 'Roboto', sans-serif;
        }

        .text-choco {
            color: #75452F;
        }

        .text-mint {
            color: #8FB99A;
        }

        .btn-choco {
            background-color: #75452F;
            color: white;
            border: none;
        }

        .btn-choco:hover {
            background-color: #603923;
            color: white;
        }

        .btn-mint {
            background-color: #8FB99A;
            color: white;
            border: none;
        }

        .btn-mint:hover {
            background-color: #79A685;
            color: white;
        }

        .main-card {
            border: none;
            border-radius: 18px;
        }

        .form-section {
            background-color: #F7FAF7;
            border-radius: 14px;
        }

        .form-label {
            font-weight: 500;
            color: #59483F;
        }

        .form-control,
        .form-select {
            border-radius: 9px;
            padding: 11px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8FB99A;
            box-shadow: 0 0 0 0.2rem rgba(143, 185, 154, 0.18);
        }

        .empty-icon {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background-color: #EAF3EC;
            color: #8FB99A;
            font-size: 48px;
        }

        .upload-area {
            border: 2px dashed #A9C7AE;
            border-radius: 12px;
            background-color: white;
            padding: 25px;
            text-align: center;
            cursor: pointer;
        }

        .upload-area:hover {
            background-color: #F7FAF7;
        }

        .preview-item {
            position: relative;
        }

        .preview-item img {
            width: 100%;
            height: 115px;
            object-fit: cover;
            border-radius: 10px;
        }

        .kos-image {
            width: 100%;
            height: 190px;
            object-fit: cover;
        }

        .category-label {
            background-color: #EAF3EC;
            color: #52765B;
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 12px;
        }

        #formPendaftaran {
            display: none;
        }

        .footer-copyright {
            text-align: center;
            padding: 22px 10px;
            color: #777;
            margin-top: 45px;
        }
    </style>
</head>

<body>

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


    <!-- Konten Utama -->
    <div class="container py-5">

        <div class="mb-4">
            <h2 class="text-choco fw-bold">Kos Saya</h2>
            <p class="text-muted">
                Kelola dan daftarkan informasi kos milikmu di SewaSini.
            </p>
        </div>


        <!-- Notifikasi Berhasil -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif


        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Jika Belum Ada Kos -->
        @if ($kos->isEmpty())

            <div id="emptyState"
                 class="card main-card shadow-sm text-center py-5">

                <div class="card-body py-5">

                    <div class="empty-icon mx-auto d-flex align-items-center justify-content-center mb-4">
                        <i class="fas fa-house-user"></i>
                    </div>

                    <h4 class="text-choco fw-bold mb-3">
                        Anda Belum Mendaftarkan Kos Anda
                    </h4>

                    <p class="text-muted mb-4">
                        Yuk, daftarkan kos milikmu agar dapat ditemukan
                        oleh calon penyewa melalui SewaSini.
                    </p>

                    <button type="button"
                            class="btn btn-choco rounded-pill px-4 py-2"
                            onclick="bukaForm()">
                        <i class="fas fa-plus me-2"></i>
                        Daftarkan Kos
                    </button>

                </div>
            </div>

        @else

            <!-- Jika Sudah Ada Kos -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h5 class="text-choco fw-bold mb-1">
                        Daftar Kos Terdaftar
                    </h5>

                    <small class="text-muted">
                        Kamu memiliki {{ $kos->count() }} kos terdaftar.
                    </small>
                </div>

                <button type="button"
                        class="btn btn-choco rounded-pill px-4"
                        onclick="bukaForm()">
                    <i class="fas fa-plus me-2"></i>
                    Daftarkan Kos
                </button>

            </div>

            <div class="row g-4">

                @foreach ($kos as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="card main-card shadow-sm h-100 overflow-hidden">

                            @if (!empty($item->foto) && count($item->foto) > 0)
                                <img src="{{ asset('storage/' . $item->foto[0]) }}"
                                     class="kos-image"
                                     alt="{{ $item->nama_kos }}">
                            @else
                                <div class="kos-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-house text-secondary fa-3x"></i>
                                </div>
                            @endif

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="text-choco fw-bold">
                                        {{ $item->nama_kos }}
                                    </h5>

                                    <span class="category-label">
                                        {{ ucfirst($item->kategori) }}
                                    </span>
                                </div>

                                <p class="text-muted small mb-3">
                                    {{ $item->lokasi }}
                                </p>

                                <h5 class="fw-bold text-choco mb-3">
                                    Rp{{ number_format($item->harga, 0, ',', '.') }}
                                    <small class="text-muted fw-normal" style="font-size: 12px;">
                                        / bulan
                                    </small>
                                </h5>

                                <div class="d-flex justify-content-between text-muted small">
                                    <span>
                                        <i class="fas fa-door-open me-1 text-mint"></i>
                                        {{ $item->jumlah_kamar }} kamar
                                    </span>

                                    <span>
                                        <i class="fas fa-images me-1 text-mint"></i>
                                        {{ count($item->foto ?? []) }} foto
                                    </span>
                                </div>

                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

        @endif


        <!-- Form Pendaftaran Kos -->
        <div id="formPendaftaran" class="mt-4">

            <div class="card main-card shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="text-choco fw-bold mb-1">
                                Formulir Pendaftaran Kos
                            </h4>

                            <p class="text-muted mb-0">
                                Lengkapi informasi kos milikmu.
                            </p>
                        </div>

                        <button type="button"
                                class="btn btn-light"
                                onclick="tutupForm()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>


                    <form action="{{ route('kos.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          autocomplete="off">

                        @csrf

                        <div class="row g-4">

                            <!-- Foto Kos -->
                            <div class="col-12">
                                <div class="form-section p-4">

                                    <h5 class="text-choco fw-bold mb-2">
                                        Foto Kos
                                    </h5>

                                    <p class="text-muted small">
                                        Unggah minimal 1 dan maksimal 6 foto.
                                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB per foto.
                                    </p>

                                    <label for="foto"
                                           class="upload-area d-block">

                                        <i class="fas fa-cloud-upload-alt fa-2x text-mint mb-2"></i>

                                        <p class="fw-semibold text-choco mb-1">
                                            Klik untuk memilih foto
                                        </p>

                                        <small class="text-muted">
                                            Pilih maksimal 6 foto kos
                                        </small>

                                    </label>

                                    <input type="file"
                                           id="foto"
                                           name="foto[]"
                                           accept="image/jpeg,image/png,image/webp"
                                           class="d-none"
                                           multiple
                                           required>

                                    <div id="previewFoto" class="row g-3 mt-2"></div>

                                    <small id="jumlahFoto" class="text-muted"></small>

                                </div>
                            </div>


                            <!-- Informasi Kos -->
                            <div class="col-lg-6">
                                <div class="form-section p-4 h-100">

                                    <h5 class="text-choco fw-bold mb-4">
                                        <i class="fas fa-info-circle me-2 text-mint"></i>
                                        Informasi Kos
                                    </h5>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Nama Kos
                                        </label>

                                        <input type="text"
                                               name="nama_kos"
                                               class="form-control"
                                               value="{{ old('nama_kos') }}"
                                               placeholder="Contoh: Kos Melati"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Deskripsi Kos
                                        </label>

                                        <textarea name="deskripsi"
                                                  class="form-control"
                                                  rows="5"
                                                  placeholder="Jelaskan fasilitas, kondisi, dan informasi kos..."
                                                  required>{{ old('deskripsi') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Nomor Telepon
                                        </label>

                                        <input type="tel"
                                               name="nomor_telepon"
                                               class="form-control"
                                               value="{{ old('nomor_telepon') }}"
                                               placeholder="Contoh: 081234567890"
                                               required>
                                    </div>

                                </div>
                            </div>


                            <!-- Detail Kos -->
                            <div class="col-lg-6">
                                <div class="form-section p-4 h-100">

                                    <h5 class="text-choco fw-bold mb-4">
                                        <i class="fas fa-list-alt me-2 text-mint"></i>
                                        Detail Kos
                                    </h5>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Harga Sewa per Bulan (Rp)
                                        </label>

                                        <input type="number"
                                               name="harga"
                                               class="form-control"
                                               value="{{ old('harga') }}"
                                               placeholder="Contoh: 750000"
                                               min="1"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Lokasi Kos
                                        </label>

                                        <textarea name="lokasi"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Masukkan alamat lengkap kos..."
                                                  required>{{ old('lokasi') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Jumlah Kamar
                                        </label>

                                        <input type="number"
                                               name="jumlah_kamar"
                                               class="form-control"
                                               value="{{ old('jumlah_kamar') }}"
                                               placeholder="Contoh: 12"
                                               min="1"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Kategori Kos
                                        </label>

                                        <select name="kategori"
                                                class="form-select"
                                                required>

                                            <option value="" disabled selected>
                                                Pilih kategori kos
                                            </option>

                                            <option value="campur" {{ old('kategori') == 'campur' ? 'selected' : '' }}>
                                                Campur
                                            </option>

                                            <option value="putra" {{ old('kategori') == 'putra' ? 'selected' : '' }}>
                                                Putra
                                            </option>

                                            <option value="putri" {{ old('kategori') == 'putri' ? 'selected' : '' }}>
                                                Putri
                                            </option>

                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <!-- Tombol Form -->
                        <div class="d-flex justify-content-end gap-2 mt-4">

                            <button type="button"
                                    class="btn btn-light px-4"
                                    onclick="tutupForm()">
                                Batal
                            </button>

                            <button type="submit"
                                    class="btn btn-choco px-4">
                                <i class="fas fa-save me-2"></i>
                                Simpan Pendaftaran Kos
                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


    <!-- Footer -->
    <div class="footer-copyright">
        <p>© 2026 SewaSini. Semua hak dilindungi.</p>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const formPendaftaran = document.getElementById('formPendaftaran');
        const emptyState = document.getElementById('emptyState');

        function bukaForm() {
            formPendaftaran.style.display = 'block';

            if (emptyState) {
                emptyState.style.display = 'none';
            }

            formPendaftaran.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function tutupForm() {
            formPendaftaran.style.display = 'none';

            if (emptyState) {
                emptyState.style.display = 'block';
            }
        }


        // Buka form otomatis jika validasi sebelumnya gagal
        @if ($errors->any())
            bukaForm();
        @endif


        // Preview foto sebelum diunggah
        const inputFoto = document.getElementById('foto');
        const previewFoto = document.getElementById('previewFoto');
        const jumlahFoto = document.getElementById('jumlahFoto');

        inputFoto.addEventListener('change', function () {

            previewFoto.innerHTML = '';

            const files = Array.from(this.files);

            if (files.length > 6) {
                alert('Maksimal hanya boleh memilih 6 foto.');

                this.value = '';
                jumlahFoto.textContent = '';
                return;
            }

            if (files.length > 0) {
                jumlahFoto.textContent = files.length + ' foto dipilih.';
            } else {
                jumlahFoto.textContent = '';
            }

            files.forEach(function(file) {

                const reader = new FileReader();

                reader.onload = function(event) {

                    const kolom = document.createElement('div');
                    kolom.className = 'col-6 col-md-4 col-lg-2';

                    const gambar = document.createElement('div');
                    gambar.className = 'preview-item';

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.alt = 'Preview foto kos';

                    gambar.appendChild(img);
                    kolom.appendChild(gambar);
                    previewFoto.appendChild(kolom);
                };

                reader.readAsDataURL(file);
            });

        });
    </script>

</body>
</html>
