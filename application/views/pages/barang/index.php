<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Barang</h3>
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
                            <li><button class="btn btn-sm btn-link" id="btn_tambah_barang" style="color:gray"><i class="fa fa-plus"></i> Tambah Barang</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_nama_barang" id="filter_nama_barang" placeholder="Nama Barang ">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_barang"><i class=" fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Barang</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table" id="table_list_barang" style="width: 100%;">
                                <thead>
                                    <tr class=" headings">
                                        <th>#</th>
                                        <th class="column-title">Id Barang </th>
                                        <th class="column-title">Nama Barang </th>
                                        <th class="column-title">Harga Satuan </th>
                                        <th class="column-title">Deskripsi </th>
                                        <th class="column-title">Satuan </th>
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

<div class="modal fade bs-example-modal-xl" id="modal-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Barang</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Input Data barang</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Barang</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_barang" placeholder="Input Nama Barang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Harga Satuan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="harga" placeholder="ex: 500000">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Deskripsi Barang</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea class="resizable_textarea form-control col-md-10" id="desc_barang" style="height:200px"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Satuan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="satuan" placeholder="ex: lot">
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
                <button type="button" class="btn btn-success" id="btn_save_barang"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="modal-barang-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Barang</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Input Data barang</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Id Barang</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="id_barang-edit" placeholder="Input ID Barang" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Barang</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_barang-edit" placeholder="Input Nama Barang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Harga Satuan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="harga-edit" placeholder="ex: 500000">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Deskripsi Barang</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea class="resizable_textarea form-control col-md-10" id="desc_barang-edit" style="height:200px"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Satuan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="satuan-edit" placeholder="ex: lot">
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
                <button type="button" class="btn btn-success" id="btn_update_barang"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->