<?php
require_once("../koneksi.php");

if (isset($_POST["addUser"])) {

    $inpNisn = $_POST['nisn'];
    $inpNamaLengkap = $_POST['nama_lengkap'];
    $inpKelas = $_POST['kelas'];

    $sqlAddUser = "INSERT INTO users (nisn, nama_lengkap, kelas)VALUES('$inpNisn', '$inpNamaLengkap', '$inpKelas')";
    $queryAddUser = mysqli_query($conn, $sqlAddUser);

    header('Location: users.php');
}

if (isset($_POST['deleteUser'])) {

    $id = $_POST['id'];

    $sqlDeleteUser = "DELETE FROM users WHERE id='$id'";
    $queryDeleteUser = mysqli_query($conn, $sqlDeleteUser);
    if ($queryDeleteUser) {
        header('users.php');
    }
    // echo "<script>alert('$id')</script>";
}



?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Voting 2024 | Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require('sideBar.php');  ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Users</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Users</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm text-left" style="margin-right: 10px;">
                                            <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div> -->

                                            <input-group class="">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-user">
                                                    Tambah
                                                </button>
                                                <div class="modal fade" id="modal-add-user">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-white">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <!-- SELECT2 EXAMPLE -->
                                                                <!-- general form elements -->
                                                                <div class="card card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Tambah User</h3>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <!-- form start -->
                                                                    <form action="" method="post">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="nisn">NISN</label>
                                                                                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="-">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="-">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kelas">Kelas</label>
                                                                                <input type="kelas" class="form-control" name="kelas" id="kelas" placeholder="-">
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                        <div class="card-footer text-right">
                                                                            <input type="submit" name="addUser" class="btn btn-primary"></input>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.card -->
                                                                <!-- /.card -->



                                                            </div>
                                                            <!-- <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-outline-light">Save changes</button>
                                                            </div> -->
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </input-group>

                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover text-center" id="example2">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NISN</th>
                                                <th>Nama Lengkap</th>
                                                <th>Kelas</th>
                                                <th>Token</th>
                                                <th>Voted</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sqlViewUsers = "SELECT * FROM users";
                                            $queryViewUsers = mysqli_query($conn, $sqlViewUsers);

                                            function editUsers()
                                            {
                                                echo "<script>alert('Helo')</script>";
                                            }

                                            while ($data = mysqli_fetch_array($queryViewUsers)) {

                                            ?>

                                                <tr>
                                                    <td><?php echo $data['id'] ?></td>
                                                    <td><?php echo $data['nisn'] ?></td>
                                                    <td><?php echo $data['nama_lengkap'] ?></td>
                                                    <td><?php echo $data['kelas'] ?></td>
                                                    <td><?php echo $data['token'] ?></td>
                                                    <td><?php echo $data['voted'] ?></td>
                                                    <td>
                                                        <div class="row justify-content-center">
                                                            <form action="editUser.php" method="get">
                                                                <input class="btn btn-sm btn-warning mr-1" type="submit" name="editUser" value="Edit">
                                                                <input type="text" hidden name="id" value="<?php echo $data['id'];  ?>">
                                                            </form>
                                                            <form action="" method="post">
                                                                <input class="btn btn-sm btn-danger" type="submit" name="deleteUser" value="Hapus">
                                                                <input type="text" hidden name="id" value="<?php echo $data['id'];  ?>">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022-2024 <a href="">IT Community</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>