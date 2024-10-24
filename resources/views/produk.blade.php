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
                <h2 style="color: #fff; font-family: 'Montserrat'; font-size: 36px;">Nikmati Kelezatan Kue di
                    JoFe - Bakery</h2>
                <p style="color: #fff; font-family: 'Montserrat'; font-size: 24px;">Nikmati kelezatan kue berkualitas
                    terbaik yang siap memanjakan lidah Anda hanya di JoFe Bakery! Kami menyediakan berbagai pilihan kue
                    yang dibuat dengan bahan-bahan terbaik dan dengan keahlian yang profesional, sehingga setiap gigitan
                    pasti membuat Anda terpesona. Segera kunjungi toko kami dan rasakan sendiri
                    kelezatan kue kami yang tak tertandingi!</p>
            </div>
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


    <!-- PRODUK -->
    <div class="container" style="margin-top: 100px;">
        <h2 class="text-center pb-4 pt-5 mb-0"
            style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.8rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
            <b>PRODUK</b>
        </h2>
        <div class="alert alert-warning" role="alert">
            <b>Penting! :</b> Seluruh pesanan produk adalah pre-order.
        </div>
        <div class="row">
            @foreach ($allproduk as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border: 2px solid #ddd; padding: 10px;">
                        <img src="/image/produk/{{ $item->image }}"
                            style="width:100%; height: 300px; object-fit: cover;">
                        <div class="caption">
                            <h3 style="font-size: 1.5rem; font-weight: bold;">
                                {{ $item->nama }}
                            </h3>
                            <h4 style="font-size: 1.2rem; font-weight: bold; color: black;">
                                Rp.{{ number_format($item->harga) }}/ Kg
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('detail_produk', $item->id) }}" class="btn btn-primary btn-block"
                                        role="button">
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
    <!-- Pagination -->
    <div class="container">
        <ul class="pagination">
            <!-- Tombol sebelumnya -->
            @if ($allproduk->currentPage() > 1)
                <li><a href="{{ $allproduk->previousPageUrl() }}">&#8249;</a></li>
            @else
                <li class="disabled"><a>&#8249;</a></li>
            @endif
            <!-- Membuat link halaman -->
            @for ($i = 1; $i <= $allproduk->lastPage(); $i++)
                <li class="{{ $i == $allproduk->currentPage() ? 'active' : '' }}">
                    <a href="{{ $allproduk->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <!-- Tombol selanjutnya -->
            @if ($allproduk->hasMorePages())
                <li><a href="{{ $allproduk->nextPageUrl() }}">&#8250;</a></li>
            @else
                <li class="disabled"><a>&#8250;</a></li>
            @endif
        </ul>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- END PRODUK --}}


    <!-- Site footer -->
    <footer class="site-footer">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4><b style="font-family: 'Crimson Text', serif; font-size: 2.0rem;">Tentang</b></h4>
                    <p class="text-justify"><b> Jofe Bakery </b> adalah toko online
                        terpercaya yang menyediakan produk berkualitas dengan harga yang terjangkau. Kami
                        berkomitmen
                        untuk
                        memberikan pengalaman belanja yang menyenangkan bagi pelanggan kami, Bergabunglah dengan
                        komunitas
                        <b>Jofe Bakery</b> dan dapatkan akses ke penawaran dan promo <i>eksklusif</i>, serta
                        informasi
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
