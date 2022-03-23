<?php
session_start();
include '../function.php';

if (empty($_SESSION["onusername"]) ) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu!');
          document.location.href='index.php';</script>";
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel - Edit Data Admin</title>

    <?php include '../partial/head.php'?>
</head>
<body>

<div id="wrapper">

    <?php include '../partial/nav.php'?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Admin</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Admin
                        </div>
                        <form method="post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" placeholder="Nama Anda" autocomplete="off" value="<?= $hasil['nama']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="email" placeholder="E-mail aktif" value="<?= $hasil['email']?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Username Baru</label>
                                            <input class="form-control" type="text" name="username" placeholder="Username Baru" value="<?= $hasil['username']?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-default" name="ubah">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ganti Password
                        </div>
                        <form method="post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="id" value="<?= $id?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Lama</label>
                                            <input class="form-control" type="text" name="passlama" placeholder="Password Lama Anda" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input class="form-control" type="text" name="passbaru" placeholder="Password Baru" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Konfirmasi Password Baru</label>
                                            <input class="form-control" type="text" name="konfirmpass" placeholder="Konfirmasi Password Baru" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-default" name="ubahpass">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="../assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../assets/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../assets/js/startmin.js"></script>

</body>
</html>