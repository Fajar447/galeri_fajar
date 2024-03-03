<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login');
        location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gallery Foto</title>
    <link rel="icon" href="../icon/5.jpg" type="image/jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
        color: red;
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand mt-1 a" href="index.php"><b>Website Gallery Foto</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                <a href="../admin/index.php" class="m-2 a">Beranda</a>
                    <a href="home.php" class="m-2 a">Home</a>
                    <a href="album.php" class="m-2 a">Album</a>
                    <a href="foto.php" class="m-2 a">Foto</a>
                </div>
                <a href="../config/proses_logout.php" class="btn btn-outline-danger m-1 text-white">Logout</a>
            </div>
        </div>
    </nav>
</header>
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/tambah_foto.php" method="post" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsifoto" class="form-control" required></textarea>
                            <label class="form-label">Album</label>
                            <select name="albumid" class="form-control" required>
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql_album = mysqli_query($conn, "select * from album where userid='$userid'");
                                while ($data_album = mysqli_fetch_array($sql_album)) {
                                ?>
                                    <option value="<?php echo $data_album['albumid'] ?>">
                                        <?php echo $data_album['namaalbum'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>
                            <button type="submit" class="btn btn-outline-primary mt-2 text-dark" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Gallery Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($conn, "select * from foto where userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>

                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" alt="" width="100"></td>
                                        <td>
                                            <?php echo $data['judulfoto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['deskripsifoto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['tanggalunggah'] ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                            <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/tambah_foto.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsifoto" class="form-control" required><?php echo $data['deskripsifoto'] ?></textarea>

                                                                <label class="form-label">Album</label>
                                                                <select name="albumid" class="form-control">
                                                                    <?php
                                                                    $userid = $_SESSION['userid'];
                                                                    $sql_album = mysqli_query($conn, "select * from album where userid='$userid'");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) {
                                                                    ?>
                                                                        <option <?php if ($data_album['albumid'] ==  $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>">
                                                                            <?php echo $data_album['namaalbum'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label class="form-label">Foto</label>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" alt="" width="100">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label class="form-label">Ganti File</label>
                                                                        <input type="file" class="form-control" name="lokasifile">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-warning">Edit
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                                            <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/tambah_foto.php" method="POST">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                Apakah anda yakin akan menghapus data <strong><?php $data['judulfoto'] ?></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <footer class="d-flex justify-content-center border-top mt-3 footer fixed-bottom">
        <b><p>&copy; UKK RPL 2024 | Fajar </p></b>
    </footer>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>