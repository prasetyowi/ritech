<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quotation</h3>
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
                            <li><a href="<?= base_url() ?>quotation/create" target="_blank" style="color:gray"><i class="fa fa-plus"></i> Tambah Quotation</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" style="width: 100%" name="filter_tanggal_quotation" id="filter_tanggal_quotation" class="form-control filter_date_range_picker" value="01/01/2016 - 01/25/2016" />
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <select class="form-control" style="width:100%" name="filter_status_quotation" id="filter_status_quotation">
                                <option value="">Semua Status</option>
                                <option value="draft">Draft</option>
                                <option value="applied">Applied</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_customer" id="filter_customer" placeholder="Nama Pelanggan">
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_no_quotation" id="filter_no_quotation" placeholder="No Quotation">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_quotation"><i class="fa fa-search"></i> Cari</button>
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
                            <table class="table table-striped jambo_table" id="table_list_quotation">
                                <thead>
                                    <tr class="headings">
                                        <th>#</th>
                                        <th class="column-title">No Quotation </th>
                                        <th class="column-title">Nama Penawaran </th>
                                        <th class="column-title">Tanggal </th>
                                        <th class="column-title">Pelanggan </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span></th>
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