<?php
session_start();
include 'koneksi.php';

// kandidat 1
if (isset($_POST['candidate_1'])) {
    $candidate_1 = $_POST['candidate_1'];
    $nisn = $_SESSION['nisn'];

    //update
    $query = "UPDATE users SET voted = '$candidate_1' WHERE nisn = $nisn";

    if (mysqli_query($conn, $query)) {
        session_unset();
        session_destroy();
        echo "success";
    } else {
        echo "error";
    }
}
// kandidat 2
if (isset($_POST['candidate_2'])) {
    $candidate_2 = $_POST['candidate_2'];
    $nisn = $_SESSION['nisn'];

    $query = "UPDATE users SET voted = '$candidate_2' WHERE nisn = $nisn";

    if (mysqli_query($conn, $query)) {
        session_unset();
        session_destroy();
        echo "success";
    } else {
        echo "error";
    }
}

// kandidat 3
if (isset($_POST['candidate_3'])) {
    $candidate_3 = $_POST['candidate_3'];
    $nisn = $_SESSION['nisn'];

    $query = "UPDATE users SET voted = '$candidate_3' WHERE nisn = $nisn";

    if (mysqli_query($conn, $query)) {
        session_unset();
        session_destroy();
        echo "success";
    } else {
        echo "error";
    }
}
?>