<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Laporan Keuangan</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Filter Data</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control select2 col-md-12" id="filter_perusahaan" name="filter_perusahaan">
                                    <option value="">Pilih Perusahaan</option>
                                    <?php foreach ($Perusahaan as $row) { ?>
                                        <option value="<?= $row['perusahaan_id'] ?>"><?= $row['perusahaan_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" style="width: 100%" name="filter_tahun" id="filter_tahun" class="form-control" value="<?= date('Y') ?>" />
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <button type="button" class="btn btn-primary" id="btn_view_laporan"><i class="fa fa-search"></i> Cari</button>
                            <button type="button" class="btn btn-primary" id="btn_excel_laporan" onclick="exportTableToExcel('table_laporan_keuangan')"><i class="fa fa-file-excel-o"></i> Export Excel</button>
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
                            <h4>Nama : Kreasi Teknik Unggul</h4>
                            <table class="table table-bordered" id="table_laporan_keuangan">
                                <thead>
                                    <tr class="headings">
                                        <th class="text-center" style="background-color: #164863;color:white;">Tahun</span>
                                        <th class="text-center" style="background-color: #427D9D;color:white;" colspan="13"><span id="th_tahun"><?= date('Y') ?></span>

                                    </tr>
                                    <tr class="headings">
                                        <th class="text-center">Masa Periode</span>
                                        <th class="text-center">Januari</span>
                                        <th class="text-center">Februari</span>
                                        <th class="text-center">Maret</span>
                                        <th class="text-center">April</span>
                                        <th class="text-center">Mei</span>
                                        <th class="text-center">Juni</span>
                                        <th class="text-center">Juli</span>
                                        <th class="text-center">Agustus</span>
                                        <th class="text-center">September</span>
                                        <th class="text-center">Oktober</span>
                                        <th class="text-center">November</span>
                                        <th class="text-center">Desember</span>
                                        <th class="text-center" style="background-color: #9BBEC8;">Total</span>
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