<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Komisi</h3>
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
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Nama Project</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Komisi-nama_project" name="Komisi[nama_project]" placeholder="Nama Project">
                                    <input type="hidden" class="form-control col-md-12" id="Komisi-komisi_tanggal" name="Komisi[komisi_tanggal]" value="<?= date('Y-m-d') ?>" required>
                                    <input type="hidden" class="form-control col-md-12" id="Komisi-komisi_id" name="Komisi[komisi_id]" value="<?= $komisi_id ?>" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tanggal Pembayaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control col-md-12" id="Komisi-tanggal_pembayaran" name="Komisi[tanggal_pembayaran]" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Karyawan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control col-md-12 select2" style="width:100%" id="Komisi-karyawan_id" name="Komisi[karyawan_id]">
                                        <option value="">Pilih Karyawan</option>
                                        <?php foreach ($Karyawan as $row) { ?>
                                            <option value="<?= $row['karyawan_id'] ?>"><?= $row['karyawan_id'] . " - " . $row['karyawan_nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12 mask-money text-right" id="Komisi-jumlah" name="Komisi[jumlah]">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <a href="<?= base_url() ?>Komisi" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                                <button class="btn btn-success" id="btn_simpan_komisi"><i class="fa fa-save"></i> Simpan</button>
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