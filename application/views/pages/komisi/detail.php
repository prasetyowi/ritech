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
                            <?php foreach ($Header as $value) : ?>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Komisi ID</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Komisi-komisi_id" name="Komisi[komisi_id]" value="<?= $value['komisi_id'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Nama Project</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Komisi-nama_project" name="Komisi[nama_project]" placeholder="Nama Project" value="<?= $value['nama_project'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Komisi-komisi_tanggal" name="Komisi[komisi_tanggal]" value="<?= $value['nama_project'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="updwho" name="updwho" value="<?= $value['updwho'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="updtgl" name="updtgl" value="<?= $value['updtgl'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Komisi-komisi_status" name="Komisi[komisi_status]" value="<?= $value['komisi_status'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Pembayaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-12" id="Komisi-tanggal_pembayaran" name="Komisi[tanggal_pembayaran]" value="<?= $value['tanggal_pembayaran'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Karyawan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select class="form-control col-md-12" style="width:100%" id="Komisi-karyawan_id" name="Komisi[karyawan_id]" disabled>
                                            <option value="">Pilih Karyawan</option>
                                            <?php foreach ($Karyawan as $row) { ?>
                                                <option value="<?= $row['karyawan_id'] ?>" <?= $value['karyawan_id'] == $row['karyawan_id'] ? 'selected' : '' ?>><?= $row['karyawan_id'] . " - " . $row['karyawan_nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12 mask-money text-right" id="Komisi-jumlah" name="Komisi[jumlah]" value="<?= format_rupiah($value['jumlah']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Komisi-komisi_status" name="Komisi[komisi_status]" value="<?= $value['komisi_status'] ?>" disabled>
                                    </div>
                                </div>
                                <div class=" ln_solid">
                                </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <a href="<?= base_url() ?>Komisi" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
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