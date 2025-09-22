<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

        .header{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 40px;
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
            position: relative;
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
            text-align: left;
        }

        th {
            background-color: rgb(18, 75, 135);
            color: white;
            font-size: 13px;
        }

        td{
            text-align: center;
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
    <div class="header d-flex justify-content-center">
        <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';" >
    </div>
        <!-- Textarea dan Tombol Search -->
    <div class="content">
        <div class="container">
            <h1>Daftar Katalog Alat</h1>
            <div class="input-group">
                <form action="cari_katalog.php" method="get" class="form-container d-flex">
                    <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append">
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
                    $sql = "SELECT * FROM katalog_alat WHERE nama_alat LIKE ? OR kode_alat LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $searchTermLike = "%" . $searchTerm . "%";
                    $stmt->bind_param("ss", $searchTermLike, $searchTermLike);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Alat</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Stok Tetap</th>
                                    <th>Stok Tersedia</th>
                                    <th>Posisi Alat</th>
                                    <th>Gambar Alat</th>
                                    <th>Aksi</th>
                                </tr>";
                        $no = 1;

                        while ($row = $result->fetch_assoc()) {
                            // Path gambar
                            $gambar_alat = "rentora/uploads/" . $row['gambar_alat'];

                            // Validasi keberadaan gambar
                            if (empty($row['gambar_alat']) || !file_exists($gambar_alat)) {
                                $gambar_alat = "rentora/uploads/default.jpg"; // Path default gambar
                            }

                            // URL gambar untuk dibuka di halaman baru
                            $gambar_url = $gambar_alat;

                            echo "<tr class='data-row'>
                                    <td>" . $no++ . "</td>
                                    <td>" . $row['kode_alat'] . "</td>
                                    <td>" . $row['nama_alat'] . "</td>
                                    <td>" . $row['jenis_alat'] . "</td>
                                    <td>" . $row['stok_tetap'] . "</td>
                                    <td>" . $row['jumlah_stok'] . "</td>
                                    <td>" . $row['posisi_alat'] . "</td>
                                    <td>
                                        <img src='" . $gambar_url . "' alt='Gambar Alat'>
                                    </td>
                                    <td>
                                        <a href='form_pinjam_user.php?kode_alat=". $row['kode_alat']. "'>
                                            <button class='btn btn-primary btn-sm'>
                                                <i class='bi bi-hand-index-thumb-fill'></i>
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

    <script>
    $(document).ready(function(){
        $('.pilih-alat').click(function(){
            var kode_alat = $(this).data('kode');
            
            $.ajax({
                url: 'get_catalog.php',
                type: 'GET',
                data: { kode_alat: kode_alat },
                success: function(response){
                    var data = JSON.parse(response);
                    $('#kode_alat').html('<option value="'+kode_alat+'" selected>'+kode_alat+'</option>');
                    $('#nama_alat').val(data.nama_alat);
                },
                error: function(){
                    alert("Gagal mengambil data alat");
                }
            });
        });
    });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
