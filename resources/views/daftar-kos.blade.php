
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kos - SewaSini</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sewasini.css') }}">
</head>

<body>

<div class="daftar-kos-page">

    <!-- NAVBAR -->
    <div class="container-fluid fixed-top bg-white shadow-sm">
        <div class="container px-0">
            <nav class="navbar navbar-expand navbar-light bg-white py-3">

                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="m-0 d-flex align-items-center"
                        style="color: #75452F; font-weight: 700;">
                        <i class="fas fa-home me-2" style="color: #8FB99A;"></i>
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
                        @auth
                            <a href="#" class="btn btn-login-home rounded-pill px-3">
                                <i class="fas fa-bell"></i>
                            </a>

                            <a href="#" class="btn btn-login-home rounded-pill px-3">
                                <i class="fas fa-envelope"></i>
                            </a>

                            <a href="#" class="text-decoration-none" style="color: #75452F;">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ auth()->user()->name }}
                            </a>
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-login-home rounded-pill px-4">
                                Login
                            </a>

                            <a href="{{ url('/daftar-akun') }}"
                               class="btn rounded-pill px-4"
                               style="background-color: #75452F; color: white;">
                                Daftar Akun
                            </a>
                        @endauth
                    </div>
                </div>

            </nav>
        </div>
    </div>
    <!-- NAVBAR END -->


    <!-- HERO -->
    <section class="daftar-hero">
        <div class="container text-center">

            <span class="daftar-hero-label">
                <i class="fas fa-home me-2"></i>
                Temukan Tempat Tinggal Nyaman
            </span>

            <h1>
                Temukan Kos Terbaik
                <span>Sesuai Kebutuhanmu</span>
            </h1>

            <p>
                Cari dan temukan kos yang nyaman, aman, dan sesuai
                dengan kebutuhan serta anggaranmu.
            </p>

        </div>
    </section>
    <!-- HERO END -->


    <!-- PENCARIAN -->
    <section class="daftar-search-section">
        <div class="container">

            <div class="daftar-search-box">

                <div class="daftar-search-heading">
                    <h4>
                        <i class="fas fa-search me-2"></i>
                        Cari Kos Impianmu
                    </h4>

                    <p>Gunakan pilihan pencarian di bawah untuk menemukan kos.</p>
                </div>

                <form id="searchKosForm">
                    <div class="row g-3 align-items-end">

                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control"
                                   placeholder="Kota atau kecamatan">
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label class="form-label">Harga Minimum</label>
                            <input type="number" name="harga_min" class="form-control"
                                   placeholder="500000" min="0">
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label class="form-label">Harga Maksimum</label>
                            <input type="number" name="harga_max" class="form-control"
                                   placeholder="2000000" min="0">
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label class="form-label">Jenis Kos</label>
                            <select name="jenis" class="form-select">
                                <option value="">Semua Jenis</option>
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                                <option value="Campuran">Campuran</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-12">
                            <label class="form-label">Kata Kunci</label>
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control"
                                       placeholder="Nama atau fasilitas">

                                <button type="submit" class="btn btn-sewasini">
                                    <i class="fas fa-search me-1"></i>
                                    Cari
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- PENCARIAN END -->


    <!-- HASIL PENCARIAN -->
    <main class="daftar-listing-section">
        <div class="container">

            <!-- TOOLBAR -->
            <div class="daftar-toolbar">

                <div>
                    <h4>Daftar Kos</h4>
                    <p id="jumlahHasil">Menampilkan 6 pilihan kos untukmu</p>
                </div>

                <div class="daftar-toolbar-actions">

                    <button type="button" class="daftar-toolbar-btn" id="mapViewBtn">
                        <i class="fas fa-map-marked-alt me-2"></i>
                        Map View
                    </button>

                    <label class="daftar-verified">
                        <input type="checkbox" id="verifiedOnly">
                        <span>Verified Only</span>
                    </label>

                    <button type="button"
                            class="daftar-toolbar-btn"
                            data-bs-toggle="collapse"
                            data-bs-target="#filterKos">
                        <i class="fas fa-filter me-2"></i>
                        Filter
                    </button>

                    <select class="form-select daftar-sort" id="sortKos">
                        <option value="">Urutan Default</option>
                        <option value="murah">Harga Termurah</option>
                        <option value="mahal">Harga Termahal</option>
                        <option value="terbaru">Kos Terbaru</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="populer">Paling Diminati</option>
                    </select>

                </div>
            </div>
            <!-- TOOLBAR END -->


            <!-- FILTER -->
            <div class="collapse" id="filterKos">
                <div class="daftar-filter-box">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5>
                            <i class="fas fa-sliders-h me-2"></i>
                            Filter Kos
                        </h5>

                        <button type="button" class="btn-close"
                                data-bs-toggle="collapse"
                                data-bs-target="#filterKos"></button>
                    </div>

                    <form id="filterKosForm">

                        <div class="row g-4">

                            <div class="col-lg-3 col-md-6">
                                <h6>Lokasi</h6>
                                <input type="text" name="filter_lokasi"
                                       class="form-control"
                                       placeholder="Masukkan lokasi">
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Rentang Harga</h6>
                                <input type="number" name="filter_harga_min"
                                       class="form-control mb-2"
                                       placeholder="Harga minimum" min="0">

                                <input type="number" name="filter_harga_max"
                                       class="form-control"
                                       placeholder="Harga maksimum" min="0">
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Jenis Kos</h6>

                                <label class="daftar-check">
                                    <input type="checkbox" name="filter_jenis[]" value="Putra">
                                    Putra
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="filter_jenis[]" value="Putri">
                                    Putri
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="filter_jenis[]" value="Campuran">
                                    Campuran
                                </label>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Fasilitas</h6>

                                <label class="daftar-check">
                                    <input type="checkbox" name="fasilitas[]" value="ac"> AC
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="fasilitas[]" value="wifi"> WiFi
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="fasilitas[]" value="parkir"> Parkir
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="fasilitas[]" value="dapur"> Dapur
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="fasilitas[]" value="furnished"> Furnished
                                </label>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Kamar Mandi</h6>

                                <label class="daftar-check">
                                    <input type="checkbox" name="kamar_mandi[]" value="Dalam">
                                    Kamar mandi dalam
                                </label>

                                <label class="daftar-check">
                                    <input type="checkbox" name="kamar_mandi[]" value="Luar">
                                    Kamar mandi luar
                                </label>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Periode Pembayaran</h6>

                                <select name="periode" class="form-select">
                                    <option value="">Semua Periode</option>
                                    <option value="Bulanan">Bulanan</option>
                                    <option value="Tahunan">Tahunan</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Ketersediaan Kamar</h6>

                                <label class="daftar-check">
                                    <input type="checkbox" name="tersedia" value="1">
                                    Kamar tersedia
                                </label>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h6>Status Kos</h6>

                                <label class="daftar-check">
                                    <input type="checkbox" name="terverifikasi" value="1">
                                    Sudah terverifikasi
                                </label>
                            </div>

                        </div>

                        <div class="daftar-filter-actions mt-4">
                            <button type="reset" class="btn btn-outline-secondary">
                                Reset Filter
                            </button>

                            <button type="submit" class="btn btn-sewasini">
                                Terapkan Filter
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- FILTER END -->


            <!-- DAFTAR KOS -->
            <div class="row g-4 mt-2" id="listingKos">


                <!-- KOS 1 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Kos Harvia"
                         data-location="Rumbai Pekanbaru"
                         data-price="850000"
                         data-type="Putri"
                         data-facilities="wifi ac parkir"
                         data-bathroom="Dalam"
                         data-period="Bulanan"
                         data-available="true"
                         data-verified="true"
                         data-rating="4.9"
                         data-popularity="28"
                         data-newest="3">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-1.jpg') }}" alt="Kos Harvia">

                            <span class="daftar-verified-label">
                                <i class="fas fa-check-circle"></i>
                                Terverifikasi
                            </span>
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.9
                                <span>(28 ulasan)</span>
                            </div>

                            <h5>Kos Harvia</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Rumbai, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Kos nyaman dengan lingkungan yang aman dan bersih.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-snowflake"></i> AC</span>
                                <span><i class="fas fa-car"></i> Parkir</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 850.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- KOS 2 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Kos Oren Velly"
                         data-location="Panam Pekanbaru"
                         data-price="750000"
                         data-type="Putra"
                         data-facilities="wifi dapur parkir"
                         data-bathroom="Luar"
                         data-period="Bulanan"
                         data-available="true"
                         data-verified="true"
                         data-rating="4.8"
                         data-popularity="21"
                         data-newest="2">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-2.jpg') }}" alt="Kos Oren Velly">

                            <span class="daftar-verified-label">
                                <i class="fas fa-check-circle"></i>
                                Terverifikasi
                            </span>
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.8
                                <span>(21 ulasan)</span>
                            </div>

                            <h5>Kos Oren Velly</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Panam, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Hunian praktis dengan fasilitas lengkap untuk mahasiswa.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-utensils"></i> Dapur</span>
                                <span><i class="fas fa-car"></i> Parkir</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 750.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- KOS 3 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Kos Peony Kembang Sari"
                         data-location="Kembang Sari Pekanbaru"
                         data-price="1000000"
                         data-type="Putri"
                         data-facilities="ac wifi dapur"
                         data-bathroom="Dalam"
                         data-period="Bulanan"
                         data-available="true"
                         data-verified="true"
                         data-rating="4.7"
                         data-popularity="19"
                         data-newest="5">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-3.jpg') }}" alt="Kos Peony Kembang Sari">

                            <span class="daftar-verified-label">
                                <i class="fas fa-check-circle"></i>
                                Terverifikasi
                            </span>
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.7
                                <span>(19 ulasan)</span>
                            </div>

                            <h5>Kos Peony Kembang Sari</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Kembang Sari, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Kos dengan suasana tenang dan lingkungan yang nyaman.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-snowflake"></i> AC</span>
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-utensils"></i> Dapur</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 1.000.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- KOS 4 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Kos AA"
                         data-location="Tampan Pekanbaru"
                         data-price="650000"
                         data-type="Campuran"
                         data-facilities="wifi parkir furnished"
                         data-bathroom="Luar"
                         data-period="Bulanan"
                         data-available="true"
                         data-verified="true"
                         data-rating="4.6"
                         data-popularity="16"
                         data-newest="4">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-4.jpg') }}" alt="Kos AA">

                            <span class="daftar-verified-label">
                                <i class="fas fa-check-circle"></i>
                                Terverifikasi
                            </span>
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.6
                                <span>(16 ulasan)</span>
                            </div>

                            <h5>Kos AA</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Tampan, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Pilihan kos dengan harga terjangkau dan akses mudah.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-car"></i> Parkir</span>
                                <span><i class="fas fa-bed"></i> Furnished</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 650.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- KOS 5 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Saka Kost"
                         data-location="Panam Pekanbaru"
                         data-price="900000"
                         data-type="Putra"
                         data-facilities="wifi ac parkir"
                         data-bathroom="Dalam"
                         data-period="Tahunan"
                         data-available="false"
                         data-verified="true"
                         data-rating="4.8"
                         data-popularity="24"
                         data-newest="1">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-5.jpg') }}" alt="Saka Kost">

                            <span class="daftar-verified-label">
                                <i class="fas fa-check-circle"></i>
                                Terverifikasi
                            </span>
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.8
                                <span>(24 ulasan)</span>
                            </div>

                            <h5>Saka Kost</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Panam, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Tempat tinggal nyaman dengan fasilitas untuk kebutuhan harian.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-snowflake"></i> AC</span>
                                <span><i class="fas fa-car"></i> Parkir</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 900.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- KOS 6 -->
                <div class="col-lg-6 kos-item">
                    <div class="daftar-kos-card"
                         data-name="Kos Nyaman"
                         data-location="Sukajadi Pekanbaru"
                         data-price="700000"
                         data-type="Campuran"
                         data-facilities="wifi dapur parkir"
                         data-bathroom="Luar"
                         data-period="Bulanan"
                         data-available="true"
                         data-verified="false"
                         data-rating="4.5"
                         data-popularity="12"
                         data-newest="6">

                        <div class="daftar-kos-photo">
                            <img src="{{ asset('assets/img/kos-6.jpg') }}" alt="Kos Nyaman">
                        </div>

                        <div class="daftar-kos-content">
                            <div class="daftar-kos-rating">
                                <i class="fas fa-star"></i> 4.5
                                <span>(12 ulasan)</span>
                            </div>

                            <h5>Kos Nyaman</h5>

                            <p class="daftar-kos-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Sukajadi, Pekanbaru
                            </p>

                            <p class="daftar-kos-info">
                                Kos dengan lingkungan bersih dan suasana yang tenang.
                            </p>

                            <div class="daftar-kos-facilities">
                                <span><i class="fas fa-wifi"></i> WiFi</span>
                                <span><i class="fas fa-utensils"></i> Dapur</span>
                                <span><i class="fas fa-car"></i> Parkir</span>
                            </div>

                            <div class="daftar-kos-bottom">
                                <div>
                                    <strong>Rp 700.000</strong>
                                    <small>/ bulan</small>
                                </div>
                                <a href="#" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- DAFTAR KOS END -->


            <!-- PESAN KOS KOSONG -->
            <div id="pesanKosong" class="text-center py-5" style="display: none;">
                <i class="fas fa-search fa-3x mb-3" style="color: #8FB99A;"></i>
                <h5 style="color: #75452F;">Kos tidak ditemukan</h5>
                <p style="color: #888;">
                    Coba ubah kata kunci atau pilihan filter kamu.
                </p>
                <button type="button" class="btn btn-sewasini" id="resetSemua">
                    Reset Pencarian
                </button>
            </div>


            <!-- PAGINATION -->
            <div class="daftar-pagination" id="paginationKos">
                <a href="#" class="page-item-custom">
                    <i class="fas fa-chevron-left"></i>
                </a>

                <a href="#" class="page-item-custom active">1</a>
                <a href="#" class="page-item-custom">2</a>
                <a href="#" class="page-item-custom">3</a>

                <a href="#" class="page-item-custom">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <!-- PAGINATION END -->

        </div>
    </main>
    <!-- LISTING END -->


    <!-- FOOTER -->
    <footer class="sewasini-footer">

        <div class="container">
            <div class="row footer-main align-items-center">

                <div class="col-lg-3 col-md-6 footer-brand">
                    <h3 class="footer-logo">
                        <i class="fas fa-home me-2"></i>
                        SewaSini
                    </h3>

                    <p>
                        Temukan tempat tinggal nyaman dan sesuai kebutuhanmu
                        bersama SewaSini.
                    </p>

                    <div class="footer-social">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-navigation">
                    <h6>Navigasi</h6>
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/daftar-kos') }}">Daftar Kos</a>
                    <a href="{{ url('/#tentang') }}">Tentang Kami</a>
                    <a href="{{ url('/#kontak') }}">Kontak</a>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h6>Hubungi Kami</h6>

                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Pekanbaru, Riau
                    </p>

                    <p>
                        <i class="fas fa-envelope me-2"></i>
                        sew asini@example.com
                    </p>

                    <p>
                        <i class="fas fa-phone me-2"></i>
                        08xxxxxxxxxx
                    </p>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-illustration">
                        <div class="footer-landscape">
                            <div class="footer-sun"></div>
                            <i class="fas fa-home footer-house"></i>
                            <i class="fas fa-tree footer-tree tree-one"></i>
                            <i class="fas fa-tree footer-tree tree-two"></i>
                            <i class="fas fa-star footer-star star-one"></i>
                            <i class="fas fa-star footer-star star-two"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-copyright">
            <p>© 2026 SewaSini. Semua Hak Dilindungi.</p>
        </div>

    </footer>
    <!-- FOOTER END -->

</div>


<!-- BOOTSTRAP JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


<!-- LOGIKA PENCARIAN DAN FILTER -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchForm = document.getElementById('searchKosForm');
    const filterForm = document.getElementById('filterKosForm');

    const sortSelect = document.getElementById('sortKos');
    const verifiedOnly = document.getElementById('verifiedOnly');

    const listing = document.getElementById('listingKos');
    const jumlahHasil = document.getElementById('jumlahHasil');
    const pesanKosong = document.getElementById('pesanKosong');
    const pagination = document.getElementById('paginationKos');

    const cards = Array.from(
        document.querySelectorAll('.daftar-kos-card')
    );

    const searchButton = searchForm.querySelector('button[type="submit"]');

    // Mengambil nilai input
    function nilai(form, name) {
        const input = form.querySelector(`[name="${name}"]`);

        return input ? input.value.trim().toLowerCase() : '';
    }

    // Mengambil checkbox yang dipilih
    function checkboxTerpilih(form, name) {
        return Array.from(
            form.querySelectorAll(`[name="${name}"]:checked`)
        ).map(input => input.value.toLowerCase());
    }

    // Fungsi utama filter
    function jalankanFilter() {

        const lokasi = nilai(searchForm, 'lokasi');
        const keyword = nilai(searchForm, 'keyword');

        const hargaMin = Number(nilai(searchForm, 'harga_min')) || 0;
        const hargaMax = Number(nilai(searchForm, 'harga_max')) || Infinity;

        const jenis = nilai(searchForm, 'jenis');

        const filterLokasi = nilai(filterForm, 'filter_lokasi');

        const filterHargaMin =
            Number(nilai(filterForm, 'filter_harga_min')) || 0;

        const filterHargaMax =
            Number(nilai(filterForm, 'filter_harga_max')) || Infinity;

        const jenisDipilih =
            checkboxTerpilih(filterForm, 'filter_jenis[]');

        const fasilitasDipilih =
            checkboxTerpilih(filterForm, 'fasilitas[]');

        const kamarMandiDipilih =
            checkboxTerpilih(filterForm, 'kamar_mandi[]');

        const periode = nilai(filterForm, 'periode');

        const hanyaTersedia =
            filterForm.querySelector('[name="tersedia"]').checked;

        const hanyaTerverifikasi =
            verifiedOnly.checked ||
            filterForm.querySelector('[name="terverifikasi"]').checked;

        let hasil = [];

        cards.forEach(card => {

            const nama = card.dataset.name.toLowerCase();
            const alamat = card.dataset.location.toLowerCase();

            const harga = Number(card.dataset.price);
            const tipe = card.dataset.type.toLowerCase();

            const fasilitas = card.dataset.facilities.toLowerCase();
            const kamarMandi = card.dataset.bathroom.toLowerCase();
            const periodeKos = card.dataset.period.toLowerCase();

            const tersedia = card.dataset.available === 'true';
            const terverifikasi = card.dataset.verified === 'true';

            // Filter lokasi
            const cocokLokasi =
                (!lokasi || alamat.includes(lokasi)) &&
                (!filterLokasi || alamat.includes(filterLokasi));

            // Filter kata kunci
            const cocokKeyword =
                !keyword ||
                nama.includes(keyword) ||
                alamat.includes(keyword) ||
                fasilitas.includes(keyword);

            // Filter harga
            const cocokHarga =
                harga >= hargaMin &&
                harga <= hargaMax &&
                harga >= filterHargaMin &&
                harga <= filterHargaMax;

            // Filter jenis kos
            const cocokJenis =
                (!jenis || tipe === jenis) &&
                (
                    jenisDipilih.length === 0 ||
                    jenisDipilih.includes(tipe)
                );

            // Filter fasilitas
            const cocokFasilitas =
                fasilitasDipilih.every(item =>
                    fasilitas.split(' ').includes(item)
                );

            // Filter kamar mandi
            const cocokKamarMandi =
                kamarMandiDipilih.length === 0 ||
                kamarMandiDipilih.includes(kamarMandi);

            // Filter periode
            const cocokPeriode =
                !periode || periodeKos === periode;

            // Filter ketersediaan
            const cocokKetersediaan =
                !hanyaTersedia || tersedia;

            // Filter verifikasi
            const cocokVerifikasi =
                !hanyaTerverifikasi || terverifikasi;

            const cocok =
                cocokLokasi &&
                cocokKeyword &&
                cocokHarga &&
                cocokJenis &&
                cocokFasilitas &&
                cocokKamarMandi &&
                cocokPeriode &&
                cocokKetersediaan &&
                cocokVerifikasi;

            if (cocok) {
                hasil.push(card);
            }
        });


        // SORTING
        const urutan = sortSelect.value;

        if (urutan === 'murah') {
            hasil.sort((a, b) =>
                Number(a.dataset.price) - Number(b.dataset.price)
            );
        }

        else if (urutan === 'mahal') {
            hasil.sort((a, b) =>
                Number(b.dataset.price) - Number(a.dataset.price)
            );
        }

        else if (urutan === 'terbaru') {
            hasil.sort((a, b) =>
                Number(a.dataset.newest) - Number(b.dataset.newest)
            );
        }

        else if (urutan === 'rating') {
            hasil.sort((a, b) =>
                Number(b.dataset.rating) - Number(a.dataset.rating)
            );
        }

        else if (urutan === 'populer') {
            hasil.sort((a, b) =>
                Number(b.dataset.popularity) - Number(a.dataset.popularity)
            );
        }


        // Sembunyikan semua card terlebih dahulu
        cards.forEach(card => {
            card.closest('.kos-item').style.display = 'none';
        });

        // Tampilkan card yang cocok sesuai urutan
        hasil.forEach(card => {
            const item = card.closest('.kos-item');

            item.style.display = '';
            listing.appendChild(item);
        });


        // Jumlah hasil
        jumlahHasil.textContent =
            `Menampilkan ${hasil.length} pilihan kos untukmu`;

        // Pesan jika hasil kosong
        pesanKosong.style.display =
            hasil.length === 0 ? 'block' : 'none';

        // Pagination disembunyikan jika tidak ada hasil
        pagination.style.display =
            hasil.length === 0 ? 'none' : 'flex';
    }


    // Tombol pencarian
    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        jalankanFilter();
    });

    // Tombol terapkan filter
    filterForm.addEventListener('submit', function (event) {
        event.preventDefault();

        jalankanFilter();

        const filterElement = document.getElementById('filterKos');

        if (window.bootstrap) {
            bootstrap.Collapse.getOrCreateInstance(filterElement).hide();
        }
    });

    // Reset filter
    filterForm.addEventListener('reset', function () {
        setTimeout(jalankanFilter, 0);
    });

    // Verified Only
    verifiedOnly.addEventListener('change', jalankanFilter);

    // Sorting
    sortSelect.addEventListener('change', jalankanFilter);


    // Reset seluruh pencarian dan filter
    document.getElementById('resetSemua').addEventListener('click', function () {

        searchForm.reset();
        filterForm.reset();

        verifiedOnly.checked = false;
        sortSelect.value = '';

        jalankanFilter();
    });


    // Map View masih berupa pemberitahuan
    document.getElementById('mapViewBtn').addEventListener('click', function () {
        alert('Fitur Map View akan dihubungkan pada tahap pengembangan berikutnya.');
    });


    // Jalankan pertama kali
    jalankanFilter();

});
</script>

</body>
</html>
