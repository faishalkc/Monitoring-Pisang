<?php include "session.php"?>
<?php
    include "koneksi.php";
    $koneksi->query("DELETE FROM data where id='$_GET[np]'");
    echo "<script>location='index.php?halaman=data'</script>";
?>