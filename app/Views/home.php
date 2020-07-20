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
                        <p class="card-title"><?php echo($jmlperjalanan); ?>
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
                        <p class="card-title"><?php echo($jmlperjalanan); ?>
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
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="icon-people text-oranye"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Jumlah</p>
                        <p class="card-title"><?php echo($jmlpegawai); ?>
                            <p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-refresh"></i> Karyawan
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                <div class="card-header ">
                    <h3 class="card-title">Grafik Perjalanan Dinas</h3>
                    <p class="card-category">Januari-Desember 2020</p>
                </div>
                <div class="card-body ">
                    <canvas id=chartHours width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
