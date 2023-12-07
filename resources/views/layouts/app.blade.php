<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Thrift</title>
    <!-- Tambahkan link CSS Bootstrap atau CDN Bootstrap jika digunakan -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Tambahkan link CSS atau CDN lainnya yang dibutuhkan -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Toko Thrift</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Tambahkan script JavaScript Bootstrap atau CDN Bootstrap jika digunakan -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Tambahkan script JavaScript atau CDN lainnya yang dibutuhkan -->
    <script src="{{ asset('js/script.js') }}"></script>

    @extends('layouts.app')

    @section('content')
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang di Toko Thrift</h1>
            <p class="lead">Temukan berbagai produk thrift yang unik dan terjangkau.</p>
            <hr class="my-4">
            <p>Explore koleksi kami dan temukan penawaran menarik.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Lihat Produk</a>
        </div>
    @endsection

</body>

</html>
