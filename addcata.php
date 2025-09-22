<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background: #C1D4F5;
            justify-content: center;
            align-items: flex-start; /
        }

        .sidebar {
            width: 200px;
            background-color: #007bff;
            padding: 20px;
            color: white;
            position: relative;
        }

        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            top: 110px;
            width: 50%;
        }

        h2 {
            margin: 0 0 20px;
            font-weight:bold;
            text-align:center;
            
        }

        h5 a{
            font-weight: bold;
            color: inherit; /* Warna mengikuti elemen induk */
            text-decoration: none; /* Hilangkan garis bawah */
        }

        .btn-konfirm {
            width: 100%;
            padding: 10px;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-konfirm:hover {
            background-color: #6a11cb;
        }
    </style>
</head>
  <body>
  <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand">Welcome</a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5>
                        <a href="home.php"> Dashboard </a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="cari_katalog.php">
                                <i class="bi bi-archive"></i> Katalog
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-arrow-down-up"></i>Transaksi
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cari_pinjam.php">Peminjaman</a></li>
                            <li><a class="dropdown-item" href="cari_kembali.php">Pengembalian</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="cari_pegawai.php">
                                <i class="bi bi-people"></i> Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="laporan.php">
                                <i class="bi bi-journal-album"></i> Laporan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-left"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    

    <div class="login-container">
        <!-- welcome page -->
        <h2>Tambah Alat</h2>
        <form action="input_katalog.php" method="POST" enctype="multipart/form-data">

            <div class="mb-2">
                
                <div class="form-floating mb-2">
                    <input type="text" id="kode_alat" name="kode_alat" class="form-control" placeholder="Kode Alat" required>
                    <label for="kode_alat">Kode Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="nama_alat" name="nama_alat" class="form-control" placeholder="Nama Alat" required>
                    <label for="nama_alat">Nama Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="jenis_alat" name="jenis_alat" class="form-control" placeholder="Jenis Alat" required>
                    <label for="jenis_alat">Jenis Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" id="stok_tetap" name="stok_tetap" class="form-control" placeholder="Stok Awal" required>
                    <label for="stok_tetap">Stok Awal</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" id="jumlah_stok" name= "jumlah_stok" class="form-control" placeholder="Stok Tersedia" required>
                    <label for="jumlah_stok">Stok Tersedia</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="posisi_alat" name="posisi_alat" class="form-control" placeholder="Posisi Alat" required>
                    <label for="qty">Posisi Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input class="form-control form-control-sm" id="gambar_alat" name="gambar_alat" accept="image/*" type="file" class="form-control" placeholder="Gambar Alat" required>
                    <label for="gambar_alat" class="form-label">Gambar Alat</label>
                </div>

                <br> 
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Tambahkan Alat</button>
                    <button class="btn btn-secondary" type="reset">Reset Alat</button>
                    <button class="btn btn-danger" type="button" onclick="window.location.href='cari_katalog.php'"> Batal Menambahkan Alat</button>
                </div>
                
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>