<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Orang Tua</h3>
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
                            <li><button class="btn btn-sm btn-link" id="btn_tambah_orang_tua" style="color:gray"><i class="fa fa-plus"></i> Tambah Orang Tua</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_nama_orang_tua" id="filter_nama_orang_tua" placeholder="Nama Orang Tua ">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_orang_tua"><i class=" fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Orang Tua</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table" id="table_list_orang_tua" style="width: 100%;">
                                <thead>
                                    <tr class=" headings">
                                        <th>#</th>
                                        <th class="column-title">Nama Orang Tua </th>
                                        <th class="column-title">Alamat </th>
                                        <th class="column-title">Kelurahan </th>
                                        <th class="column-title">Kecamatan </th>
                                        <th class="column-title">Kota </th>
                                        <th class="column-title">Provinsi </th>
                                        <th class="column-title">Telp </th>
                                        <th class="column-title">Kode Pos </th>
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

<div class="modal fade bs-example-modal-xl" id="modal-orang_tua" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Orang Tua</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Orang Tua</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nomor Induk Kependudukan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="orang_tua_id" placeholder="Input Nomor Induk Kependudukan">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Orang Tua</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="nama_orang_tua" placeholder="Input Nama Orang Tua">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp" id="telp" placeholder="ex: 031 7410382" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control rounded-0" name="jenis_kelamin" id="jenis_kelamin" style="height:48px;" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Lahir</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="date" class="form-control" id="tgl_lahir" placeholder="ex: 031 7410382">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-1 col-sm-1">
                                            <input type="checkbox" class="form-control" id="is_aktif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Alamat Orang Tua</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="alamat_orang_tua" placeholder=" Alamat orang_tua">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kelurahan" id="kelurahan" placeholder="Input Kelurahan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kecamatan" id="kecamatan" placeholder="Input Kecamatan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kota" id="kota" placeholder="Input Kota" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="provinsi" id="provinsi" placeholder="Input Provinsi" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Negara</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="negara" id="negara" placeholder="Indonesia" class="form-control" />
                                        </div>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kode Pos</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kode_pos" id="kode_pos" placeholder="Kode Pos Orang Tua" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="email" id="email" placeholder="Alamat Email Orang Tua" class="form-control" />
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_save_orang_tua"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="modal-orang_tua-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Orang Tua</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Orang Tua</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nomor Induk Kependudukan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="orang_tua_id-edit" placeholder="Input Nomor Induk Kependudukan" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Orang Tua</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="nama_orang_tua-edit" placeholder="Input Nama Orang Tua">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp-edit" id="telp-edit" placeholder="ex: 031 7410382" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control rounded-0" name="jenis_kelamin-edit" id="jenis_kelamin-edit" style="height:48px;" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Lahir</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="date" class="form-control" id="tgl_lahir-edit" placeholder="ex: 031 7410382">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-1 col-sm-1">
                                            <input type="checkbox" class="form-control" id="is_aktif-edit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Alamat Orang Tua</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="alamat_orang_tua-edit" placeholder="Input Alamat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kelurahan-edit" id="kelurahan-edit" placeholder="Input Kelurahan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kecamatan-edit" id="kecamatan-edit" placeholder="Input Kecamatan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kota-edit" id="kota-edit" placeholder="Input Kota" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="provinsi-edit" id="provinsi-edit" placeholder="Input Provinsi" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Negara</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="negara-edit" id="negara-edit" placeholder="Indonesia" class="form-control" />
                                        </div>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Kode Pos</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="kode_pos-edit" id="kode_pos-edit" placeholder="Kode Pos Orang Tua" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="email-edit" id="email-edit" placeholder="Alamat Email Orang Tua" class="form-control" />
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_update_orang_tua"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->