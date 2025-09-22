<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Peminjaman Alat</title>
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

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 40px;
            flex: 1;
        }

        .header-logo{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
        }

        .content-body{
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            height: 400px;
            border-radius: 20px;
            padding: 10px;
            margin: auto;
            /* display: flex; */
            justify-content: center;
        }

        .header{
            margin-top: 30px;
        }

        .form-container{
            width: 600px;
            height: 50px;
        }

        .form-label{
            white-space: nowrap;
        }

        button{
            height: 40px;
            width: 200px;
            position: relative;
        }

        .input-group{
            padding: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .table-container{
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            overflow-x: auto;
            overflow-y: auto;
        }

        th{
            font-size: 14px;
            background-color: rgb(18, 75, 135);
            color: white;
            border: 1px solid black;
            padding: 11px;
        }
        
        td{
            font-size: 14px;
            text-align: center;
            border: 1px solid black;

        }
        
    </style>
</head>
<body>
    <div class="header-logo d-flex justify-content-center">
        <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';" >
    </div>
    <div class="container header">
        <h4 class="align-items-center justify-content-center d-flex" style="font-weight: bold;">Cek Status Peminjaman Alat</h4>
    </div>
    
<div class="container">
    <div class="content">
    <div class="content-body">
        <div class="container">
            <div class="input-group" style="padding: 30px;">
                <form action="cek_status_user.php" method="get" class="form-container d-flex align-items-center gap-2">
                    <label for="exampleFormControlInput1" class="form-label mb-0" style="font-size: 15px; font-weight: bold;">Nama Peminjam</label>
                    <input type="text" class="form-control" name="search_name" placeholder="Masukkan Nama Peminjam" style="max-width: 250px;" value="<?php echo isset($_GET['search_name']) ? $_GET['search_name'] : ''; ?>">
                    <button type="submit" class="btn btn-outline-primary" style="font-size: 10px; font-weight: bold;">Cek Status Peminjaman</button>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="table-container gap-2">
            <?php

                if (isset($_GET['search_name']) && !empty(trim($_GET['search_name']))){
                    $conn = new mysqli('localhost', 'root', '', 'gudang_alat');

                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                if (isset($_GET['search_name']) && !empty(trim($_GET['search_name']))){
                    
                }

                $searchTerm = $_GET['search_name'];

                $sql = "SELECT * FROM pinjam_alat
                        WHERE nama_pegawai LIKE ? OR id_pinjam LIKE ?
                        ORDER BY tanggal_pinjam DESC";

                $stmt = $conn->prepare($sql);
                $searchTermLike = "%" . $searchTerm . "%";
                $stmt->bind_param("ss", $searchTermLike, $searchTermLike);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0){
                    echo "<table border = '1'>
                        <tr>
                            <th>No.</th>
                            <th>ID Peminjaman</th>
                            <th>Tgl Peminjaman</th>
                            <th>Tgl Pengembalian</th>
                            <th>Nama Peminjam</th>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>Qty</th>
                            <th>Status Peminjaman</th>
                        </tr>";
                    $no = 1;

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='data-row'>
                                <td>" . $no++ . " </td>
                                <td>" . $row['id_pinjam']. "</td>
                                <td>" . $row['tanggal_pinjam']. "</td>
                                <td>" . $row['tanggal_kembali']. "</td>
                                <td>" . $row['nama_pegawai']. "</td>
                                <td>" . $row['kode_alat']. "</td>
                                <td>" . $row['nama_alat']. "</td>
                                <td>" . $row['qty']. " </td>
                                <td>" . $row['status_peminjaman']. "</td>
                            </tr>";
                    }
                    echo "</table>";
                } else{
                    echo "Tidak ada data.";
                }

                $stmt->close();
                $conn->close();
                }
            ?>
            </div>

        </div>
    </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>