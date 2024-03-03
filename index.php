<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gallery Foto</title>
    <link rel="icon" href="icon/5.jpg" type="image/jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    a {
        text-decoration: none;
        color: white;
        font-family: 'Times New Roman', Times, serif;
        font-size: large;
    }
    .a:hover{
        color: darkgoldenrod;
    }

    i {
        color: black;
    }

    header {
    background-color: black;
    color: #fff;
    
    }
    .container {
        width: 80%;
        margin: 0 auto;
    }

    .container:after {
        content: '';
        display: block;
        clear: both;
    }

    .section {
        padding: 25px 0;
    }

    .box {
        background-color: #fff;
        border: 1px solid black;
        padding: 15px;
        box-sizing: border-box;
        margin: 10px 0 25px 0;
    }

    .box:after {
        content: '';
        display: block;
        clear: both;
    }
    footer {
       background-color: black;
       color: white; 
    }
    i {
        position: relative;
        justify-content: center;
       
    }
</style>

<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand a " href="index.php"><b class="b">Website Gallery Foto</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">

                </div>
                <a href="register.php" class="btn btn-outline-warning m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-warning m-1">Login</a>
            </div>
        </div>
    </nav>
    </header>
    
    <br><br>
    <div class="section">
        <div class="container">
            <div class="box">
                <h4>Selamat Datang di Website gallery Foto </h4>
                <p class="fs-5">
                    selamat datang di website gallery foto dan selamat anda melihat foto-foto bagus.
                    kalo anda ingin menambahkan foto silahkan melakukan registrasi terleih dahulu. 
                </p>
            </div>
        </div>
    </div>
    <center>
        <img src="Icon/1.png" width="150px"  height="150px" class="align-items-center" style="margin-bottom:5px;" />
        <img src="Icon/2.png" width="100px" height="100px" class="align-items-center" style="margin-bottom:5px;" />
</center>
    <br><br>

    <footer class="d-flex justify-content-center border-top mt-3 footer fixed-bottom">
        <b><p>&copy; UKK RPL 2024 | Fajar </p></b>
    </footer>

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>