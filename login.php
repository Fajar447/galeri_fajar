<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="icon" href="icon/5.jpg" type="image/jpg">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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
</style>
<body>
  <header>
<nav class="navbar navbar-expand-lg  bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand a" href="index.php"><b>Website Gallery Foto</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        
      </div>
      <a href="register.php" class="btn btn-outline-warning m-1"> Daftar </a>
      <a href="login.php" class="btn btn-outline-warning m-1"> Masuk </a>
    </div>
  </div>
</nav>
  </header>   

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-transparent">
          <div class="text-center">
            <h5>Login Aplikasi</h5>
          </div>
          <form action="config/proses_login.php" method="post">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
            <div class="d-grid mt-2">
              <button class="btn btn-outline-primary text-dark" type="submit" name="kirim">Login</button>
            </div>
          </form>
          <hr>
          <p>Belum punya akun? <a href="register.php" class="text-dark"> Daftar disini </a></p>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="d-flex justify-content-center border-top mt-3 footer fixed-bottom">
    <b><p>&copy; UKK RPL 2024 | Fajar </p></b>
</footer>


<script type="text/javascript" src="assets/js/bootstrap.min.js">
</script>
</body>
</html>