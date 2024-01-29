<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer</h3>
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
                            <li><a href="<?= base_url() ?>/customer/create" target="_blank" style="color:gray"><i class="fa fa-plus"></i> Tambah Customer</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_nama_customer" id="filter_nama_customer" placeholder="Nama Pelanggan ">
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
                        <h2>List Surat Jalan</h2>
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
                                        <th class="column-title">Nama Pelanggan </th>
                                        <th class="column-title">Alamat </th>
                                        <th class="column-title">Kelurahan </th>
                                        <th class="column-title">Kecamatan </th>
                                        <th class="column-title">Kota </th>
                                        <th class="column-title">Provinsi </th>
                                        <th class="column-title">Negara </th>
                                        <th class="column-title">Telp </th>
                                        <th class="column-title">Kode Pos </th>
                                        <th class="column-title">Email </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <tr class="odd pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td>
                                        <td class=" "><?php echo "PT. Sandai Farma"; ?></td>
                                        <td class=" "><?php echo "Jl. Kenjeran 401B
                Surabaya, Jawa Timur 60134"; ?></td>
                                        <td class=" "><?php echo "Tambak Rejo"; ?></td>
                                        <td class=" "><?php echo "Kenjeran"; ?></td>
                                        <td class=" "><?php echo "Surabaya"; ?></td>
                                        <td class=" "><?php echo "Jawa Timur"; ?></td>
                                        <td class=" "><?php echo "Indonesia"; ?></td>
                                        <td class=" "><?php echo "0317410382"; ?></td>
                                        <td class=" "><?php echo "60285"; ?></td>
                                        <td class=" "><?php echo "sandai.farmagroup.com"; ?></td>
                                        
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