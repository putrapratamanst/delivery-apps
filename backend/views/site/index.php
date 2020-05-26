<!-- page content -->
<!-- top tiles -->

<div class="row" style="display: inline-block;">
    <div class="tile_count">
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Kiriman</span>
            <div class="count"><?= $totalKiriman; ?></div>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Data Kiriman</span>
            <a href="/delivery/terbuka">
                <div class="count red">
                    <?= $totalTerbuka ?>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Sedang Dikirim</span>
            <a href="/delivery/dikirim">
                <div class="count green">
                    <?= $totalSedangDikirim ?>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Kiriman Selesai</span>
            <a href="/delivery/lunas">
                <div class="count blue"><?= $totalSelesai ?></div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Retur</span>
            <a href="/delivery/retur">
                <div class="count yellow"><?= $totalRetur ?></div>
            </a>
        </div>
    </div>
</div>
<!-- /top tiles -->

<div class="col-md-6 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Grafik Pengiriman Barang <small>PT. POS INDONESIA</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <canvas id="mybarChart"></canvas>
        </div>
    </div>
</div>

<br />

<div class="row">
    <div class="col-md-12 col-sm-4 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Aktivitas Pengiriman <small>PT. POS INDONESIA</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                        <?php
                        if ($kirimanAll > 0) {
                            foreach ($kirimanAll as $key => $value) { ?>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>Pengirim: <?= $value['nama'] ?></a>
                                            </h2>
                                            <div class="byline">
                                                <span>Nomor Barcode</span> <a><?= $value['nomor_barcode'] ?></a>
                                            </div>
                                            <p class="excerpt">Alamat: <?= $value['alamat'] ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
