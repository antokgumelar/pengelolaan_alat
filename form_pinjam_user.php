<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    $kode_alat = '';
    $nama_alat = '';

    if (isset($_GET['kode_alat'])) {
        $kode_alat = $_GET['kode_alat'];
        $sql = "SELECT nama_alat FROM katalog_alat WHERE kode_alat = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $kode_alat);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            $nama_alat = $data['nama_alat'];
        }
    }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,body {
            font-family: Arial, sans-serif;
            background: #C1D4F5;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 40px;
            flex: 1;
        }

        .header{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
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

        .form-container {
            position: absolute;
            top:50px;
            padding-bottom: 100px;
            margin-top: 100px;
            background: rgba(255, 255, 255, 0.8);
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 700px;
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

        .select2-container--default .select2-selection--single {
            height: 58px;
            padding: 1rem .75rem .25rem .75rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: .375rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.25;
            padding-left: 0;
        }
        
    </style>
</head>
<body>
    <div class="header d-flex justify-content-center">
        <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';" >
    </div>
    
    <div class="form-container">
    <!-- welcome page -->
    <h2>Formulir Peminjaman</h2>
        <form method="POST" action="input_pinjam.php" enctype="multipart/form-data">
            <div class="mb-3">
            
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" placeholder="ID Peminjaman" readonly required autocomplete="off">
                    <label for="id_pinjam">ID Peminjaman</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal Peminjaman" required autocomplete="off">
                    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Pengembalian" required autocomplete="off">
                    <label for="tanggal_kembali">Tanggal Pengembalian</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nik_pegawai" name="nik_pegawai"  oninput="ambilNIK()" placeholder="Nomor Induk Karyawan" required autocomplete="off">
                    <label for="nik_pegawai">Nomor Induk Karyawan</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Peminjam" readonly required autocomplete="off">
                    <label for="nama_pegawai">Nama Peminjam</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="no_wa_pegawai" name="no_wa_pegawai" placeholder="Nomor Whatsapp Peminjam" readonly required autocomplete="off">
                    <label for="no_wa_pegawai">Nomor Whatsapp Peminjam</label>
                </div>

                <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" placeholder="Masukkan Nama Proyek" required autocomplete="off"> 
                        <label for="nama_proyek">Nama Proyek</label>

                </div>

                <div class="form-floating mb-2">
                    <select class="form-control" id="kode_alat" name="kode_alat" required autocomplete="off">
                        <option value="<?= $kode_alat ?>" selected><?= $kode_alat ?></option>
                    </select>
                    <label for="kode_alat">Kode Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Alat" readonly autocomplete="off" required value="<?= $nama_alat ?>">
                    <label for="nama_alat">Nama Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty" required autocomplete="off">
                    <label for="qty">Qty</label>
                </div>

                <div class="form-floating mb-5">
                    <select class="form-control" id="status_peminjaman" name="status_peminjaman" disabled>
                        <option value="" disabled selected>Pilih Status Peminjaman</option>
                        <option value="Sedang Diajukan" selected>Sedang Diajukan</option>
                    </select>
                        <label for="status_peminjaman">Status Peminjaman</label>
                    <input type="hidden" id="status_peminjaman" name="status_peminjaman" value="Sedang Diajukan">
                </div>
                
                <br>
                <div class="d-grid gap-3">
                    <button class="btn btn-primary" type="submit">Konfirmasi Peminjaman</button>
                    <button class="btn btn-secondary" type="reset">Reset Peminjaman</button>
                    <button class="btn btn-danger" type="button" onclick="window.location.href='pinjam.php'">Batalkan Peminjaman</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        // Fungsi untuk generate ID peminjaman
        function generateID() {
            const randomNumber = Math.floor(1000 + Math.random() * 9000); // Generate 4-digit random number
            const generatedID = `PJM-${randomNumber}`;
            document.getElementById('id_pinjam').value = generatedID;
        }

        function ambilNIK() {
            let nikPegawai = document.getElementById('nik_pegawai').value.trim();

            if (nikPegawai === "") {
                document.getElementById('nama_pegawai').value = "";
                document.getElementById('no_wa_pegawai').value = "";
                return;
            }

            fetch('data_pegawai.php?nik_pegawai=' + encodeURIComponent(nikPegawai))
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        document.getElementById('nama_pegawai').value = data.data.nama_pegawai;
                        document.getElementById('no_wa_pegawai').value = data.data.no_wa_pegawai;
                    } else {
                        document.getElementById('nama_pegawai').value = ""; // Kosongkan jika tidak ditemukan
                        document.getElementById('no_wa_pegawai').value = "";
                        console.log("Data pegawai tidak ditemukan");
                    }
                })
                .catch(error => {
                    console.error("Gagal mengambil data:", error);
                });
        }


        // Jalankan semua fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('nik_pegawai').addEventListener('input', ambilNIK);
            generateID();         // Generate ID peminjaman
        });

    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </body>
</html>