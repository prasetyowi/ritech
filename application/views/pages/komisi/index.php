<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Komisi</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Filter Data</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a href="<?= base_url() ?>/Komisi/create" target="_blank" style="color:gray"><i class="fa fa-plus"></i> Tambah Data Komisi</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" style="width: 100%" name="filter_tanggal_komisi" id="filter_tanggal_komisi" class="form-control filter_date_range_picker col-md-10" value="01/01/2016 - 01/25/2016" />
                        </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <select class="form-control col-md-10" style="width:100%" name="filter_status" id="filter_status">
                                <option value="">Pilih Status</option>
                                <option value="draft">Draft</option>
                                <option value="applied">Applied</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_komisi"><i class="fa fa-search"></i>Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Data Pengeluaran</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-bordered jambo_table bulk_action" id="table_list_komisi">
                                <thead>
                                    <tr class="headings">
                                        <th>#</th>
                                        <th class="column-title" style="text-align: center;">No. Komisi</th>
                                        <th class="column-title" style="text-align: center;">Tanggal Pembayaran</th>
                                        <th class="column-title" style="text-align: center;">Karyawan </th>
                                        <th class="column-title" style="text-align: center;">Jumlah </th>
                                        <th class="column-title no-link last" colspan="2" style="text-align: center;"><span class="nobr">Action</span></th>
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