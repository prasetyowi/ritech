<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Invoice</h3>
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
                            <li><a href="<?= base_url() ?>/invoice/create" target="_blank" style="color:gray"><i class="fa fa-plus"></i> Tambah Invoice</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" style="width: 100%" name="filter_tanggal_quotation" id="filter_tanggal_invoice" class="form-control filter_date_range_picker" value="01/01/2016 - 01/25/2016" />
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_customer" id="filter_customer" placeholder="No. Invoice">
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_customer" id="filter_customer" placeholder="Nama Pelanggan">
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_no_quotation" id="filter_no_quotation" placeholder="No Quotation">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
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
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">No. Invoice </th>
                                        <th class="column-title">Tanggal Invoice </th>
                                        <th class="column-title">No. PO </th>
                                        <th class="column-title">Nama Pelanggan </th>
                                        <th class="column-title">No. Faktur PPn </th>
                                        <th class="column-title">Tanggal Faktur PPn </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td>
                                        <td class=" "><?php echo "003/I/Ritech-SF/2022" ;?></td>
                                        <td class=" "><?php echo "28 Januari 2022" ;?></td>
                                        <td class=" "><?php echo "016/I/SF/22" ;?></td>
                                        <td class=" "><?php echo "PT. Sandai Farma" ;?></td>
                                        <td class=" "><?php echo "016/I/SF/22" ;?></td>
                                        <td class="a-right a-right "><?php echo "28 Januari 2022" ;?></td>
                                        <td class=" last"><a href="#">View</a>
                                        </td>
                                    </tr>
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