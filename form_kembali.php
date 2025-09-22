<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
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

        .btn-confirm {
            width: 100%;
            padding: 10px;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-confirm:hover{
            background-color: #6a11cb;
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

        h2 {
            margin: 0 0 20px;
            font-weight:bold;
            text-align:center;
        }

        h1 {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
        }

        h5 a {
        font-weight: bold;
        color: inherit; /* Warna mengikuti elemen induk */
        text-decoration: none; /* Hilangkan garis bawah */
        }
        
    </style>
</head>
<body>
    <div class="prisma"></div>
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
    <h2>Form Pengembalian</h2>
        <form method="POST" action="input_kembali.php" enctype="multipart/form-data">
        <div class="mb-2">

            <div class="form-floating mb-2">
            <input type="text" class="form-control" id="id_kembali" name="id_kembali" placeholder="ID Pengembalian" onchange="generateID()" readonly>
                <label for="id_kembali">ID Pengembalian</label>
            </div>

            <div class="form-floating mb-2">
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Pengembalian" onchange="setTodayDate()" readonly>
                <label for="tanggal_kembali">Tanggal Pengembalian</label>
            </div>
            
            <div class="form-floating mb-2">
                    <select class="form-control" id="id_pinjam" name="id_pinjam" onchange="updateFormFields()" autocomplete="off">
                        <option value="" disabled selected>Pilih ID</option>
                    </select>
                <label for="id_pinjam">ID Peminjaman</label>
            </div>

            <div class="form-floating mb-2">
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal Peminjaman" readonly autocomplete="off">
                <label for="tanggal_pinjam">Tanggal Peminjaman</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="nik_pegawai" name="nik_pegawai" placeholder="Nomor Induk Karyawan" autocomplete="off">
                <label for="nik_pegawai">Nomor Induk Karyawan</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Peminjam" readonly autocomplete="off">
                <label for="nama_pegawai">Nama Peminjam</label>
            </div>

            <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="no_wa_pegawai" name="no_wa_pegawai" placeholder="Nomor Whatsapp Peminjam" autocomplete="off">
                    <label for="no_wa_pegawai">Nomor Whatsapp Peminjam</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="kode_alat" name="kode_alat" oninput="ambilAlat()" placeholder="Kode Alat" autocomplete="off">
                <label for="kode_alat">Kode Alat</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off">
                <label for="nama_alat">Nama Alat</label>
            </div>
            
            <div class="form-floating mb-2">
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Qty" autocomplete="off">
                <label for="qty">Qty</label>
            </div>

            <div class="form-floating mb-2">
                <select class="form-control" id="kondisi_alat" name="kondisi_alat">
                    <option value="" disabled selected>Pilih Kondisi Alat</option>
                    <option value="Alat Berfungsi Baik">Alat Berfungsi Baik</option>
                    <option value="Alat Rusak">Alat Rusak</option>
                </select>
                    <label for="kondisi_alat">Kondisi Alat</label>
            </div>
            <div class="form-floating mb-2">
                <textarea id="keterangan" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Alat" row="3"></textarea>
                <label>Keterangan Alat</label>
            </div>
            
            <br>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" onclick="window.location.href='kembali.php'">Konfirmasi Pengembalian</button>
                <button class="btn btn-danger" type="button" onclick="window.location.href='pinjam.php'">Batalkan Pengembalian</button>
            </div>
        </div>
        </form>
    </div>

    <script>
        // Fungsi untuk generate ID Kembali
        function generateID() {
            const randomNumber = Math.floor(1000 + Math.random() * 9000); // Generate 4-digit random number
            const generatedID = `KBL-${randomNumber}`;
            document.getElementById('id_kembali').value = generatedID;
        }

        // Fungsi untuk update form berdasarkan ID Peminjaman yang dipilih
        function updateFormFields() {
            const dropdown = document.getElementById('id_pinjam');
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption) {
                document.getElementById('tanggal_pinjam').value = selectedOption.getAttribute('data-tanggal_pinjam');
                document.getElementById('nik_pegawai').value = selectedOption.getAttribute('data-nik_pegawai');
                document.getElementById('nama_pegawai').value = selectedOption.getAttribute('data-nama_pegawai');
                document.getElementById('no_wa_pegawai').value = selectedOption.getAttribute('data-no_wa_pegawai');
                document.getElementById('kode_alat').value = selectedOption.getAttribute('data-kode_alat');
                document.getElementById('nama_alat').value = selectedOption.getAttribute('data-nama_alat');
                document.getElementById('qty').value = selectedOption.getAttribute('data-qty');
                
                
            }
        }

        // Fungsi untuk fetch data dropdown dari server
        function fetchDropdownData() {
            fetch('dropdown_id_pinjam.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        const dropdown = document.getElementById('id_pinjam');
                        dropdown.innerHTML = '<option value="" disabled selected>Pilih ID Peminjaman</option>';
                        data.data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id_pinjam;
                            option.setAttribute('data-tanggal_pinjam', item.tanggal_pinjam);
                            option.setAttribute('data-nik_pegawai', item.nik_pegawai);
                            option.setAttribute('data-nama_pegawai', item.nama_pegawai);
                            option.setAttribute('data-no_wa_pegawai', item.no_wa_pegawai);
                            option.setAttribute('data-kode_alat', item.kode_alat);
                            option.setAttribute('data-nama_alat', item.nama_alat);
                            option.setAttribute('data-qty', item.qty);
                            
                        
                            option.textContent = item.id_pinjam;
                            dropdown.appendChild(option);
                        });
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(error => {
                    alert("Gagal memuat data: " + error.message);
                });
        }

        // Fungsi untuk mengisi tanggal hari ini
        function setTodayDate() {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const todayDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('tanggal_kembali').value = todayDate;
        }

        function ambilAlat() {
            let kodeAlat = document.getElementById('kode_alat').value.trim();

            if(kodeAlat === "") {
                document.getElementById('nama_alat').value = "";
                return;
            }

            fetch('katalog_alat.php?kode_alat=' + encodeURIComponent(kodeAlat))
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        document.getElementById('nama_alat').value = data.data.nama_alat;
                    } else {
                        document.getElementById('nama_alat').value = "";
                        console.log("Alat tidak ditemukan")
                    }
                })
                .catch(error => {
                    console.error("Gagal mengambil data:", error);
                });
        }

        // Jalankan semua fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            generateID(); // Generate ID Kembali
            fetchDropdownData(); // Fetch data untuk dropdown
            setTodayDate(); // Set tanggal hari ini
            document.getElementById('id_pinjam').addEventListener('change', updateFormFields); // Update form saat dropdown berubah
            document.getElementById('kode_alat').addEventListener('input', ambilAlat);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>