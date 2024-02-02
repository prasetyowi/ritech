<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengeluaran Kas</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Data Pengeluaran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php foreach ($Header as $value) : ?>
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-10" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="<?= date('Y-m-d') ?>" required>
                                        <input type="hidden" class="form-control col-md-10" id="kas_id" name="kas_id" value="<?= $value['kas_id'] ?>" required>
                                        <input type="hidden" class="form-control col-md-10" id="updwho" name="updwho" value="<?= $value['updwho'] ?>" required>
                                        <input type="hidden" class="form-control col-md-10" id="updtgl" name="updtgl" value="<?= $value['updtgl'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Akun Pengeluaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select class="form-control col-md-10" style="width:100%" name="akun" id="akun">
                                            <option value="">Pilih Kategori Akun</option>
                                            <option value="Jasa" <?= $value['kas_no_akun'] == 'Jasa' ? 'selected' : '' ?>>Jasa</option>
                                            <option value="Lain-lain" <?= $value['kas_no_akun'] == 'Lain-lain' ? 'selected' : '' ?>>Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="jumlah" placeholder="ex: 500000" value="<?= $value['kas_jumlah'] ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Deskripsi Pengeluaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="desc" id="desc" class="form-control col-md-10" placeholder="Deskripsi Pengeluaran" value="<?= $value['kas_keterangan'] ?>" />
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">No. Rekening</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="no_rekening" id="no_rekening" class="form-control col-md-10" placeholder="ex: 91991027663" value="<?= $value['kas_no_rekening'] ?>" />
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>File Uploader</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <p>Drag files ke dalam box untuk upload atau click select files.</p>
                                                <div class="dropzone"></div>
                                                <br />
                                                <i class="fa fa-file"></i>

                                                <?php if ($value['attachment'] != "") { ?>
                                                    <a href="<?= base_url('assets/upload/pengeluaran_kas/' . $value['attachment']) ?>" target="_blank"><?= $value['attachment'] ?></a>
                                                <?php } else { ?>
                                                    Belum ada file yang diupload
                                                <?php } ?>
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="<?= base_url() ?>PengeluaranKas" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                                    <button class="btn btn-success" id="btn_update_pengeluaran_kas"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->