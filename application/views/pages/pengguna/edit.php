<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengguna</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data Pengguna</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php foreach ($Pengguna as $header) : ?>
                            <div class="form-horizontal form-label-left">
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Pengguna ID</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="tet" class="form-control col-md-10" id="Pengguna-pengguna_id-edit" value="<?= $header['pengguna_id'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Username</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="Pengguna-pengguna_username-edit" value="<?= $header['pengguna_username'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control col-md-10" id="Pengguna-pengguna_email-edit" value="<?= $header['pengguna_email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Password</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="password" name="Pengguna-password-edit" id="Pengguna-password-edit" class="form-control col-md-10" value="<?= $header['pengguna_password'] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="Pengguna-perusahaan_id-edit">
                                                <option value="">** Pilih Perusahaan **</option>
                                                <?php foreach ($Perusahaan as $value) : ?>
                                                    <option value="<?= $value['perusahaan_id'] ?>" <?= $value['perusahaan_id'] == $header['pengguna_perusahaan'] ? 'selected' : '' ?>><?= $value['perusahaan_nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Karyawan</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control col-md-10 select2" id="Pengguna-karyawan_id-edit">
                                                <option value="">** Pilih Karyawan **</option>
                                                <?php foreach ($Karyawan as $value) : ?>
                                                    <option value="<?= $value['karyawan_id'] ?>" <?= $value['karyawan_id'] == $header['karyawan_id'] ? 'selected' : '' ?>><?= $value['karyawan_nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Aktif</label>
                                        <div class="col-md-1 col-sm-1">
                                            <input type="checkbox" class="form-control col-md-10" id="is_aktif-edit" <?= $header['is_aktif'] == '1' ? 'checked' : '' ?> disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="btn_update_profil"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /page content -->