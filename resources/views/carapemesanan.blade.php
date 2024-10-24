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
                    <a href="produk.php" class="btn btn-light btn-lg"
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

    <style>
        .bs-acc {
            margin: 20px;
        }

        .panel-heading {
            background-color: #eee;
        }

        .panel-heading a {
            color: #000;
        }

        .panel-heading a:hover {
            text-decoration: none;
        }

        .panel-title {
            font-weight: bold;
        }

        .panel-body ol {
            padding-left: 20px;
        }

        .panel-body ol li {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .page-title {
            border: 2px solid #6C5B7B;
            border-color: linear-gradient(to bottom right, #6C5B7B, #355C7D);
            padding: 10px;
            margin-bottom: 100px;
            font-family: 'Helvetica Neue', sans-serif;
            color: #333;
            text-shadow: 2px 2px #ccc;
        }
    </style>

    <div class="container" style="margin-top: 100px;">
        <h2 class="text-center pb-4 pt-5 mb-0"
            style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Helvetica Neue', sans-serif; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
            <b>CARA PEMESANAN</b>
        </h2>
        <div class="bs-acc">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title">
                                Bagaimana Cara Berbelanja di JoFe - Shop melalui Online?
                            </h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ol>
                                <li>Pastikan Anda sudah melakukan <b>Daftar Akun</b> sebelum memesan produk.</li>
                                <li>Setelah anda mendaftar akun, pastikan anda juga sudah <b>Login</b> dengan akun yang
                                    Anda <b>Daftarkan.</b></li>
                                <li>Masuk ke halaman <b>Beranda</b> jika ingin langsung melihat produk.</li>
                                <li>Atau Anda dapat masuk ke halaman <b>Produk</b> jika ingin langsung memesan Kue.</li>
                                <li>Di halaman Produk, Pilih produk yang ingin dibeli.</li>
                                <li>Jika sudah memastikan produk yang ingin dibeli, Anda dapat <b>mengKlik tombol
                                        "Beli"</b> di bagian produk yang anda pilih.</li>
                                <li>Selanjutnya tekan tombol <b>"checkout."</b></li>
                                <li>Anda akan Masuk ke halaman <b>Detail Pesanan Anda.</b></li>
                                <li><b>Pastikan Pesanan Anda Sudah Benar.</b></li>
                                <li>Lalu Anda <B>Wajib</B> mengisi Form untuk menyimpan data pesanan anda kepada Admin.
                                </li>
                                <li>Pastikan <b>Data Form</b> sudah diisi dan anda sudah membaca pengumuman yang ada.
                                </li>
                                <li>Anda Akan diberikan <b>Link WhatsApp Owner</b> dengan tombol <b>"Order
                                        Sekarang."</b></li>
                                <li>Lakukan Pembelian Anda kepada <b>JOFE SHOP</b> melalui <b>via chat WhatsApp.</b>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title">
                                Bagaimana Cara Mendaftar Akun di Toko Online JoFe - Shop
                            </h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ol>
                                <li>Pilih tombol <b>"Masuk"</b> dibagian halaman atas.</li>
                                <li>Lalu tekan <b>Daftar.</b></li>
                                <li>Anda akan masuk ke halaman Daftar Akun.</li>
                                <li>Pastikan Form anda isi semua dengan benar.</li>
                                <li>Lalu tekan tombol <b>"Daftar."</b></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    {{-- FOOTER --}}
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
