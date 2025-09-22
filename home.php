<?php
    require 'session_check.php'; // Periksa session
    require 'notif_check.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        html,body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100%;
            background: #C1D4F5;
            flex-direction: column;
        }
       
        .sidebar {
            width: 200px;
            background-color: #007bff;
            padding: 20px;
            color: white;
            position: relative;
        }

        .button {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: left;
            width: 100%;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #004494;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .text {
            display: none; /* Teks disembunyikan secara default */
            margin-top: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Jarak antar shape */
        }

        .rounded-square {
            width: 400px;
            height: 300px;
            background-color:rgb(18, 75, 135);
            border-radius: 15px; /* Sudut membulat */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(260px);
        }

        .rounded-square img {
            max-width: 80%; /* Mengatur ukuran gambar */
            max-height: 80%; /* Mengatur ukuran gambar */
            margin-bottom: 10px; /* Jarak antara gambar dan teks */
        }

        h3 {
            margin: 0; /* Menghilangkan margin default */
            font-weight: bold;
        }

        h1 {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
        }

        h5 {
            font-weight: bold;
        }

        h5 a{
            text-decoration :none;
            color: inherit;
            font-style: bold;
        }

        footer {
            text-align: center;
            background-color: rgb(238, 240, 243);
            color: black;
            font-weight: bold;
            padding: 10px 0;
            width: 100%;
            bottom:0;
        }

        .content {
            flex: 1;
            flex-grow: 1;
            padding: 20px;
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
                                <?php if ($notifikasi) : ?>
                                    <span style="display:inline-block; width:8px; height:8px; background:red; border-radius:50%; margin-left:5px;"></span>
                                <?php endif; ?>
                                
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="cari_pinjam.php">Peminjaman
                                <?php if ($notifikasi) : ?>
                                    <span style="background: yellow;"><?= $totalNotif ?></span>
                                <?php endif; ?>
                                
                                </a></li>
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
    
    <div class="content">
        <div class="container">
            <h1>Dashboard</h1>
            <div class="rounded-square">
                <h3 id="countKatalog">0</h3>
                <h3>Katalog</h3>
            </div>
            <div class="rounded-square">
                <h3 id="countPinjam">0</h3>
                <h3>Peminjaman</h3>
            </div>
            <div class="rounded-square">
                <h3 id="countKembali">0</h3>
                <h3>Pengembalian</h3>
            </div>
        </div>
    </div>

    <footer>
        <p></p>
        &copy; 2025 DEPARTEMEN PRODUKSI
        <p></p>
    </footer>

    <script>
        // Fungsi untuk mengambil jumlah data dari server
        async function updateDataCatalog() {
            try {
                const response = await fetch('getCountKatalog.php'); // Menyambung ke backend PHP
                const result = await response.json(); // Mendapatkan data dalam format JSON
                
                // Perbarui nilai pada elemen <h3> dengan id 'dataCount'
                document.getElementById('countKatalog').textContent = result.count;
            } catch (error) {
                console.error('Error:', error);
            }
        }

        async function updateDataPinjam() {
            try {
                const response = await fetch('getCountPinjam.php'); // Menyambung ke backend PHP
                const result = await response.json(); // Mendapatkan data dalam format JSON
                
                // Perbarui nilai pada elemen <h3> dengan id 'dataCount'
                document.getElementById('countPinjam').textContent = result.count;
            } catch (error) {
                console.error('Error:', error);
            }
        }

        async function updateDataKembali() {
            try {
                const response = await fetch('getCountKembali.php'); // Menyambung ke backend PHP
                const result = await response.json(); // Mendapatkan data dalam format JSON
                
                // Perbarui nilai pada elemen <h3> dengan id 'dataCount'
                document.getElementById('countKembali').textContent = result.count;
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // Memanggil fungsi untuk mengupdate jumlah data saat halaman dimuat
        updateDataCatalog();
        updateDataPinjam();
        updateDataKembali();


        // Jika ingin memperbarui setiap interval tertentu (misalnya setiap 5 detik):
        setInterval(updateDataCount, 5000); // Update setiap 5 detik
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>