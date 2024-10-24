<!DOCTYPE html>
<html>

<head>

    <title>JoFe - Bakery</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">
    <link href="{{ asset('image/logo/JOfe BAkery-modified.png') }}" rel="shortcut icon" />
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row top" style="background: linear-gradient(to bottom right, #5600c2, #2A4FA6);">
            <div class="col-md-4" style="margin-bottom:2%;">
                <span style="font-size: 60px; color: #fff; font-family: 'Montserrat';">
                    <img src="image/logo/JOfe BAkery-modified.png" alt="JoFe - Shop" width="300" height="300"
                        style="vertical-align: middle; padding-right:10px; margin-top:40px;">JoFe Bakery</span>
            </div>
            <div class="col-md-4" style="margin-top: 50px; float: left; margin-left:21%;">
                <h2 style="color: #fff; font-family: 'Montserrat'; font-size: 36px;">Temukan berbagai Kue Kering
                    Terlezat dan
                    Terbaik hanya di JoFe - Bakery</h2>
                <p style="color: #fff; font-family: 'Montserrat'; font-size: 24px;">Nikmati kelezatan kue kami di
                    kenyamanan rumah Anda!</p>
                <div style="display: flex; align-items: center;">
                    <a href="produk" class="btn btn-light btn-lg"
                        style="color: #6C5B7B; background-color: #fff; border-color: #fff; font-family: 'Montserrat'; font-size: 24px; margin-top: 20px;"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Belanja
                        Sekarang</a>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                integrity="sha512-cN1tavM5lYf+8lWJQ2hPglWEEnKD3nKq3Xd+1xnp62nJVzmdwYl4itW8tZwwqwLkXMamB8gjMy0cG6wZCVrI7A=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-default custom-navbar"
        style="border-bottom: 8px solid linear-gradient(to bottom right, #6C5B7B, #355C7D);">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="container-fluid navbar-center">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/produk">Produk</a></li>
                        <li><a href="/about">Tentang Kami</a></li>
                        <li><a href="/keranjang"><i class="glyphicon glyphicon-shopping-cart"></i><b
                                    class="badge badge-sion"></b></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i>
                                    {{ auth()->user()->nama }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item btn btn-danger">
                                                <i class="fa fa-sign-out"></i> Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Masuk
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a href="login" class="dropdown-item"><i class="fa fa-sign-in"></i>
                                            Masuk</a>
                                    </li>
                                    <li>
                                        <a href="register" class="dropdown-item"><i class="fa fa-user-plus"></i>
                                            Daftar</a>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- END Navbar --}}


    {{-- Teks Promo --}}
    <style>
        .text-center.heading {
            font-size: 32px;
            padding: 20px;
            color: white;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            background-color: #5600c2;
            background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
            background-size: 200% 200%;
            animation: wave 8s ease-in-out infinite;
            font-family: 'Crimson Text', serif;
        }

        .text-center.heading .promo-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(to bottom right, #5600c2, #2A4FA6);
            color: #fff;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 50%;
        }

        @keyframes wave {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }
    </style>
    <div class='container' style='margin-top: 100px; margin-bottom: 100px;'>
        <h4 class='text-center heading'>
            <span class='promo-badge'>
                Hadir!
            </span>
            {{ $promo->nama }}<br><br>
            {{ $promo->deskripsi }}
            <!-- Menampilkan nama promo -->
        </h4>
    </div>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    {{-- END Teks Promo --}}



    <!-- Carousel -->
    <div id="carousel-example" class="carousel slide" data-ride="carousel" style="margin-top: 19px">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ asset('image/carousel/carousel2.jpg') }}" alt="Carousel Image 2" style="width: 100%;">
                <div class="carousel-caption">
                    <h2>JoFe - Bakery</h2>
                    <p>JoFe - Bakery menawarkan beragam jenis kue kering yang lezat dan berkualitas tinggi. Kue-kue
                        kering kami
                        dibuat dengan menggunakan bahan-bahan berkualitas dan diracik dengan resep yang teruji, sehingga
                        memberikan
                        pengalaman rasa yang istimewa bagi setiap pelanggan.
                        Kami selalu berusaha memberikan yang terbaik bagi pelanggan kami, sehingga Anda akan mendapatkan
                        produk yang
                        berkualitas tinggi dan layanan yang ramah dari tim kami. Jangan ragu untuk menghubungi kami
                        melalui WhatsApp
                        di nomor +62 821-1615-4550 untuk pemesanan dan informasi lebih lanjut. Terima kasih telah
                        mempercayakan
                        kebutuhan kue kering Anda kepada kami di JoFe - Bakery.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('image/carousel/carousel1.jpg') }}" alt="Carousel Image 1" style="width: 100%;">
                <div class="carousel-caption">
                    <h2>Kue Kering</h2>
                    <p>Beraneka macam kue kering, seperti kue nastar, salju, coklat, kacang, keju, dll.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('image/carousel/carousel3.jpg') }}" alt="Carousel Image 3" style="width: 100%;">
                <div class="carousel-caption">
                    <h2>Kunjungan Mahasiswa IT DEL</h2>
                    <p>Melakukan Observasi mengenai produk kue di JoFe - Bakery.</p>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"
                style="background: linear-gradient(to bottom right, #5600c2, #2A4FA6);"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"
                style="background: linear-gradient(to bottom right, #5600c2, #2A4FA6);"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end Carousel -->


    {{-- PRODUK --}}
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <h2 class="text-center pb-4 pt-5 mb-0"
            style="border-bottom: 2px solid #6C5B7B; font-size: 4.7rem; padding: 10px; margin-bottom: 100px;font-weight: bold; text-shadow: 2px 2px #ccc; width: 100%; font-family: 'Crimson Text', serif;">
            <b>Produk Kami</b>
        </h2>

        <div class="row">
            @foreach ($allproduk->take(3) as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border: 2px solid #ddd; padding: 10px;">
                        <img src="/image/produk/{{ $item->image }}"
                            style="width:300%; height: 400px; object-fit: cover;">
                        <div class="caption">
                            <h3 style="font-size: 1.5rem; font-weight: bold;">
                                {{ $item->nama }}
                            </h3>
                            <h4 style="font-size: 1.2rem; font-weight: bold; color: black;">
                                Rp.{{ number_format($item->harga) }}
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('detail_produk', $item->id) }}"
                                        class="btn btn-primary btn-block" role="button">
                                        <i class="glyphicon glyphicon-eye-open"></i> Detail
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('addToCart', $item->id) }}" class="btn btn-success btn-block"
                                        role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- endPRODUK --}}

    <center>
        <a href="/produk">
            <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-chevron-right"></span> Lihat Lebih Banyak
            </button>
        </a>
    </center>

    <hr style="border-top: 2.3px solid #ccc; margin-top: 50px; margin-bottom: 50px;">

    {{-- Sejarah Toko --}}
    <div style="max-width: 1000px; margin: 50px auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div style="width: 100%; text-align: center;">
                <h2
                    style="font-family: 'Crimson Text', serif; font-size: 4.1rem; font-weight: bold; margin-bottom: 20px;">
                    Sejarah Toko Jofe - Bakery
                </h2>
                <p style="font-size: 1.9rem; color: #666; margin-bottom: 20px; margin-top: 20px;">
                    {{-- {{ Illuminate\Support\Str::limit($about->content, 800) }} --}}
                </p>
                <center>
                    <a href="{{ route('about') }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-chevron-right"></span> Baca Lebih Banyak
                        </button>
                    </a>
                </center>
            </div>
            <div style="width: 100%; text-align: center; margin-bottom: -3%; margin-top: 2%;">
                {{-- @if ($about->image)
                    <img src="{{ asset('image/teks_about/' . $about->image) }}" alt="Gambar About"
                        style="max-width: 100%; height: auto;">
                @endif --}}
            </div>
        </div>
    </div>
    {{-- End Sejarah Toko --}}


    {{-- LOKASI --}}
    <section class="location">
        <h2 style="font-family: 'Crimson Text', serif; font-size: 4.8rem; font-weight: bold; margin-bottom: 20px;">
            Lokasi Toko JoFe Bakery
        </h2>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7973.0080315270125!2d99.0537582697754!3d2.335540200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0466d4af5ef7%3A0x82931087a70bca84!2sPLN%20Ranting%20Balige!5e0!3m2!1sid!2sid!4v1680680148682!5m2!1sid!2sid"
                width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="info" style="margin-top: 17%;">
            <a href="https://www.google.com/maps/dir//PLN+Ranting+Balige/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x302e0466d4af5ef7:0x82931087a70bca84?sa=X&ved=2ahUKEwiO_8HY8Yv3AhXQaCsKHfZlDQwQ9Rd6BAh3EAQ"
                target="_blank" class="button">
                <i class="fas fa-location-arrow"></i> Navigasi
            </a>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- END LOKASI --}}

    <!-- Site footer -->
    <footer class="site-footer">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4><b style="font-family: 'Crimson Text', serif; font-size: 2.0rem;">Tentang</b></h4>
                    <p class="text-justify"><b> Jofe Bakery </b> adalah toko online
                        terpercaya yang menyediakan produk berkualitas dengan harga yang terjangkau. Kami berkomitmen
                        untuk
                        memberikan pengalaman belanja yang menyenangkan bagi pelanggan kami, Bergabunglah dengan
                        komunitas
                        <b>Jofe Bakery</b> dan dapatkan akses ke penawaran dan promo <i>eksklusif</i>, serta informasi
                        tentang
                        produk
                        terbaru dan <i>tren</i> terkini.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h4><b style="font-family: 'Crimson Text', serif; font-size: 2.0rem;">Alamat</b></h4>
                    <p p class="text-justify">Jl. Dr. Td. Pardede No.14 Komplek PLN Balige, Toba, Sumatra Utara</p>
                    <p><i class="fa fa-phone"></i> +62-821-1615-4550 </p>
                    <p><i class="fa fa-envelope"></i> JofeBakery@gmail.com</p>
                    </h3>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h4><b style="font-family: 'Crimson Text', serif; font-size: 2.0rem;">Layanan</b></h4>
                    <ul class="footer-links">
                        <li><a href="about.php">Tentang Kami</a></li>
                        <li><a href="carapemesanan.php">Bantuan</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
                        <a href="index.php">JoFeBakery</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="whatsapp"
                                href="https://wa.me/6282116154550?text=Halo JoFe Bakery, saya butuh bantuan..."><i
                                    class="fa fa-whatsapp"></i></a></li>
                        <li><a class="instagram" href="https://www.instagram.com/jofe_bakery/"><i
                                    class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- END FOOTER --}}
