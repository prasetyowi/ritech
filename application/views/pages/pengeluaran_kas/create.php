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
                        <div class="form-horizontal form-label-left">

                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tanggal</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control col-md-12" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="<?= date('Y-m-d') ?>" required>
                                    <input type="hidden" class="form-control col-md-12" id="kas_id" name="kas_id" value="<?= $kas_id ?>" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Akun Pengeluaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control col-md-12" style="width:100%" name="akun" id="akun">
                                        <option value="">Pilih Kategori Akun</option>
                                        <?php foreach ($TipeKas as $row) { ?>
                                            <option value="<?= $row['tipe_kas'] ?>"><?= $row['tipe_kas'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="jumlah" placeholder="ex: 500000">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Deskripsi Pengeluaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="desc" id="desc" class="form-control col-md-12" placeholder="Deskripsi Pengeluaran" maxlength="500" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">No. Rekening</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="no_rekening" id="no_rekening" class="form-control col-md-12" placeholder="ex: 91991027663" maxlength="250" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control select2 col-md-12" id="customer_id" name="customer_id">
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($Customer as $row) { ?>
                                            <option value="<?= $row['customer_id'] ?>"><?= $row['customer_nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">No. PO</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="no_po" id="no_po" class="form-control col-md-12" placeholder="ex: 91991027663" maxlength="250" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="status" id="status" class="form-control col-md-12" placeholder="ex: 91991027663" maxlength="250" value="Draft" disabled />
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <a href="<?= base_url() ?>PengeluaranKas" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                                <button class="btn btn-success" id="btn_simpan_pengeluaran_kas"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->