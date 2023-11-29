<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Tambah Data</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>Gas (ppm)</label>
                <input type="number" name="gas" class="form-control">
            </div>
            <div class="form-grup">
                <label>Suhu Lingkungan (°C)</label>
                <input type="number" name="suhu_lingkungan" class="form-control">
            </div>
            <div class="form-grup">
                <label>Warna Buah</label>
                <select class="form-control" name="warna_buah_id">
                <option disabled selected>Pilih Warna Buah</option>
                    <?php
                        $opsi_warna = mysqli_query($koneksi, "SELECT * FROM warna_buah");
                        while ($row = mysqli_fetch_row($opsi_warna)) {
                            echo "<option value=", "'", $row[0], "'>";
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
        $koneksi->query("INSERT INTO data (gas, suhu_lingkungan, warna_buah_id, kelayakan) VALUES ('$_POST[gas]', '$_POST[suhu_lingkungan]', '$_POST[warna_buah_id]', '$kelayakan')");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=data'</script>";
    }
?>