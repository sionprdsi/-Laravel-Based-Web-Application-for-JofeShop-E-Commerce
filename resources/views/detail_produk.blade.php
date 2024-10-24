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


    {{-- DETAIL PRODUK --}}
    <div class="container" style="margin-top: 100px;">
        <h2 class="text-center pb-4 pt-5 mb-0"
            style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.5rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
            <b>DETAIL PRODUK</b>
        </h2>
        @foreach ($allproduk as $item)
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="/image/produk/{{ $item->image }}" style="width:370;">
                    </div>
                </div>

                <div class="col-md-8">
                    <form action="{{ route('addToCart', ['id' => $item->id]) }}" method="GET">
                        <input type="hidden" name="jml" value="1">
                        <table class="table table-striped">
                            <tbody style="color:black;">
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>
                                        {{ $item->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Harga</b></td>
                                    <td>
                                        Rp.{{ number_format($item->harga) }}/ Kg
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi</b></td>
                                    <td>
                                        {{ $item->deskripsi }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td><b>Jumlah</b></td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control jumlah-pesanan" type="number" min="1" name="jml" value="1" style="width: 129%;" readonly>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-warning ubah-jumlah-btn" style="color: black;" data-toggle="modal" data-target="#ubahModal{{ $item->id }}">
                                                    <i class="fa fa-pencil"></i> Ubah Jumlah Pesanan
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>

                        <!-- MODAL -->
                        {{-- <div class="modal fade" id="ubahModal{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="ubahModalLabel{{ $item->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn btn-warning" style="color: black;"
                                        data-toggle="modal" data-target="#ubahModal{{ $item->id }}">
                                        <i class="fa fa-pencil"></i> Ubah Jumlah Pesanan
                                    </button>
                                    <div class="modal-body">
                                        <input class="form-control" type="number" min="1" name="jml"
                                            value="1" style="width: 155px;" id="ubahJumlah">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fa fa-times"></i> Batal
                                        </button>

                                        <!-- Tambahkan tombol submit di modal -->

                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success">
                                                <i class="glyphicon glyphicon-shopping-cart"></i> Simpan dan Tambahkan
                                                ke Keranjang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Menggunakan class untuk mendapatkan semua tombol "Ubah Jumlah Pesanan"
                                $('.ubah-jumlah-btn').click(function() {
                                    // Mengambil nilai input jumlah pada saat tombol diklik
                                    var jumlah = $(this).closest('.row').find('.jumlah-pesanan').val();

                                    // Mengisi nilai input jumlah pada modal dengan nilai yang diambil
                                    $(this).closest('.row').find('.ubah-jumlah-modal').val(jumlah);
                                });
                            });
                        </script> --}}

                        <a href="{{ route('produk') }}" class="btn btn-primary"> Kembali</a>

                        <button type="submit" class="btn btn-success"><i
                                class="glyphicon glyphicon-shopping-cart"></i>
                            Tambahkan ke Keranjang</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{-- END DETAIL PRODUK --}}


    <style>
        .btn-primary {
            color: #fff;
            border-color: #9666f1;
        }
    </style>
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
