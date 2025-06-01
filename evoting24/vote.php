<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nisn'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil NISN pengguna yang sedang login
$nisn = $_SESSION['nisn'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Ketua OSIS</title>
    <link rel="stylesheet" href="vote.css"> 
</head>
<body>

<!-- <?php echo $_SESSION['nama']; ?> | <?php echo $_SESSION['nisn']; ?> -->
 
    <form action="vote.php" method="POST">
        <div class="container">
            <div class="candidates">
                <div class="candidate">
                <div class="candidatess">
                    <img src="assets/img/keiju.png" alt="Candidate 1" class="imgkei">
                    <button name="visi1">VISI MISI</button>
                    <button type="submit" name="candidate_1" value="1" data-alert="Anda Memilih Fauzan Dan Juanda, Klik Ok untuk melanjutkan">VOTE</button>
                </div>
                </div>
                <div class="candidate">
                <div class="candidatess">
                    <img src="assets/img/ekal.png" alt="Candidate 2">
                    <button name="visi2">VISI MISI</button>
                    <button type="submit" name="candidate_2" value="2" data-alert="Anda Memilih Haekal Dan Meshua, Klik Ok untuk melanjutkan">VOTE</button>
                </div>
                </div>
                <div class="candidate">
                <div class="candidatess">
                    <img src="assets/img/her.png" alt="Candidate 3">
                    <div class="candidatekkk">
                    <button name="visi3">VISI MISI</button>
                    <button type="submit" name="candidate_3" value="3" data-alert="Anda Memilih Malfin Dan Awal, Klik Ok untuk melanjutkan">VOTE</button>
                </div>
                </div>
                </div>
                <div class="nisn">
                    <input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn']; ?>">
                </div>
            </div>
        </div>
    </form>
</body>
<script src="assets/sweetalert/sweetalert2.all.min.js"></script>
<!-- <script>
    // Pilih semua tombol yang memiliki atribut data-alert
    document.querySelectorAll('button[name="vote"]').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const alertMessage = this.getAttribute('data-alert');

        Swal.fire({
            title: "Anda Sudah Yakin?",
            text: alertMessage,
            icon: "info",
            showCancelButton: true,
            cancelButtonText: "Back",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ok"
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit(); // Submit form jika user klik "Ok"
            }
        });
    });
});

</script> -->
</html>

<script src="assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

// kaniddat 1
if (isset($_POST['candidate_1'])) {
    // Ambil data kandidat yang dipilih
    $candidate_1 = $_POST['candidate_1'];

    // Validasi input kandidat
    if ($candidate_1 == '1') {
        echo "
        <script>
            Swal.fire({
                title: 'Anda Sudah Yakin?',
                text: 'Anda Akan Memilih Candidate 1',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim data ke server menggunakan AJAX
                    $.ajax({
                        url: 'votep.php', // File PHP untuk menyimpan vote ke database
                        type: 'POST',
                        data: {
                            candidate_1: '$candidate_1',
                            nisn: '$nisn'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Anda Vote Candidate 1!',
                                text: 'Suara Anda telah disimpan.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.href = 'login.php'; // Redirect setelah vote berhasil
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat memasukkan vote.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi'
                            });
                        }
                    });
                } else {
                    // Tidak ada aksi jika pengguna klik cancel
                }
            });
        </script>";
    } else {
        echo "Kandidat tidak valid.";
    }
}
        // kandidat 2
        if (isset($_POST['candidate_2'])) {
            // Ambil data kandidat yang dipilih
            $candidate_2 = $_POST['candidate_2'];
        
            // Validasi input kandidat
            if ($candidate_2 == '2') {
                echo "
                <script>
                    Swal.fire({
                        title: 'Anda Sudah Yakin?',
                        text: 'Anda Akan Memilih Candidate 2',
                        icon: 'info',
                        showCancelButton: true,
                        cancelButtonText: 'Kembali',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim data ke server menggunakan AJAX
                            $.ajax({
                                url: 'votep.php', // File PHP untuk menyimpan vote ke database
                                type: 'POST',
                                data: {
                                    candidate_2: '$candidate_2',
                                    nisn: '$nisn'
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Anda Vote Candidate 2!',
                                        text: 'Suara Anda telah disimpan.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        window.location.href = 'login.php'; // Redirect setelah vote berhasil
                                    });
                                },
                                error: function() {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat memasukkan vote.',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi'
                                    });
                                }
                            });
                        } else {
                            // Tidak ada aksi jika pengguna klik cancel
                        }
                    });
                </script>";
            } else {
                echo "Kandidat tidak valid.";
            }
        }
        // kandidat 3
        if (isset($_POST['candidate_3'])) {
            // Ambil data kandidat yang dipilih
            $candidate_3 = $_POST['candidate_3'];
        
            // Validasi input kandidat
            if ($candidate_3 == '3') {
                echo "
                <script>
                    Swal.fire({
                        title: 'Anda Sudah Yakin?',
                        text: 'Anda Akan Memilih Candidate 3',
                        icon: 'info',
                        showCancelButton: true,
                        cancelButtonText: 'Kembali',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim data ke server menggunakan AJAX
                            $.ajax({
                                url: 'votep.php', // File PHP untuk menyimpan vote ke database
                                type: 'POST',
                                data: {
                                    candidate_3: '$candidate_3',
                                    nisn: '$nisn'
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Anda Vote Candidate 3!',
                                        text: 'Suara Anda telah disimpan.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        window.location.href = 'login.php'; // Redirect setelah vote berhasil
                                    });
                                },
                                error: function() {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat memasukkan vote.',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi'
                                    });
                                }
                            });
                        } else {
                            // Tidak ada aksi jika pengguna klik cancel
                        }
                    });
                </script>";
            } else {
                echo "Kandidat tidak valid.";
            }
        }

// visimisi
if (isset($_POST['visi1'])){
    header("location: visimisi/visi1.php");
    exit();
}
if (isset($_POST['visi2'])){
    header("location: visimisi/visi2.php");
    exit();
}
if (isset($_POST['visi3'])){
    header("location: visimisi/visi3.php");
    exit();
}

?>