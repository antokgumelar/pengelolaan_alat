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

        .content {
            flex: 1;
            flex-grow: 1;
            padding: 20px;
        }

        .header{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: auto;
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
            flex-wrap: wrap;
            gap: 20px; /* Jarak antar shape */
        }

        .rounded-square {
            width: 50%;
            background-color: #C1D4F5;
            border: 3px solid rgb(18, 75, 135);
            border-radius: 15px; /* Sudut membulat */
            text-align: center;
            color:rgb(18, 75, 135);
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-size: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            font-size: 50px;
        }

        .rounded-square:hover{
            background-color:rgb(18, 75, 135);
            color: white;
        }

        .group-button{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            justify-content: center;
            position: relative;
            gap: 5px;
            margin-top: 20px;
        }

        h3{
            font-size: 20px;
        }


        h1{
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .image-container{
            display: flex;
            justify-content: center;
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
    </style>
</head>
<body>
    <div class="header d-flex justify-content-center">
        <!-- <a href="home_user.php"> -->
            <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';">
            <img src="lrs.png" alt="logo-lrs" style="width:auto">
        <!-- </a> -->
    </div>
    <div class="content">
    <h1 class="align-text: center;">Dashboard</h1>
        <div class="image-container">
            <img src="homeuser-remove.png" alt="Contoh Gambar" class="responsive-image">
        </div>
        

        <div class="container">
            <div class="group-button d-flex justify-content-center align-items-center">
                <div class="rounded-square" onclick="window.open('cari_katalog_user.php','_blank');">
                    <i class="bi bi-journals"></i>                
                    <h3 class="text-center" style="font-weight:bold;">Katalog</h3>
                </div>
                <div class="rounded-square" onclick="window.open('form_batal_user.php','_blank');">
                    <i class="bi bi-file-earmark-minus"></i>
                    <h3 class="text-center" style="font-weight:bold;">Ajukan Pembatalan</h3>
                </div>
                
                <div class="rounded-square" onclick="window.open('cek_status_user.php', '_blank');">
                    <i class="bi bi-clock-history"></i>
                    <h3 class="text-center" style="font-weight:bold;">Status Peminjaman</h3>
                </div>
                <div class="rounded-square" onclick="window.open('pusat_bantuan_user.php', '_blank');">
                    <i class="bi bi-patch-question"></i>
                    <h3 class="text-center" style="font-weight:bold;">Pusat Bantuan</h3>
                </div>
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