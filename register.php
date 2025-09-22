<?php
        session_start(); // Mulai session

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $databaseHost = 'localhost';
        $databaseName = 'gudang_alat';
        $databaseUsername = 'root';
        $databasePassword = '';

        try {
            $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName;charset=utf8", $databaseUsername, $databasePassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $email = filter_input(INPUT_POST, 'email_akun', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password_akun'] ?? '';

            if (empty($email) || empty($password)) {
                echo json_encode(['error' => 'Email dan Password harus diisi']);
                exit;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Simpan ke database
            $stmt = $pdo->prepare('INSERT INTO user_akun (email_akun, password_akun) VALUES (:email_akun, :password_akun)');
            $stmt->execute([
                'email_akun' => $email,
                'password_akun' => $hashedPassword
            ]);

            echo json_encode(['message' => 'Registrasi Berhasil']);

            header("Location: login.php");
            exit;
        }
    ?>
    
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
            background: #C1D4F5;
        }

        .prisma {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
            filter: blur(30px);
            z-index: 1;
            animation: rotate 10s infinite linear;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin: 0 0 20px;
            font-weight:bold;
            text-align:center;
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
    </style>
</head>
  <body>
        <div class="image-container">
            <img src="background.png" alt="Contoh Gambar" class="responsive-image">
        </div>
        <div class="login-container">
            <!-- welcome page -->
            <h2>Daftar Akun</h2>
            <form method="POST" action="">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email_akun" placeholder="Username" required>
                        <label for="email_akun">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password_akun" placeholder="Password" required>
                        <label for="password_akun">Password</label>
                        <span id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                <button type="submit" name="register">Register</button>
            </form>

            <script>
                document.getElementById('togglePassword').addEventListener('click', function () {
                    const passwordField = document.getElementById('password_akun');
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