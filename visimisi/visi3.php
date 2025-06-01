<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: url('../assets/img/visimisi3.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .visi{
            position: relative;
            margin-right: 600px;
            font-family: arial;
        }
        .visi .n{
            position: relative;
            width: 350px;
            font-size: 15px;
        }
        .misi{
            position: absolute;
            margin-left: 600px;
            font-family: arial;
            
        }
        .misi ul{
            padding: 0;
            margin: 0;
            
        }
        .nisi li{
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .misi .list{
            width: 400px;
            text-align: left;
        }
        h1{
            font-size: 50px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .visi p{
            text-align: left;
        }
        .visimisi{
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 140px;
            gap: 400px;
            color: white;
        }
        .backbtn{
            text-align: center;
            margin-top: 250px;
            margin-left: 580px;
        }
        .backbtn button{
            font-family: 'Franklin Gothic Heavy', sans-serif;
            display: block;
            width: 100px;
            margin: 10px 0;
            padding: 10px;
            background-color: #0149A9;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 1rem;
            outline: 1px solid white;
        }
    </style>
</head>
<body>
    <form action="visi3.php" method="POST">
        <div class="visimisi">
            <div class="visi">
                <h1>VISI</h1>
                <div class="n">
                    <p>Merealisasikan OSIS SMKN 5 Tangerang sebagai organisasi berintegritas baik guna memberikan manfaat yang berkesinambungan kepada sekolah</p>
                </div>
            </div>
            <div class="misi">
                <h1>MISI</h1>
                <div class="list">
                    <ul>
                        <li>Membuat suatu kegiatan positif di sekolah untuk menumbuhkan kreativitas, semangat, serta dapat menginspirasi siswa/i.</li>
                        <li>Mengoptimalkan fungsi media sosial sekolah.</li>
                        <li>Menjalankan program kerja adaptif sehingga kegiatan tersebut berjalan dengan optimal</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="backbtn">
            <button name="back">Kembali</button>
        </div>
        <div class="nisn">
            <input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn']; ?>">
        </div>
    </form>
</body>
</html>

<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['nisn'])) {
    header("Location: ../login.php"); // Redirect ke halaman login jika belum login
    exit();
}

$nisn = $_SESSION['nisn'];

if (isset($_POST['back'])){
    header("location: ../vote.php");
    exit();
}
?>