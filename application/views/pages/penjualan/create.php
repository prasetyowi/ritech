<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penjualan</h3>
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
                        <div class="form-horizontal form-label-left">
                            <!-- <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nomor Penjualan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_kode" name="Penjualan[penjualan_kode]" value="<?= $LastPenjualan ?>" maxlength="250" required>
                                    <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_id" name="Penjualan[penjualan_id]" value="<?= $penjualan_id; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tanggal Penjualan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control col-md-12" id="Penjualan-penjualan_tanggal" name="Penjualan[penjualan_tanggal]" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div> -->
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nomor Purchase Order</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_no_po" name="Penjualan[penjualan_no_po]" value="<?= $LastPenjualan ?>" maxlength="250" required>
                                    <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_id" name="Penjualan[penjualan_id]" value="<?= $penjualan_id; ?>" required>
                                    <input type="hidden" class="form-control col-md-12" id="Penjualan-penjualan_tanggal" name="Penjualan[penjualan_tanggal]" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Sales</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-karyawan_nama" name="Penjualan[karyawan_nama]" value="" required />
                                    <input type="hidden" class="form-control col-md-12" id="Penjualan-karyawan_id" name="Penjualan[karyawan_id]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_nama" name="Penjualan[customer_nama]" value="" required />
                                    <input type="hidden" class="form-control col-md-12" id="Penjualan-customer_id" name="Penjualan[customer_id]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_kelurahan" name="Penjualan[customer_kelurahan]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_kecamatan" name="Penjualan[customer_kecamatan]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_kota" name="Penjualan[customer_kota]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_provinsi" name="Penjualan[customer_provinsi]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kodepos</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-customer_kode_pos" name="Penjualan[customer_kode_pos]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control select2 col-md-12" id="Penjualan-perusahaan_id" name="Penjualan[perusahaan_id]">
                                        <option value="">Pilih Perusahaan</option>
                                        <?php foreach ($Perusahaan as $row) { ?>
                                            <option value="<?= $row['perusahaan_id'] ?>"><?= $row['perusahaan_nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">PIC dari Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_pic" name="Penjualan[penjualan_pic]" value="" maxlength="250" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dikirim Oleh</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_oleh" name="Penjualan[penjualan_oleh]" value="" maxlength="250" required />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">PPn</label>
                                <div class="col-md-1 col-sm-1">
                                    <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_ppn" value="1">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">PPh</label>
                                <div class="col-md-1 col-sm-1">
                                    <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_pph" value="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">No Faktur PPn</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-no_faktur" name="Penjualan[no_faktur]" value="" data-inputmask="'mask': '999.999-99.999999999'" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tanggal Faktur PPn</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control col-md-12" id="Penjualan-tanggal_faktur" name="Penjualan[tanggal_faktur]" value="<?= date('Y-m-d') ?>" required>
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
                                    <textarea class="resizable_textarea form-control col-md-12" id="Penjualan-penjualan_keterangan" name="Penjualan[penjualan_keterangan]" style="height:200px">
1. Harga belum termasuk PPn 11% dan franco Driyorejo (pabrik customer) dan berlaku sampai 31 Juli 2023.
2. Customer menyediakan kebutuhan utilitas (listrik dan sumber air) disediakan oleh customer.</textarea>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_status" name="Penjualan[penjualan_status]" value="Draft" disabled />
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
                                <button class="btn btn-success" id="btn_simpan_penjualan"><i class="fa fa-save"></i> Simpan</button>
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