<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Karyawan</h3>
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
                            <li><button class="btn btn-sm btn-link" id="btn_tambah_karyawan" style="color:gray"><i class="fa fa-plus"></i> Tambah Karyawan</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" name="filter_nama_karyawan" id="filter_nama_karyawan" placeholder="Nama Karyawan ">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type=" button" class="btn btn-primary" id="btn_search_karyawan"><i class=" fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Karyawan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-left: 50px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table" id="table_list_karyawan" style="width: 100%;">
                                <thead>
                                    <tr class=" headings">
                                        <th>#</th>
                                        <th class="column-title">Kode Karyawan </th>
                                        <th class="column-title">Nama Karyawan </th>
                                        <th class="column-title">Perusahaan </th>
                                        <th class="column-title">Divisi </th>
                                        <th class="column-title">Level </th>
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

<div class="modal fade bs-example-modal-xl" id="modal-karyawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Karyawan</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Karyawan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_karyawan" placeholder="Input Nama Karyawan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="alamat_karyawan" placeholder=" Alamat karyawan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp" id="telp" placeholder="ex: 031 7410382" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="perusahaan_id">
                                                <option value="">** Pilih Perusahaan **</option>
                                                <?php foreach ($Perusahaan as $value) : ?>
                                                    <option value="<?= $value['perusahaan_id'] ?>"><?= $value['perusahaan_nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Divisi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="karyawan_divisi">
                                                <option value="">** Pilih Divisi **</option>
                                                <?php foreach ($Divisi as $value) : ?>
                                                    <option value="<?= $value['karyawan_divisi'] ?>"><?= $value['karyawan_divisi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Level</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="karyawan_level">
                                                <option value="">** Pilih Level **</option>
                                                <?php foreach ($Level as $value) : ?>
                                                    <option value="<?= $value['karyawan_level'] ?>"><?= $value['karyawan_level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-1 col-sm-1">
                                            <input type="checkbox" class="form-control col-md-10" id="is_aktif">
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
                <button type="button" class="btn btn-success" id="btn_save_karyawan"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="modal-karyawan-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">karyawan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: block;">

                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data karyawan</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Kode Karyawan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="id_karyawan-edit" value="Input Nama Karyawan" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Karyawan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="nama_karyawan-edit" placeholder="Input Nama Karyawan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="alamat_karyawan-edit" placeholder=" Alamat karyawan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">No. Telp</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="telp-edit" id="telp-edit" placeholder="ex: 031 7410382" class="form-control col-md-10" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="perusahaan_id-edit">
                                                <option value="">** Pilih Perusahaan **</option>
                                                <?php foreach ($Perusahaan as $value) : ?>
                                                    <option value="<?= $value['perusahaan_id'] ?>"><?= $value['perusahaan_nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Divisi</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="karyawan_divisi-edit">
                                                <option value="">** Pilih Divisi **</option>
                                                <?php foreach ($Divisi as $value) : ?>
                                                    <option value="<?= $value['karyawan_divisi'] ?>"><?= $value['karyawan_divisi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Level</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="karyawan_level-edit">
                                                <option value="">** Pilih Level **</option>
                                                <?php foreach ($Level as $value) : ?>
                                                    <option value="<?= $value['karyawan_level'] ?>"><?= $value['karyawan_level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-1 col-sm-1">
                                            <input type="checkbox" class="form-control col-md-10" id="is_aktif-edit">
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
                <button type="button" class="btn btn-success" id="btn_update_karyawan"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->