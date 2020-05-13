<!-- page content -->
<!-- top tiles -->

<div class="row" style="display: inline-block;">
    <div class="tile_count">
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Kiriman</span>
            <div class="count"><?= $totalKiriman; ?></div>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Kiriman Terbuka</span>
            <div class="count red"><?= $totalTerbuka ?></div>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Sedang Dikirim</span>
            <div class="count green"><?= $totalSedangDikirim ?></div>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Kiriman Selesai</span>
            <div class="count blue"><?= $totalSelesai ?></div>
        </div>
        <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Retur</span>
            <div class="count yellow"><?= $totalRetur ?></div>
        </div>
    </div>
</div>
<!-- /top tiles -->

<div class="col-md-6 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Bar graph <small>Sessions</small></h2>
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
                <h2>Recent Activities <small>Sessions</small></h2>
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
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                                    <div class="byline">
                                        <span>13 hours ago</span> by <a>Jane Smith</a>
                                    </div>
                                    <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                                    <div class="byline">
                                        <span>13 hours ago</span> by <a>Jane Smith</a>
                                    </div>
                                    <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                                    <div class="byline">
                                        <span>13 hours ago</span> by <a>Jane Smith</a>
                                    </div>
                                    <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                                    <div class="byline">
                                        <span>13 hours ago</span> by <a>Jane Smith</a>
                                    </div>
                                    <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
