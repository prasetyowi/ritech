<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Pelanggan</h3>
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
                            <li><button class="btn btn-sm btn-link" id="btn_tambah_customer" style="color:gray"><i class="fa fa-plus"></i> Tambah Pelanggan</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_nama_customer" id="filter_nama_customer" placeholder="Nama Pelanggan ">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_customer"><i class=" fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Pelanggan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table" id="table_list_customer" style="width: 100%;">
                                <thead>
                                    <tr class=" headings">
                                        <th>#</th>
                                        <th class="column-title">Nama Pelanggan </th>
                                        <th class="column-title">Alamat </th>
                                        <th class="column-title">Kelurahan </th>
                                        <th class="column-title">Kecamatan </th>
                                        <th class="column-title">Kota </th>
                                        <th class="column-title">Provinsi </th>
                                        <th class="column-title">Telp </th>
                                        <th class="column-title">Kode Pos </th>
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

<div class="modal fade bs-example-modal-xl" id="modal-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Input Data Customer</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Customer</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_customer" placeholder="Input Nama Customer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="alamat_customer" placeholder=" Alamat Customer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kelurahan" id="kelurahan" placeholder="Input Kelurahan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kecamatan" id="kecamatan" placeholder="Input Kecamatan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kota" id="kota" placeholder="Input Kota" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="provinsi" id="provinsi" placeholder="Input Provinsi" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Negara</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="negara" id="negara" placeholder="Indonesia" class="form-control col-md-10" />
                                        </div>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp" id="telp" placeholder="ex: 031 7410382" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kode Pos</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kode_pos" id="kode_pos" placeholder="Kode Pos Pelanggan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="email" id="email" placeholder="Alamat Email Pelanggan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_save_customer"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="modal-customer-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Input Data Customer</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Customer</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_customer-edit" placeholder="Input Nama Customer">
                                            <input type="hidden" class="form-control col-md-10" id="id_customer-edit" placeholder="Input Nama Customer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="alamat_customer-edit" placeholder=" Alamat Customer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kelurahan" id="kelurahan-edit" placeholder="Input Kelurahan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kecamatan" id="kecamatan-edit" placeholder="Input Kecamatan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kota" id="kota-edit" placeholder="Input Kota" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="provinsi" id="provinsi-edit" placeholder="Input Provinsi" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Negara</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="negara" id="negara-edit" placeholder="Indonesia" class="form-control col-md-10" />
                                        </div>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp" id="telp-edit" placeholder="ex: 031 7410382" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kode Pos</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kode_pos" id="kode_pos-edit" placeholder="Kode Pos Pelanggan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="email" id="email-edit" placeholder="Alamat Email Pelanggan" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_update_customer"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->