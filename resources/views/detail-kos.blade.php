
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $kos['nama'] }} - SewaSini</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="detail-kos-page">

    <!-- NAVBAR -->
    <div class="container-fluid fixed-top bg-white shadow-sm">
        <div class="container px-0">
            <nav class="navbar navbar-expand navbar-light bg-white py-3">

                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="m-0 d-flex align-items-center"
                        style="color: #75452F; font-weight: 700;">
                        <i class="fas fa-home me-2"
                            style="color: #8FB99A;"></i>
                        SewaSini
                    </h1>
                </a>

                <div class="navbar-collapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('/#tentang') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ url('/daftar-kos') }}" class="nav-item nav-link active">Daftar Kos</a>
                        <a href="{{ url('/#kontak') }}" class="nav-item nav-link">Kontak</a>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ url('/login') }}"
                            class="btn btn-login-home rounded-pill px-4">
                            Login
                        </a>

                        <a href="{{ url('/daftar-akun') }}"
                            class="btn rounded-pill px-4"
                            style="background-color: #75452F; color: white;">
                            Daftar Akun
                        </a>
                    </div>
                </div>

            </nav>
        </div>
    </div>


    <!-- DETAIL KOS -->
    <section class="detail-kos-section">
        <div class="container">

            <!-- BREADCRUMB -->
            <div class="detail-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ url('/daftar-kos') }}">Daftar Kos</a>
                <i class="fas fa-chevron-right"></i>
                <span>{{ $kos['nama'] }}</span>
            </div>


            <!-- JUDUL DAN RATING -->
            <div class="detail-heading">
                <div>
                    <h2>{{ $kos['nama'] }}</h2>

                    <p>
                        <i class="fas fa-location-dot"></i>
                        {{ $kos['alamat'] }}
                    </p>
                </div>

                <div class="detail-rating">
                    <i class="fas fa-star"></i>
                    <strong>{{ $kos['rating'] }}</strong>
                    <span>({{ $kos['jumlah_ulasan'] }} ulasan)</span>
                </div>
            </div>


            <!-- FOTO KOS -->
            <div class="detail-image-wrapper">
                <img src="{{ asset('assets/img/' . $kos['gambar']) }}"
                    alt="{{ $kos['nama'] }}">
            </div>


            <!-- INFORMASI DAN PENGAJUAN SEWA -->
            <div class="row g-4 mt-3">

                <!-- INFORMASI KOS -->
                <div class="col-lg-8">

                    <div class="detail-card">

                        <h4>Informasi Kos</h4>

                        <p class="detail-description">
                            {{ $kos['deskripsi'] }}
                        </p>

                        <div class="detail-info-grid">

                            <div class="detail-info-item">
                                <i class="fas fa-house"></i>
                                <div>
                                    <span>Jenis Kos</span>
                                    <strong>{{ $kos['jenis'] }}</strong>
                                </div>
                            </div>

                            <div class="detail-info-item">
                                <i class="fas fa-bath"></i>
                                <div>
                                    <span>Kamar Mandi</span>
                                    <strong>{{ $kos['kamar_mandi'] }}</strong>
                                </div>
                            </div>

                            <div class="detail-info-item">
                                <i class="fas fa-calendar"></i>
                                <div>
                                    <span>Periode Sewa</span>
                                    <strong>{{ $kos['periode'] }}</strong>
                                </div>
                            </div>

                            <div class="detail-info-item">
                                <i class="fas fa-location-dot"></i>
                                <div>
                                    <span>Lokasi</span>
                                    <strong>{{ $kos['lokasi'] }}</strong>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <h4>Fasilitas Kos</h4>

                        <div class="detail-facilities">
                            @foreach ($kos['fasilitas'] as $fasilitas)
                                <div class="facility-item">
                                    <i class="fas fa-check-circle"></i>
                                    {{ $fasilitas }}
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h4>Aturan Kos</h4>

                        <ul class="detail-rules">
                            @foreach ($kos['aturan'] as $aturan)
                                <li>{{ $aturan }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>


                <!-- CARD HARGA DAN AJUKAN SEWA -->
                <div class="col-lg-4">

                    <div class="detail-rent-card">

                        <span class="rent-label">Harga Sewa</span>

                        <h3>
                            Rp{{ number_format($kos['harga'], 0, ',', '.') }}
                            <small>/ {{ strtolower($kos['periode']) }}</small>
                        </h3>

                        <div class="rent-availability">

                            @if ($kos['kamar_tersedia'])
                                <span class="availability-available">
                                    <i class="fas fa-circle-check"></i>
                                    Tersedia {{ $kos['jumlah_kamar'] }} kamar
                                </span>
                            @else
                                <span class="availability-full">
                                    <i class="fas fa-circle-xmark"></i>
                                    Kos Penuh
                                </span>
                            @endif

                        </div>

                        @if ($kos['kamar_tersedia'])

                            <a href="{{ url('/ajukan-sewa/kos-harvia') }}"
                                class="btn btn-ajukan-sewa">
                                Ajukan Sewa
                            </a>

                        @else

                            <button class="btn btn-kos-penuh" disabled>
                                Kos Penuh
                            </button>

                            <p class="full-message">
                                Maaf, saat ini kamar kos sudah penuh.
                            </p>

                        @endif

                        <a href="{{ url('/daftar-kos') }}"
                            class="btn btn-lihat-kos">
                            <i class="fas fa-arrow-left me-2"></i>
                            Lihat Kos Lainnya
                        </a>

                    </div>

                </div>

            </div>


            <!-- ULASAN PENGHUNI -->
            <div class="detail-review-section">

                <div class="review-heading">
                    <div>
                        <h3>Ulasan Penghuni</h3>
                        <p>Pengalaman dari orang yang pernah menyewa kos ini.</p>
                    </div>

                    <div class="review-total">
                        <i class="fas fa-star"></i>
                        {{ $kos['rating'] }} / 5
                    </div>
                </div>


                <div class="review-list">

                    @foreach ($kos['ulasan'] as $ulasan)

                        <div class="review-card">

                            <div class="review-user">
                                <div class="review-avatar">
                                    {{ strtoupper(substr($ulasan['nama'], 0, 1)) }}
                                </div>

                                <div>
                                    <strong>{{ $ulasan['nama'] }}</strong>
                                    <span>{{ $ulasan['tanggal'] }}</span>
                                </div>
                            </div>

                            <div class="review-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $ulasan['rating'])
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>

                            <p class="review-comment">
                                {{ $ulasan['komentar'] }}
                            </p>

                        </div>

                    @endforeach

                </div>


                <!-- TOMBOL TULIS ULASAN -->
                <div class="write-review-box">
                    <div>
                        <h5>Pernah tinggal di kos ini?</h5>
                        <p>Bagikan pengalamanmu untuk membantu calon penyewa lainnya.</p>
                    </div>

                    <a href="{{ url('/login') }}" class="btn btn-write-review">
                        <i class="fas fa-pen me-2"></i>
                        Tulis Ulasan
                    </a>
                </div>

            </div>

        </div>
    </section>


    <!-- FOOTER -->
    <footer class="detail-footer">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <h3>
                        <i class="fas fa-home"></i>
                        SewaSini
                    </h3>
                    <p>
                        Temukan kos yang nyaman dan sesuai dengan kebutuhanmu.
                    </p>
                </div>

                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        © 2026 SewaSini. All Rights Reserved.
                    </p>
                </div>

            </div>
        </div>
    </footer>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
