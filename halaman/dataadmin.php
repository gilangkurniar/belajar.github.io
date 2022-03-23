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

    <title>Admin Panel - Data Admin</title>

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
                    <h1 class="page-header">Data Admin</h1>
                </div>
            </div>

            <?php if(isset($_GET['notif'])){ ?>
                <div class="alert alert-warning"><?= $_GET['notif']?></div>
            <?php } ?>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger"><?= $_GET['error']?></div>
            <?php } ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Admin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>E-mail</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;

                                    $sql = mysqli_query($koneksi,"SELECT * FROM user");
                                    while ($data = mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td align="center" width="5%"><?= $no?></td>
                                            <td><?= $data['nama']?></td>
                                            <td><?= $data['email']?></td>
                                            <td><?= $data['username']?></td>
                                            <td width="10%"><a class="btn btn-default" href="editadmin.php?id=<?=$data['iduser']?>"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-default" href="hapusadmin.php?id=<?=$data['iduser']?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Modal -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Data Admin</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" placeholder="Nama Anda" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="email" name="email" placeholder="E-mail aktif" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="nama" placeholder="Username Anda" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div> -->

<!-- jQuery -->
<script src="../assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../assets/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../assets/js/dataTables/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../assets/js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>
</html>