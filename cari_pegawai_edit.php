<?php
$conn = new mysqli('localhost','root','', 'gudang_alat');
if ($conn->connect_error) {
    die("Koneksi gagal: ". $conn->connect_error);
}

$nik_pegawai = "";
$data = [];

if (isset($_GET['nik_pegawai'])) {
    $nik_pegawai = $_GET['nik_pegawai'];

    $sql = "SELECT * FROM data_pegawai WHERE nik_pegawai = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nik_pegawai);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $nik_pegawai = $_POST['nik_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_wa_pegawai = $_POST['no_wa_pegawai'];

    $sqlUpdate = "UPDATE data_pegawai SET nama_pegawai = ?, no_wa_pegawai = ? WHERE nik_pegawai=?";
    $stmt = $conn->prepare($sqlUpdate);

    if (!$stmt) {
        die("Prepare failed: " .$conn->error);
    }

    $stmt->bind_param("sss", $nama_pegawai, $no_wa_pegawai, $nik_pegawai);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='cari_pegawai.php';</script>";
    } else {
        echo "Gagal update: " . $stmt->error;
    }
}
?>

<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

      
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
    <style>

        h5 a {
            font-weight: bold;
            color: inherit; /* Warna mengikuti elemen induk */
            text-decoration: none; /* Hilangkan garis bawah */
        }


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

        .header{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 80px;
            flex: 1;
        }

        h1{
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .input-group{
            display: flex;
            align-items: center;
            justify-content: end;
            flex-wrap: nowrap;
            margin-top: 20px;
            gap: 10px;
        }

        .table-container {
            padding-top: 50px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        table {
            width: auto;
            border-collapse: collapse;
            background-color: white;
            overflow-x: auto;
            overflow-y: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: rgb(18, 75, 135);
            color: white;
            font-size: 13px;
        }

        td{
            font-weight: bold;
        }

        img {
            width: 80px;
            height: 100px;
            border: 3px solid white;
        }

        footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;
            background-color: rgb(238, 240, 243);
            padding: 20px;
            width: 100%;
            margin-top: 20px;
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

        <!-- Textarea dan Tombol Search -->
        <div class="content">
        <div class="container">
        <h1>Tambahkan Data Peminjam</h1>
        <form method="POST" enctype="multipart/form-data">
                <div class="mb-2">
                    <div class="form-floating mb-2">
                        <input type="number" id="nik_pegawai" name="nik_pegawai" class="form-control" placeholder="Masukkan NIK Pegawai" autocomplete="off" value="<?= $data['nik_pegawai']?>">
                        <label for="nik_pegawai">NIK Pegawai</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="Masukkan Nama Pegawai" autocomplete="off" value="<?= $data['nama_pegawai']?>">
                        <label for="nama_pegawai">Nama Pegawai</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" id="no_wa_pegawai" name="no_wa_pegawai" class="form-control" placeholder="Masukkan No Whatsapp Pegawai" autocomplete="off" value="<?= $data['no_wa_pegawai']?>">
                        <label for="no_wa_pegawai">No Whatsapp Pegawai</label>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Edit Peminjam</button>
                </div>
            </form>
            <h1>Daftar Peminjam</h1>
            <div class="input-group">
                <form action="cari_pegawai.php" method="get" class="form-container d-flex">
                    <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append d-flex">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>        
        </div>
        <div class="container">
            <div class="table-container">
                <?php
                    // Koneksi ke database
                    $conn = new mysqli('localhost', 'root', '', 'gudang_alat');

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Ambil kata kunci pencarian dari URL
                    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                    // Query untuk mengambil data berdasarkan pencarian
                    $sql = "SELECT * FROM data_pegawai WHERE nama_pegawai LIKE ? OR nik_pegawai LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $searchTermLike = "%" . $searchTerm . "%";
                    $stmt->bind_param("ss", $searchTermLike, $searchTermLike);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <th>No</th>
                                    <th>NIK Pegawai</th>
                                    <th>Nama Pegawai</th>
                                    <th>No Whatsapp Pegawai</th>
                                    <th>Aksi</th>
                                </tr>";
                        $no = 1;

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='data-row'>
                                    <td>" . $no++ . "</td>
                                    <td>" . $row['nik_pegawai'] . "</td>
                                    <td>" . $row['nama_pegawai'] . "</td>
                                    <td>" . $row['no_wa_pegawai'] . "</td>
                                    <td>
                                    <a onclick=window.location.href='hapus_pegawai.php?nik_pegawai=" . $row['nik_pegawai'] . "'>
                                            <button class='btn btn-danger btn-sm me-1' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                                                <i class='bi bi-trash3-fill'></i>
                                            </button>
                                        </a>
                                        <a onclick=window.location.href='edit_catalog.php?nik_pegawai=". $row['nik_pegawai']. "'>
                                            <button class='btn btn-primary btn-sm'>
                                                <i class='bi bi-sliders2'></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Tidak ada data.";
                    }

                    $stmt->close();
                    $conn->close();
                ?>
            </div>
        </div>
    </div>


    <footer>
        <p></p>
        &copy; 2025 DEPARTEMEN PRODUKSI
        <p></p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
