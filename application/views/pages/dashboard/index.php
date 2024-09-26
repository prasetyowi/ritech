<!-- page content -->

<style type="text/css">
    .padding-atas {
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 50px;
        padding-bottom: 20px;
        text-align: center;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row col-lg-12 col-md-12 col-sm-12" style="display: inline-block;">
        <?php foreach ($Data as $data) : ?>
            <div class="tile_count">
                <div class="col-md-3 col-sm-12 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Pengukuran</span>
                    <div class="count"><?= $data['total_pengukuran'] ?></div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> Dari Bulan Lalu</span> -->
                </div>
                <div class="col-md-3 col-sm-12 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Tidak Stunting</span>
                    <div class="count green"><?= $data['tidak_stunting_bulan_ini'] ?></div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Dari Bulan Lalu</span> -->
                </div>
                <div class="col-md-3 col-sm-12 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Hampir Stunting</span>
                    <div class="count red"><?= $data['hampir_stunting_bulan_ini'] ?></div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>12% </i> Dari Bulan Lalu</span> -->
                </div>
                <div class="col-md-3 col-sm-12 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Stunting</span>
                    <div class="count red"><?= $data['stunting_bulan_ini'] ?></div>
                    <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i>34% </i> Dari Bulan Lalu</span> -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /top tiles -->
</div>
<!-- /page content -->