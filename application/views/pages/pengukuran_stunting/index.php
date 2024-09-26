<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengukuran Stunting</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Filter Data</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label>Tanggal Pengukuran</label>
                            <input type="text" style="width: 100%" name="filter_tanggal_pengukuran" id="filter_tanggal_pengukuran" class="form-control filter_date_range_picker" value="01/01/2016 - 01/25/2016" />
                        </div>

                        <div class="col-md-3 col-sm-3  form-group has-feedback">
                            <label>Umur (Bulan)</label>
                            <input type="text" class="form-control" name="filter_umur_awal" id="filter_umur_awal" value="0">
                        </div>
                        <div class="col-md-1 col-sm-1  form-group has-feedback">
                            <label style="margin-left: 30px;margin-top: 40px;">S/D</label>
                        </div>
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <input type="text" style="margin-top: 30px;" class="form-control" name="filter_umur_akhir" id="filter_umur_akhir" value="1">
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label>Nama Orang Tua</label>
                            <input type="text" class="form-control" name="filter_nama_orang_tua" id="filter_nama_orang_tua" placeholder="Nama Orang Tua">
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label>Nama Anak</label>
                            <input type="text" class="form-control" name="filter_nama_anak" id="filter_nama_anak" placeholder="Nama Anak">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_pengukuran"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Table data</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table" id="table_list_pengukuran">
                                <thead>
                                    <tr class="headings">
                                        <th>#</th>
                                        <th class="column-title">Nama Anak </th>
                                        <th class="column-title">JK </th>
                                        <th class="column-title">Tgl Lahir </th>
                                        <th class="column-title">Nama Ortu </th>
                                        <th class="column-title">Usia Saat Ukur </th>
                                        <th class="column-title">Tgl Pengukuran </th>
                                        <th class="column-title">Berat </th>
                                        <th class="column-title">Tinggi </th>
                                        <th class="column-title">Cara Pengukuran </th>
                                        <th class="column-title">LK </th>
                                        <th class="column-title">ZS TB/U </th>
                                        <th class="column-title">Umur TB </th>
                                        <th class="column-title">Umur BB </th>
                                        <th class="column-title no-link last"><span class="nobr">kesimpulan</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->