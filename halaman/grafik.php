<?php include "session.php"?>
<?php include "koneksi.php"?>
<?php
$tanggal = mysqli_query($koneksi, "SELECT created_at FROM data");
$tanggal2 = mysqli_query($koneksi, "SELECT created_at FROM data");
$suhu = mysqli_query($koneksi, "SELECT suhu_lingkungan FROM data");
$gas = mysqli_query($koneksi, "SELECT gas FROM data");

$max_suhu = 50;
$max_gas = 10000;
?>

<div class="panel panel-success">
    <div class="panel-heading">Grafik Data</div>
    <div class="panel-body">
        <div class="btn" style="color:#fff;background-color:#29B0D0;border-color:#29B0D0">Grafik Suhu</div>
        <canvas id="linechart" width="100" height="40"></canvas>

        <div class="btn" style="color:#fff;background-color:#2A516E;border-color:#2A516E;margin-top:20px;">Grafik Gas</div>
        <canvas id="linechart2" width="100" height="40"></canvas>
        
        <script src="js/Chart.js"></script>
        <script type="text/javascript">
          var ctx = document.getElementById("linechart").getContext("2d");
          var data = {
            labels: [<?php while ($row = mysqli_fetch_array($tanggal)) {echo '"' . $row[0] . '",';} ?>],
            datasets: [
                  {
                    label: "Gas",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($row = mysqli_fetch_array($gas)) {if ($row[0] <= $max_gas) {echo '"' . $row[0] . '",';} else {echo '"' . $max_gas . '",';}} ?>]
                  }
                  ]
          };

          var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
        </script>
        <script type="text/javascript">
          var ctx = document.getElementById("linechart2").getContext("2d");
          var data = {
            labels: [<?php while ($row = mysqli_fetch_array($tanggal2)) {echo '"' . $row[0] . '",';} ?>],
            datasets: [
                  {
                    label: "Suhu",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?php while ($row = mysqli_fetch_array($suhu)) {if ($row[0] <= $max_suhu) {echo '"' . $row[0] . '",';} else {echo '"' . $max_suhu . '",';}} ?>]
                  }
                  ]
          };

          var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
        </script>
    </div>
</div>