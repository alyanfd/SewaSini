<!DOCTYPE html>
<html lang="en">

    
    <head>
        <!-- Pengaturan Halaman -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SewaSini - Platform Pencarian Kos</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}">

        <!-- Template Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Custom CSS SewaSini -->
        <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">
    </head>


    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar SewaSini -->
        <div class="container-fluid fixed-top bg-white shadow-sm">
            <div class="container px-0">

                <nav class="navbar navbar-expand navbar-light bg-white py-3">

                    <!-- Logo SewaSini -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <h1 class="m-0 d-flex align-items-center"
                            style="color: #75452F; font-weight: 700;">

                            <i class="fas fa-home me-2"
                            style="color: #8FB99A;"></i>

                            SewaSini
                        </h1>
                    </a>

                    <!-- Menu Navbar -->
                    <div class="navbar-collapse">

                        <div class="navbar-nav mx-auto">

                            <a href="{{ url('/') }}" class="nav-item nav-link active">
                                Home
                            </a>

                            <a href="#tentang" class="nav-item nav-link">
                                Tentang Kami
                            </a>

                            <a href="#daftar-kos" class="nav-item nav-link">
                                Daftar Kos
                            </a>

                            <a href="#kontak" class="nav-item nav-link">
                                Kontak
                            </a>

                        </div>

                        <!-- Tombol Login dan Daftar Akun -->
                        <div class="d-flex align-items-center gap-2">

                            <a href="#" class="btn rounded-pill px-4"
                            style="border: 1px solid #75452F; color: #75452F;">
                                Login
                            </a>

                            <a href="{{ url('/daftar-akun') }}" class="btn rounded-pill px-4"
                                style="background-color: #75452F; color: white;">
                                Daftar Akun
                            </a>

                        </div>

                    </div>

                </nav>

            </div>
        </div>
        <!-- Navbar SewaSini End -->
        
        <!-- Hero SewaSini Start -->
        <section class="sewasini-hero">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Bagian Kiri: Judul dan Deskripsi -->
                    <div class="col-lg-7">
                        <div class="hero-content">

                            <span class="hero-label">
                                <i class="fas fa-home me-2"></i>
                                Selamat Datang di SewaSini
                            </span>

                            <h1>
                                Temukan Kos Nyaman,
                                <span>Mulai Cerita Barumu!</span>
                            </h1>

                            <p>
                                Cari kos sesuai kebutuhanmu dengan lebih mudah.
                                Temukan informasi kos, lokasi, harga, dan fasilitas
                                yang sesuai dengan keinginanmu bersama SewaSini.
                            </p>

                            <a href="#daftar-kos" class="btn btn-sewasini">
                                Cari Kos Sekarang
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Bagian Kanan: Ilustrasi -->
                    <div class="col-lg-5">
                        <div class="hero-illustration">

                            <div class="hero-house-icon">
                                <i class="fas fa-house-user"></i>
                            </div>

                            <div class="hero-decoration decoration-one"></div>
                            <div class="hero-decoration decoration-two"></div>

                            <div class="hero-info-card">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>Temukan Kos Impianmu</strong>
                                    <small>Lebih mudah bersama SewaSini</small>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Pencarian Kos -->
                <div class="hero-search" id="daftar-kos">

                    <div class="search-heading">
                        <h4>Cari Kos yang Kamu Inginkan</h4>
                        <p>Temukan kos sesuai kebutuhan dan anggaranmu.</p>
                    </div>

                    <div class="row g-3 align-items-end">

                        <div class="col-lg-4">
                            <label class="form-label">Nama Kos</label>
                            <div class="search-input">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control"
                                    placeholder="Masukkan nama kos">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Lokasi</label>
                            <div class="search-input">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" class="form-control"
                                    placeholder="Masukkan lokasi">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Rentang Harga</label>
                            <select class="form-select">
                                <option value="">Pilih rentang harga</option>
                                <option>Di bawah Rp500.000</option>
                                <option>Rp500.000 - Rp1.000.000</option>
                                <option>Rp1.000.000 - Rp1.500.000</option>
                                <option>Di atas Rp1.500.000</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <button type="button" class="btn btn-sewasini w-100">
                                Cari Kos
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Hero SewaSini End -->

        <!-- Keunggulan SewaSini Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-4">

                    <!-- Keunggulan 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card text-center">
                            <div class="benefit-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h5>Informasi Kos Lebih Jelas</h5>
                            <p>
                                Dapatkan informasi harga, fasilitas,
                                lokasi, dan kondisi kos dengan lebih jelas.
                            </p>
                        </div>
                    </div>

                    <!-- Keunggulan 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card text-center">
                            <div class="benefit-icon">
                                <i class="fas fa-search-location"></i>
                            </div>
                            <h5>Pencarian Kos Lebih Mudah</h5>
                            <p>
                                Temukan pilihan kos yang sesuai
                                dengan kebutuhan dan anggaranmu.
                            </p>
                        </div>
                    </div>

                    <!-- Keunggulan 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card text-center">
                            <div class="benefit-icon">
                                <i class="fas fa-bed"></i>
                            </div>
                            <h5>Informasi Ketersediaan Kamar</h5>
                            <p>
                                Ketahui informasi kamar kos yang
                                tersedia sebelum menentukan pilihan.
                            </p>
                        </div>
                    </div>

                    <!-- Keunggulan 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card text-center">
                            <div class="benefit-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <h5>Ulasan dari Penghuni</h5>
                            <p>
                                Lihat pengalaman penghuni sebelumnya
                                sebagai bahan pertimbangan memilih kos.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Keunggulan SewaSini End -->
     
        <!-- Rekomendasi Kos Start -->
        <section class="container-fluid kos-section py-5">
            <div class="container py-4">

                <!-- Judul Section -->
                <div class="kos-heading text-center mb-5">
                    <span class="kos-label">Temukan Tempat Tinggalmu</span>
                    <h2>Rekomendasi Kos</h2>
                    <p>
                        Pilihan kos nyaman yang bisa kamu pertimbangkan
                        sesuai kebutuhanmu.
                    </p>
                </div>

                <!-- Daftar Card Kos -->
                <div class="row g-4">

                    <!-- Kos 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="kos-card">

                            <div class="kos-image">
                                <img src="{{ asset('assets/img/kos/kos-1.jpg') }}"
                                    alt="Foto Kos 1">
                                <span class="kos-category">Kos Putri</span>
                            </div>

                            <div class="kos-card-body">
                                <div class="kos-rating">
                                    <i class="fas fa-star"></i>
                                    <span>4.8</span>
                                </div>

                                <h5>Nama Kos 1</h5>

                                <p class="kos-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Pekanbaru, Riau
                                </p>

                                <p class="kos-description">
                                    Kos nyaman dengan fasilitas yang
                                    mendukung kebutuhan sehari-hari.
                                </p>

                                <div class="kos-card-footer">
                                    <div class="kos-price">
                                        <strong>Rp850.000</strong>
                                        <small>/ bulan</small>
                                    </div>

                                    <a href="#" class="btn-detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kos 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="kos-card">

                            <div class="kos-image">
                                <img src="{{ asset('assets/img/kos/kos-2.jpg') }}"
                                    alt="Foto Kos 2">
                                <span class="kos-category">Kos Putra</span>
                            </div>

                            <div class="kos-card-body">
                                <div class="kos-rating">
                                    <i class="fas fa-star"></i>
                                    <span>4.7</span>
                                </div>

                                <h5>Nama Kos 2</h5>

                                <p class="kos-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Pekanbaru, Riau
                                </p>

                                <p class="kos-description">
                                    Hunian praktis dengan lingkungan
                                    yang nyaman dan strategis.
                                </p>

                                <div class="kos-card-footer">
                                    <div class="kos-price">
                                        <strong>Rp750.000</strong>
                                        <small>/ bulan</small>
                                    </div>

                                    <a href="#" class="btn-detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kos 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="kos-card">

                            <div class="kos-image">
                                <img src="{{ asset('assets/img/kos/kos-3.jpg') }}"
                                    alt="Foto Kos 3">
                                <span class="kos-category">Kos Campur</span>
                            </div>

                            <div class="kos-card-body">
                                <div class="kos-rating">
                                    <i class="fas fa-star"></i>
                                    <span>4.9</span>
                                </div>

                                <h5>Nama Kos 3</h5>

                                <p class="kos-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Pekanbaru, Riau
                                </p>

                                <p class="kos-description">
                                    Menawarkan kamar yang nyaman
                                    dengan fasilitas yang memadai.
                                </p>

                                <div class="kos-card-footer">
                                    <div class="kos-price">
                                        <strong>Rp1.000.000</strong>
                                        <small>/ bulan</small>
                                    </div>

                                    <a href="#" class="btn-detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kos 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="kos-card">

                            <div class="kos-image">
                                <img src="{{ asset('assets/img/kos/kos-4.jpg') }}"
                                    alt="Foto Kos 4">
                                <span class="kos-category">Kos Putri</span>
                            </div>

                            <div class="kos-card-body">
                                <div class="kos-rating">
                                    <i class="fas fa-star"></i>
                                    <span>4.6</span>
                                </div>

                                <h5>Nama Kos 4</h5>

                                <p class="kos-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Pekanbaru, Riau
                                </p>

                                <p class="kos-description">
                                    Tempat tinggal dengan suasana
                                    yang tenang dan nyaman.
                                </p>

                                <div class="kos-card-footer">
                                    <div class="kos-price">
                                        <strong>Rp900.000</strong>
                                        <small>/ bulan</small>
                                    </div>

                                    <a href="#" class="btn-detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tombol Lihat Lebih Banyak -->
                <div class="text-center mt-5">
                    <a href="#daftar-kos" class="btn-more-kos">
                        Lihat Lebih Banyak
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

            </div>
        </section>
        <!-- Rekomendasi Kos End -->

        <!-- Fruits Shop End-->
        
        <!-- Tentang Kami Start -->
        <div class="container-fluid py-5" id="tentang">
            <div class="container py-5">
                <div class="row align-items-center g-5">

                    <div class="col-lg-5">
                        <div class="about-illustration">
                            <i class="fas fa-house-user"></i>
                            <span class="about-decoration">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h5 class="sewasini-subtitle">Tentang Kami</h5>

                        <h1 class="mb-4">
                            Kenali SewaSini Lebih Dekat
                        </h1>

                        <p class="mb-4">
                            SewaSini merupakan platform pencarian kos yang
                            membantu calon penyewa menemukan tempat tinggal
                            sesuai kebutuhan dengan lebih mudah dan praktis.
                        </p>

                        <p class="mb-4">
                            Kami menyediakan informasi kos yang mencakup
                            lokasi, harga, fasilitas, kondisi kamar, serta
                            ulasan penghuni agar calon penyewa dapat
                            memperoleh gambaran sebelum memilih kos.
                        </p>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="about-point">
                                    <i class="fas fa-check-circle"></i>
                                    Informasi kos lebih jelas
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="about-point">
                                    <i class="fas fa-check-circle"></i>
                                    Pencarian lebih praktis
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="about-point">
                                    <i class="fas fa-check-circle"></i>
                                    Informasi fasilitas kos
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="about-point">
                                    <i class="fas fa-check-circle"></i>
                                    Ulasan penghuni
                                </div>
                            </div>
                        </div>

                        <a href="#daftar-kos" class="btn btn-sewasini">
                            Temukan Kos
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Tentang Kami End -->
 
        <!-- Ulasan Penghuni Start -->
        <div class="container-fluid py-5" id="ulasan">
            <div class="container py-5">

                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h5 class="sewasini-subtitle">Ulasan Penghuni</h5>
                    <h1 class="mb-3">Pengalaman Mereka Menemukan Kos</h1>
                    <p class="text-muted">
                        Lihat pengalaman penghuni dalam menemukan tempat tinggal
                        melalui SewaSini.
                    </p>
                </div>

                <div class="row g-4">

                    <div class="col-lg-4">
                        <div class="review-card">
                            <div class="review-stars">
                                ★★★★★
                            </div>
                            <p>
                                Informasi kos yang ditampilkan cukup jelas,
                                sehingga saya lebih mudah membandingkan kos
                                sebelum memilih tempat tinggal.
                            </p>
                            <h5>Nama Penghuni 1</h5>
                            <span>Penghuni Kos</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="review-card">
                            <div class="review-stars">
                                ★★★★★
                            </div>
                            <p>
                                Saya terbantu dengan informasi lokasi,
                                harga, dan fasilitas kos yang tersedia.
                                Pencarian kos jadi lebih praktis.
                            </p>
                            <h5>Nama Penghuni 2</h5>
                            <span>Penghuni Kos</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="review-card">
                            <div class="review-stars">
                                ★★★★★
                            </div>
                            <p>
                                Adanya ulasan dari penghuni lain membantu
                                saya mendapatkan gambaran mengenai kos
                                sebelum memutuskan untuk menyewa.
                            </p>
                            <h5>Nama Penghuni 3</h5>
                            <span>Penghuni Kos</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Ulasan Penghuni End -->
        
        <!-- Footer SewaSini Start -->
        <div class="container-fluid sewasini-footer pt-5 mt-5" id="kontak">
            <div class="container py-5">
                <div class="row g-5">

                    <div class="col-lg-4 col-md-6">
                        <h2 class="footer-logo mb-3">
                            <i class="fas fa-house-user"></i> SewaSini
                        </h2>
                        <p>
                            Platform pencarian kos yang membantu calon
                            penyewa menemukan tempat tinggal sesuai
                            kebutuhan dengan lebih mudah dan praktis.
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <h5>Menu</h5>
                        <a href="#" class="footer-link">Home</a>
                        <a href="#tentang" class="footer-link">Tentang Kami</a>
                        <a href="#daftar-kos" class="footer-link">Daftar Kos</a>
                        <a href="#ulasan" class="footer-link">Ulasan Penghuni</a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5>Informasi</h5>
                        <a href="#kontak" class="footer-link">Kontak Kami</a>
                        <a href="#" class="footer-link">Bantuan</a>
                        <a href="#" class="footer-link">Kebijakan Privasi</a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5>Hubungi Kami</h5>
                        <p><i class="fas fa-map-marker-alt me-2"></i> Pekanbaru, Riau</p>
                        <p><i class="fas fa-envelope me-2"></i> Email SewaSini</p>
                        <p><i class="fas fa-phone me-2"></i> Informasi Kontak</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer SewaSini End -->

        <!-- Copyright Start -->
        <div class="container-fluid sewasini-copyright py-3">
            <div class="container text-center">
                <p class="mb-0">
                    © 2026 SewaSini. All Rights Reserved.
                </p>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    
            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

            <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
            <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('assets/js/main.js') }}"></script>

        </body>
</html>