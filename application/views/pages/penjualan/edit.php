<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Invoice</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php foreach ($Header as $value) : ?>
                            <div class="form-horizontal form-label-left">
                                <!-- <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nomor Penjualan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_kode" name="Penjualan[penjualan_kode]" value="<?= $value['penjualan_kode'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_id" name="Penjualan[penjualan_id]" value="<?= $value['penjualan_id'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-updwho" name="Penjualan[updwho]" value="<?= $value['updwho'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-updtgl" name="Penjualan[updtgl]" value="<?= $value['updtgl'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Penjualan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-12" id="Penjualan-penjualan_tanggal" name="Penjualan[penjualan_tanggal]" value="<?= $value['penjualan_tanggal'] ?>" required>
                                    </div>
                                </div> -->
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nomor Purchase Order</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_no_po" name="Penjualan[penjualan_no_po]" value="<?= $value['penjualan_no_po'] ?>" maxlength="250" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_kode" name="Penjualan[penjualan_kode]" value="<?= $value['penjualan_kode'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_id" name="Penjualan[penjualan_id]" value="<?= $value['penjualan_id'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-updwho" name="Penjualan[updwho]" value="<?= $value['updwho'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-updtgl" name="Penjualan[updtgl]" value="<?= $value['updtgl'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_tanggal" name="Penjualan[penjualan_tanggal]" value="<?= $value['penjualan_tanggal'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Sales</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-karyawan_nama" name="Penjualan[karyawan_nama]" value="<?= $value['karyawan_nama'] ?>" required />
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-karyawan_id" name="Penjualan[karyawan_id]" value="<?= $value['karyawan_id'] ?>" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_nama" name="Penjualan[customer_nama]" value="<?= $value['customer_nama'] ?>" required />
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-customer_id" name="Penjualan[customer_id]" value="<?= $value['customer_id'] ?>" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_kelurahan" name="Penjualan[customer_kelurahan]" value="<?= $value['customer_kelurahan'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_kecamatan" name="Penjualan[customer_kecamatan]" value="<?= $value['customer_kecamatan'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_kota" name="Penjualan[customer_kota]" value="<?= $value['customer_kota'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_provinsi" name="Penjualan[customer_provinsi]" value="<?= $value['customer_provinsi'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kodepos</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_kode_pos" name="Penjualan[customer_kode_pos]" value="<?= $value['customer_kode_pos'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select class="form-control select2 col-md-12" id="Penjualan-perusahaan_id" name="Penjualan[perusahaan_id]" required>
                                            <option value="">Pilih Perusahaan</option>
                                            <?php foreach ($Perusahaan as $row) { ?>
                                                <option value="<?= $row['perusahaan_id'] ?>" <?= $row['perusahaan_id'] == $value['perusahaan_id'] ? 'selected' : '' ?>><?= $row['perusahaan_nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">PIC dari Pelanggan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_pic" name="Penjualan[penjualan_pic]" value="<?= $value['penjualan_pic'] ?>" maxlength="250" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Dikirim Oleh</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_oleh" name="Penjualan[penjualan_oleh]" value="<?= $value['penjualan_oleh'] ?>" maxlength="250" required />
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">PPn</label>
                                    <div class="col-md-1 col-sm-1">
                                        <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_ppn" <?= $value['is_ppn'] == '1' ? 'checked' : '' ?> value="1">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">PPh</label>
                                    <div class="col-md-1 col-sm-1">
                                        <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_pph" <?= $value['is_pph'] == '1' ? 'checked' : '' ?> value="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">No Faktur PPn</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-no_faktur" name="Penjualan[no_faktur]" value="<?= $value['no_faktur'] ?>" data-inputmask="'mask': '999.999-99.99999999'" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Faktur PPn</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-12" id="Penjualan-tanggal_faktur" name="Penjualan[tanggal_faktur]" value="<?= $value['tanggal_faktur'] ?>" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah Material</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-jumlah" name="Penjualan[jumlah]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Waktu Pengiriman (Hari)</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_waktu_pengiriman" name="Penjualan[penjualan_waktu_pengiriman]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Waktu Pengerjaan (Hari)</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_waktu_pengerjaan" name="Penjualan[penjualan_waktu_pengerjaan]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah Termin Pembayaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_termin_pembayaran" name="Penjualan[penjualan_termin_pembayaran]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Periode Penawaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-periode_penawaran" name="Penjualan[periode_penawaran]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Garansi</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-garansi" name="Penjualan[garansi]" value="" required />
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Catatan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="resizable_textarea form-control col-md-12" id="Penjualan-penjualan_keterangan" name="Penjualan[penjualan_keterangan]" style="height:200px"><?= $value['penjualan_keterangan'] ?></textarea>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_status" name="Penjualan[penjualan_status]" value="<?= $value['penjualan_status'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Upload File Pendukung</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <p>Drag files ke dalam box untuk upload atau click select files.</p>
                                                <div class="dropzone"></div>
                                                <br />
                                                <i class="fa fa-file"></i>

                                                <?php if ($value['attachment'] != "") { ?>
                                                    <a href="<?= base_url('assets/upload/penjualan/' . $value['attachment']) ?>" target="_blank"><?= $value['attachment'] ?></a>
                                                <?php } else { ?>
                                                    Belum ada file yang diupload
                                                <?php } ?>
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
                                    <button class="btn btn-primary" id="btn_tambah_termin"><i class="fa fa-plus"></i> Tambah Termin</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered jambo_table" id="table-penjualan-termin" style="width:100%">
                                            <thead>
                                                <tr class=" headings">
                                                    <th>#</th>
                                                    <th class="column-title text-center">Keterangan </th>
                                                    <th class="column-title text-center">Tanggal Invoice </th>
                                                    <th class="column-title text-center">Termin Pembayaran (%) </th>
                                                    <th class="column-title text-center">Lunas </th>
                                                    <th class="column-title text-center">Tanggal Bayar </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
                                    <button class="btn btn-primary" id="btn_modal_pilih_barang"><i class="fa fa-search"></i> Pilih Barang</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered jambo_table" id="table-penjualan-detail" style="width:100%">
                                            <thead>
                                                <tr class=" headings">
                                                    <th>#</th>
                                                    <th class="column-title text-center">Nama Barang </th>
                                                    <th class="column-title text-center">Qty </th>
                                                    <th class="column-title text-center">Unit </th>
                                                    <th class="column-title text-center">Remarks </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="<?= base_url() ?>penjualan" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                                    <button class="btn btn-success" id="btn_update_penjualan"><i class="fa fa-save"></i> Simpan</button>
                                    <button class="btn btn-success" id="btn_konfirmasi_penjualan"><i class="fa fa-check"></i> Konfirmasi</button>
                                    <button class="btn btn-danger" id="btn_cancel_penjualan"><i class="fa fa-times"></i> Batal</button>
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

<div class="modal fade bs-example-modal-xl" id="modal-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered jambo_table" id="table-list-barang" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th><input type="checkbox" id="check-all-barang"> </th>
                            <th class="column-title text-center">Kode Barang </th>
                            <th class="column-title text-center">Nama Barang </th>
                            <th class="column-title text-center">Unit </th>
                            <th class="column-title text-center">Harga Satuan </th>
                            <th class="column-title text-center">Deskripsi </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_choose_multi_barang"><i class="fa fa-save"></i> Pilih</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal" id="btnbackpallet"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>