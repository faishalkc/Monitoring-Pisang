<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Daftar Data</div>
    <div class="panel-body">
    <a href="index.php?halaman=data_tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Waktu</th>
            <th>Gas (ppm)</th>
            <th>Suhu Lingkungan (°C)</th>
            <th>Warna Buah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php
            $data = mysqli_query($koneksi, "SELECT * FROM data INNER JOIN warna_buah ON data.warna_buah_id=warna_buah.id;");
            $no = 1;
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>";
                echo $no++;
                echo "</td>";
                echo "<td>";
                echo $row[5];
                echo "</td>";
                echo "<td>";
                echo $row[1];
                echo "</td>";
                echo "<td>";
                echo $row[2];
                echo "</td>";
                echo "<td style='text-transform:capitalize'>";
                echo $row[8];
                echo "</td>";
                echo "<td>";
                if ($row[4] == 1) {
                    echo "Layak Dimakan";
                }
                elseif ($row[4] == 0) {
                    echo "Tidak Layak Dimakan";
                }
                else {
                    echo "Tidak Diketahui";
                }
                echo "</td>";
                echo "<td>";
                echo "<a href='index.php?halaman=data_ubah&np=", $row[0],"' style='margin-right:5px;' class='btn btn-success'>Ubah</a>";
                echo "<a href='index.php?halaman=data_hapus&np=", $row[0],"' style='margin-right:5px;' class='btn btn-danger' onclick='return ConfirmDelete()'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
</div>
<script>
    function ConfirmDelete() {
        return confirm("Ingin menghapus ini?");
    }
</script>