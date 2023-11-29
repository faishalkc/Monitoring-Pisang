<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "smbd-app";
    $koneksi = mysqli_connect($host,$user,$pass,$db_name);

    mysqli_select_db($koneksi, "smbd-app") or die ("Gagal terhubung ke database");
?>