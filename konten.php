<?php
    if (isset($_GET['halaman'])) {
        if ($_GET['halaman']=='home') {
            include "halaman/home.php";
        }
        elseif ($_GET['halaman']=='data') {
            include "halaman/data.php";
        }
        elseif ($_GET['halaman']=='data_tambah') {
            include "halaman/data_tambah.php";
        }
        elseif ($_GET['halaman']=='data_hapus') {
            include "halaman/data_hapus.php";
        }
        elseif ($_GET['halaman']=='data_ubah') {
            include "halaman/data_ubah.php";
        }
        elseif ($_GET['halaman']=='grafik') {
            include "halaman/grafik.php";
        }
        elseif ($_GET['halaman']=='akun') {
            include "halaman/akun.php";
        }
        elseif ($_GET['halaman']=='akun_tambah') {
            include "halaman/akun_tambah.php";
        }
        elseif ($_GET['halaman']=='akun_hapus') {
            include "halaman/akun_hapus.php";
        }
        elseif ($_GET['halaman']=='logout') {
            include "logout.php";
        }
        else{
            echo "Halaman Tidak Ditemukan";
        }
    }
    else{
        include "halaman/home.php";
    }
?>