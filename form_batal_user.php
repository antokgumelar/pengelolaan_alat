<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajukan Pembatalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
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
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Jarak antar shape */
        }

        .form-container {
            position: relative;
            padding-bottom: 100px;
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            justify-content: center;
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
    <div class="header d-flex justify-content-center">
        <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';" >
    </div>
    
    <div class="content">
    <div class="container">

    <div class="form-container">
    <!-- welcome page -->
    <h2>Formulir Pembatalan Peminjaman</h2>
        <form method="POST" action="batal_input_user.php" enctype="multipart/form-data">
            <div class="mb-3">
            
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" placeholder="ID Pinjaman" required autocomplete="off">
                    <label for="id_pinjam">ID Peminjaman</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal Peminjaman" readonly required autocomplete="off">
                    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Pengembalian" readonly required autocomplete="off">
                    <label for="tanggal_kembali">Tanggal Pengembalian</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nik_pegawai" name="nik_pegawai" placeholder="Nomor Induk Karyawan" readonly required autocomplete="off">
                    <label for="nik_pegawai">Nomor Induk Karyawan</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Peminjam" readonly required autocomplete="off">
                    <label for="nama_pegawai">Nama Peminjam</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="no_wa_pegawai" name="no_wa_pegawai" placeholder="Nomor Whatsapp Peminjam" readonly required autocomplete="off">
                    <label for="no_wa_pegawai">Nomor Whatsapp Peminjam</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" placeholder="Nama Proyek" required autocomplete="off">
                    <label for="nama_proyek">Nama Proyek</label>
                </div>

                <div class="form-floating mb-2">
                        <input class="form-control" id="kode_alat" name="kode_alat" placeholder="Kode Alat" readonly required autocomplete="off">
                        <label for="kode_alat">Kode Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Alat" readonly required autocomplete="off">
                    <label for="nama_alat">Nama Alat</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty" readonly required autocomplete="off">
                    <label for="qty">Qty</label>
                </div>

                <div class="form-floating mb-5">
                    <select class="form-control" id="status_peminjaman" name="status_peminjaman" disabled>
                        <option value="" disabled selected>Pilih Status Peminjaman</option>
                        <option value="Dibatalkan" selected>Dibatalkan</option>
                    </select>
                        <label for="status_peminjaman">Status Peminjaman</label>
                    <input type="hidden" id="status_peminjaman" name="status_peminjaman" value="Dibatalkan">
                </div>
                
                <br>
                <div class="d-grid gap-3">
                    <button class="btn btn-primary" type="submit">Konfirmasi Pembatalan</button>
                    <button class="btn btn-secondary" type="reset">Reset Peminjaman</button>
                    <button class="btn btn-danger" type="button" onclick="window.location.href='home_user.php'">Batalkan Peminjaman</button>
                </div>
            </div>
        </form>
    </div>

    </div>
    </div>

    <script>

        // Fetch data untuk dropdown dari server
        function fetchPinjamDataById(idPinjam) {
            fetch('dropdown_batal_input.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        const item = data.data.find(entry => entry.id_pinjam === idPinjam);
                       if (item) {
                    // Isi form dengan data yang ditemukan
                    document.getElementById('tanggal_pinjam').value = item.tanggal_pinjam || '';
                    document.getElementById('tanggal_kembali').value = item.tanggal_kembali || '';
                    document.getElementById('nik_pegawai').value = item.nik_pegawai || '';
                    document.getElementById('nama_pegawai').value = item.nama_pegawai || '';
                    document.getElementById('no_wa_pegawai').value = item.no_wa_pegawai || '';
                    document.getElementById('nama_proyek').value = item.nama_proyek || '';
                    document.getElementById('kode_alat').value = item.kode_alat || '';
                    document.getElementById('nama_alat').value = item.nama_alat || '';
                    document.getElementById('qty').value = item.qty || '';
                } else {
                    alert("ID Peminjaman tidak ditemukan.");
                    clearFormFields();
                }
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            alert("Gagal memuat data: " + error.message);
        });
        }

        // Fungsi untuk membersihkan form jika ID tidak ditemukan
        function clearFormFields() {
            document.getElementById('tanggal_pinjam').value = '';
            document.getElementById('tanggal_kembali').value = '';
            document.getElementById('nik_pegawai').value = '';
            document.getElementById('nama_pegawai').value = '';
            document.getElementById('no_wa_pegawai').value = '';
            document.getElementById('nama_proyek').value = '';
            document.getElementById('kode_alat').value = '';
            document.getElementById('nama_alat').value = '';
            document.getElementById('qty').value = '';
        }

        // Jalankan semua fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            const inputField = document.getElementById('id_pinjam');
            
            // Fetch saat input selesai diketik atau keluar dari input
            inputField.addEventListener('blur', function () {
                const idPinjam = inputField.value.trim();
                if (idPinjam) {
                    fetchPinjamDataById(idPinjam);
                } else {
                    clearFormFields();
                }
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>