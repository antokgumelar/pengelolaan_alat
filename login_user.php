<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rentora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: rgba(255, 255, 255, 0.8);
        }

        .login-container {
            position: relative;
            z-index: 2;
            background: #C1D4F5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin: 0 0 20px;
            font-weight:bold;
            text-align:center;
            color: white;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #6a11cb;
        }

        form{
            width:500px;
        }

        #togglePassword{
            position: absolute; 
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer;
        }

        .register{
            color: white;
            text-decoration: none;

        }
    </style>
</head>
  <body>
        <div class="image-container">
            <img src="background.png" alt="Contoh Gambar" class="responsive-image">
        </div>
        <div class="login-container">
            <!-- welcome page -->
            <h2>Selamat Datang</h2>
            <form id="login_userForm" method="POST" action="login_user_check.php">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email_akun_pengguna" name="email_akun_pengguna" placeholder="Username" required>
                        <label for="email_akun_pengguna">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_akun_pengguna" name="password_akun_pengguna" placeholder="Password" required>
                        <label for="password_akun_pengguna">Password</label>
                        <span id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                <button type="submit">Masuk</button>
                <p></p>
                <button onclick="window.location.href='register_user.php'"type="button"> 
                    Tidak Memiliki Akun?
                </button>
            </form>

            <script>
                // Tambahkan event listener untuk menangani login
                document.getElementById('login_userForm').addEventListener('submit', async function (e) {
                    e.preventDefault(); // Mencegah pengiriman form secara default

                    const formData = new FormData(this);

                    // Kirim data ke server menggunakan fetch
                    const response = await fetch('login_user_check.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.error) {
                        // Tampilkan modal error jika ada kesalahan
                        alert(result.error);
                    } else {
                        // Redirect ke halaman home jika login berhasil
                        alert("Login Berhasil")
                        window.location.href = 'home.php';
                    }
                });

                document.getElementById('togglePassword').addEventListener('click', function () {
                    const passwordField = document.getElementById('password_akun_pengguna');
                    const icon = this.querySelector('i'); // Menangkap ikon yang ada di dalam <span>
                    
                    // Mengubah tipe input password antara 'password' dan 'text'
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);

                    // Ganti ikon mata
                    if (type === 'password') {
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    } else {
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    }
                });
            </script>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>