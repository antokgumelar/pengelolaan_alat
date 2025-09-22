<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
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
        background:  #c3d0ee;
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

</style>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">  
  <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Katalog</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transaksi
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Peminjaman Alat</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i>Pengembalian Alat</a></li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Laporan
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
    

  </body>
</html>