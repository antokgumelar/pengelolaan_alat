<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 10;
        padding: 0;
        display: flex;
        height: 100vh;
        background:rgb(185, 214, 250);
        background-image: url('background.jpg')
        background-size: cover; /* Mengatur gambar memenuhi seluruh area */ 
        background-repeat: no-repeat; /* Mencegah gambar diulang */
        background-attachment: fixed; /* Membuat background tetap saat di-scroll */
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
   
    .sidebar {
        width: 200px;
        background-color: #007bff;
        padding: 20px;
        color: rgb(73, 120, 250);
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
        background-color:rgb(28, 112, 207);
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
        background-color:rgb(10, 111, 212)
        justify-content: center;
        gap: 20px; /* Jarak antar shape */
        flex-grow: 1;
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
    table {
        width: 85%; /* Batasi lebar tabel */
        margin: 290px auto; /* Tengahkan tabel pada halaman */
        position : absolute;
        right: 100px;
        border-collapse: collapse; /* Hapus jarak antar garis tabel */
    }
    th, td {
        border: 1px solid #dddddd; /* Tambahkan garis pembatas */
        text-align: left; /* Teks rata kiri */
        padding: 8px; /* Tambahkan ruang di dalam sel */
    }

    th {
        background-color: rgb(18, 75, 135);
        text-align:center;    
        color: white;
    }

    td {
        background-color: white;
    }

    table tbody tr td:nth-child(6), 
    table thead tr th:nth-child(6) {
        width: 15%;
        text-align: center; /* Contoh tambahan */
    }

    table tbody tr td:nth-child(7), 
    table thead tr th:nth-child(7) {
        width: 7%;
        text-align: center; /* Contoh tambahan */
    }table tbody tr td:nth-child(8), 
    table thead tr th:nth-child(8) {
        text-align: center; /* Contoh tambahan */
    }


    .search {
        position:absolute;
        top: 150px;
        right: 99px;
    }

    textarea{
        resize: none;
    }

    footer {
    text-align: center;
    background-color:rgb(238, 240, 243);
    color: black;
    padding: 5px;
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 5;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

</style>
  <body>  
  <nav class="navbar bg-body-tertiary fixed-top"> 
  <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">halo</a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="katalog_percobaan.php">
                <i class="bi bi-archive"></i> Katalog
              </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-arrow-down-up"></i> Transaksi
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Peminjaman Alat</a></li>
                  <li><a class="dropdown-item" href="#">Pengembalian Alat</a></li>
                 </ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-journal-album"></i> Laporan
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Peminjaman Alat</a></li>
                  <li><a class="dropdown-item" href="#">Pengembalian Alat</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    
     <!-- Textarea dan Tombol Search -->
        <div class="search">
        <div class="row mb-3 align-items-center">
            <!-- Textarea -->
            <div class="col-8">
                <textarea id="searchTextarea" class="form-control" rows="1" placeholder="Cari Disini"></textarea>
            </div>
            <!-- Button -->
            <div class="col-2">
                <button class="btn btn-primary w-105" onclick="searchTable()">Cari</button>
            </div>
        <div class="col-2">
            <button class="btn btn-primary w-100" onclick="window.location.href='addcata.php'">
                <i class="bi bi-pencil-square"></i>
            </button>
        </div>
        </div>
        </div>

    <table>
    <?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'rentoram_gudang_alat');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT * FROM katalog_alat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>No</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Jenis Alat</th>
                <th>Jumlah Stok</th>
                <th>Posisi Alat</th>
                <th>Gambar Alat</th>
                <th>Lainnya</th>
            </tr>";
    $no = 1;

    while ($row = $result->fetch_assoc()) {
        // Path gambar
        $gambar_alat = "uploads/" . $row['gambar_alat'];

        // Validasi keberadaan gambar
        if (empty($row['gambar_alat']) || !file_exists($gambar_alat)) {
            $gambar_alat = "uploads/default.jpg"; // Path default gambar
        }

        // URL gambar untuk dibuka di halaman baru
        $gambar_url = "http://localhost/" . $gambar_alat;

        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row['kode_alat'] . "</td>
                <td>" . $row['nama_alat'] . "</td>
                <td>" . $row['jenis_alat'] . "</td>
                <td>" . $row['jumlah_stok'] . "</td>
                <td>" . $row['posisi_alat'] . "</td>
                <td>
                    <img src='" . $gambar_url . "' alt='Gambar Alat' width='100' height='100'>
                </td>
                <td>
                    <a href='hapus_katalog.php?kode_alat=" . $row['kode_alat'] . "'>
                    <button class='btn btn-primary btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                        <i class='bi bi-trash3-fill'></i>
                    </button>
                    </a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

$conn->close();
?>
    </table>
    
    <div class="container">
    <h1>Daftar Katalog Alat</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <footer>
        <p>&copy; 2024 DEPARTEMEN PRODUKSI</p>
    </footer>

  </body>
</html>