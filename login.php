<?php 
$serial =  shell_exec('wmic diskdrive get SerialNumber');
echo  $serial;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voting 2024 | SMKN 5 Tangerang</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- sweetalert -->
    <script src='sweetalert/sweetalert2.all.min.js'></script>
</head>

<style>
    body {
        background-image: url('assets/img/bgLogin.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
    }

    .container {
        display: flex;
        text-align: center;
        justify-content: end;
        margin-top: 400px;
        /* border: 1px solid orange; */
    }

    .parent-box {
        max-width: auto;
        /* border: 1px solid red; */
    /* padding-right: 80px; */
    }

    .tbby {
        font-family: arial;
        color: whitesmoke;
        text-align: start;
    }

    input {
        font-size: 1.3rem;
        /* margin-top: 8px; */
        border-radius: 7px;
        border: 0;
        height: 4.0rem;
        width: 26rem;
        text-align: center;
        font-family: arial;
        background-color: whitesmoke;
        font-weight: 600;
        text-transform: uppercase;
    }

    input:focus {
        border: none;
        outline: none;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }


    .bpass {
        margin-top: 12px;
    }

    .btnLogin {
        width: 100%;
        height: 4.0rem;
        margin-top: 20px;
        font-weight: 600;
        font-family: Arial;
        text-transform: uppercase;
        font-size: 20px;
    }
</style>

<body>
    <form action="login.php" method="POST">
        <div class="container">
            <div class="parent-box m-2 text-center">
                <!-- <div class="bby">
                    <p class="tbby m-0">Support By IT Community</p>
                </div> -->
                <div class="bnisn">
                    <input type="number" name="nisn" id="nisn" placeholder="NISN">
                </div>
                <div class="bpass">
                    <input type="text" name="token" id="token" placeholder="TOKEN">
                </div>
                <div class="blogin">
                    <button type="submit" name="submit" class="btn btnLogin btn-primary">Masuk</button>
                </div>
            </div>
        </div>
    </form>


    <!-- JS Bootstrap-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php

session_start();
include 'koneksi.php'; // Sambungkan ke database

if (isset($_POST['submit'])) {
    $nisn = htmlspecialchars($_POST['nisn']);
    $token = $_POST['token'];

    // Query ke database untuk cek pengguna
    $query = "SELECT * FROM users WHERE nisn = '$nisn' AND token = '$token'";
    $result = mysqli_query($conn, $query);
$resul = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['nisn'] = $nisn; // Simpan NISN ke session
        $_SESSION['nama'] = $resul['nama_lengkap']; // Simpan NAMA ke session
        header("Location: vote.php"); // Redirect ke halaman voting
        exit();
    } else {
        echo "
        <script src='assets/sweetalert/sweetalert2.all.min.js'></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'NISN atau Token salah!, Silahkan Coba Lagi',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>";
    }
}
?>
