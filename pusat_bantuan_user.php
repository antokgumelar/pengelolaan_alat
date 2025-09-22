<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Bantuan</title>
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

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px; /* Jarak antar shape */
        }

        .header-logo{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
        }

        .header{
            margin-top: 30px;
        }

        .konten{
            font-size: 30px;
            color: white;
            display: flex;
            flex-wrap: column;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            margin-top: 180px;
        }

        h2{
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color:white;
        }
        
    </style>
</head>
<body>
    <div class="header-logo d-flex justify-content-center">
        <img src="logo-edit.png" alt="logo-rentora" style="width:auto;" onclick="window.location.href='home_user.php';" >
    </div>
    <div class="container">
        <div class="content">
        <h2>Pusat Bantuan</h2>
            <div class="konten">
                <a style="text-decoration: none;"href="https://wa.me/+6282191343935">
                    <i class="bi bi-whatsapp"></i> 082191343935
                </a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>