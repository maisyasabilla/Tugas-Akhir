    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="icon-location-pin text-hijau"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Jumlah</p>
                        <p class="card-title"><?php echo($jmlperjalanan); ?>
                            <p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-refresh"></i> Perjalanan Hari Ini
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="icon-map text-oranye"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Jumlah</p>
                        <p class="card-title"><?php echo($perjalananbulan); ?>
                            <p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-calendar-o"></i> Perjalanan Bulan Ini
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="icon-list text-hijau"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Jumlah</p>
                        <p class="card-title"><?php echo($perjalanantahun); ?>
                            <p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-clock-o"></i> Perjalanan Tahun Ini
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-2 col-md-2">
                        <div class="icon-big text-center icon-warning">
                        <i class="icon-people text-oranye"></i>
                        </div>
                    </div>
                    <div class="col-10 col-md-10">
                        <div class="numbers">
                        <p class="card-category">Biaya</p>
                        <p class="card-title fs-17 mt-5"><?= $biaya ?>
                            <p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-refresh"></i> Perjalanan Bulan Ini
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                <div class="card-header ">
                    <h3 class="card-title">Grafik Biaya Perjalanan Dinas</h3>
                    <p class="card-category">Januari-Desember 2020</p>
                </div>
                <div class="card-body ">
                    <div class="col-xs-10">
                        <canvas id="bar-chart" width="400" height="150" class="pl-30 pr-30"></canvas>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
 // Bar chart
 <?php foreach($jumlahbiaya as $item): ?>
    <?php
        $month_num = $item['bulan'];
        $month_name = date("F", mktime(0, 0, 0, $month_num, 10));

        $data_bulan[] = $month_name;
        $data_jumlah[] = $item['total_biaya'];
    ?>
<?php endforeach ?>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($data_bulan) ?>,
      datasets: [
        {
          label: "Biaya Rp",
          backgroundColor: ["#f16923", "#32be8f", "#c6c247", "#faca4a"],
          data: <?php echo json_encode($data_jumlah) ?>,
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: ''
      }
    }
});
</script>
