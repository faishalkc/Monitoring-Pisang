<?php include "session.php"?>
<?php
    include "koneksi.php";
    $ambil = $koneksi->query("SELECT * FROM data WHERE id='$_GET[np]'");
    $edit = $ambil->fetch_assoc();
?>
<div class="panel panel-success">
    <div class="panel-heading">Ubah Data</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>Gas (ppm)</label>
                <input type="number" name="gas" class="form-control" value="<?php echo $edit["gas"]?>">
            </div>
            <div class="form-grup">
                <label>Suhu Lingkungan (°C)</label>
                <input type="number" name="suhu_lingkungan" class="form-control" value="<?php echo $edit["suhu_lingkungan"]?>">
            </div>
            <div class="form-grup">
                <label>Warna Buah</label>
                <select class="form-control" name="warna_buah_id">
                <option disabled selected>Pilih Warna Buah</option>
                    <?php
                        $opsi_warna = mysqli_query($koneksi, "SELECT * FROM warna_buah");
                        while ($row = mysqli_fetch_row($opsi_warna)) {
                            echo "<option value=", "'", $row[0], "'";
                            if ($edit['warna_buah_id']==$row[0]) echo ' selected';
                            echo ">";
                            echo $row[0], " - ", $row[1];
                            echo "</option>";
                        }
                    ?>
                </select>
            </div>
            <div style="margin-top:15px;">
                <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                <button class="btn btn-warning" type="submit" name="reset">Reset</button>
                <a href="index.php?halaman=data" class="btn btn-success">Lihat Data Buah</a>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_POST["save"])) {
        if ($_POST["gas"] <= "90") {
            $kelayakan = "1";
        }
        elseif ($_POST["gas"] > "90") {
            $kelayakan = "0";
        }
        else {
            $kelayakan = "";
        }
        $koneksi->query("UPDATE data SET gas='$_POST[gas]' WHERE id='$_GET[np]'");
        $koneksi->query("UPDATE data SET suhu_lingkungan='$_POST[suhu_lingkungan]' WHERE id='$_GET[np]'");
        $koneksi->query("UPDATE data SET warna_buah_id='$_POST[warna_buah_id]' WHERE id='$_GET[np]'");
        $koneksi->query("UPDATE data SET kelayakan='$kelayakan' WHERE id='$_GET[np]'");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=data'</script>";
    }
?>