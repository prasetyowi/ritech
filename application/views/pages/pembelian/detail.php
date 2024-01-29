<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pembelian</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php foreach ($Header as $value) : ?>
                            <div class="form-horizontal form-label-left">

                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nomor Pembelian</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_kode" name="Pembelian[pembelian_kode]" value="<?= $value['pembelian_kode'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-10" id="Pembelian-pembelian_id" name="Pembelian[pembelian_id]" value="<?= $value['pembelian_id'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-10" id="Pembelian-updwho" name="Pembelian[updwho]" value="<?= $value['updwho'] ?>" disabled>
                                        <input type="hidden" class="form-control col-md-10" id="Pembelian-updtgl" name="Pembelian[updtgl]" value="<?= $value['updtgl'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Pembelian</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-10" id="Pembelian-pembelian_tanggal" name="Pembelian[pembelian_tanggal]" value="<?= $value['pembelian_tanggal'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nomor Purchase Order</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_no_po" name="Pembelian[pembelian_no_po]" value="<?= $value['pembelian_no_po'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_nama" name="Pembelian[customer_nama]" value="<?= $value['customer_nama'] ?>" disabled />
                                        <input type="hidden" class="form-control col-md-10" id="Pembelian-customer_id" name="Pembelian[customer_id]" value="<?= $value['customer_id'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_kelurahan" name="Pembelian[customer_kelurahan]" value="<?= $value['customer_kelurahan'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_kecamatan" name="Pembelian[customer_kecamatan]" value="<?= $value['customer_kecamatan'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_kota" name="Pembelian[customer_kota]" value="<?= $value['customer_kota'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_provinsi" name="Pembelian[customer_provinsi]" value="<?= $value['customer_provinsi'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Kodepos</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-customer_kode_pos" name="Pembelian[customer_kode_pos]" value="<?= $value['customer_kode_pos'] ?>" disabled />
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah Material</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-jumlah" name="Pembelian[jumlah]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Waktu Pengiriman (Hari)</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_waktu_pengiriman" name="Pembelian[pembelian_waktu_pengiriman]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Waktu Pengerjaan (Hari)</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_waktu_pengerjaan" name="Pembelian[pembelian_waktu_pengerjaan]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah Termin Pembayaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_termin_pembayaran" name="Pembelian[pembelian_termin_pembayaran]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Periode Penawaran</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-periode_penawaran" name="Pembelian[periode_penawaran]" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Garansi</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-garansi" name="Pembelian[garansi]" value="" required />
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Catatan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="resizable_textarea form-control col-md-10" id="Pembelian-pembelian_keterangan" name="Pembelian[pembelian_keterangan]" style="height:200px" disabled><?= $value['pembelian_keterangan'] ?></textarea>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_status" name="Pembelian[pembelian_status]" value="<?= $value['pembelian_status'] ?>" disabled />
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
                                                <i class="fa fa-file"></i>

                                                <?php if ($value['attachment'] != "") { ?>
                                                    <a href="<?= base_url('assets/upload/pembelian/' . $value['attachment']) ?>" target="_blank"><?= $value['attachment'] ?></a>
                                                <?php } else { ?>
                                                    Belum ada file yang diupload
                                                <?php } ?>
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <a href="<?= base_url() ?>SuratJalan/print/?id=<?= $value['pembelian_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak Surat Jalan</a>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered jambo_table" id="table-pembelian-termin" style="width:40%">
                                            <thead>
                                                <tr class=" headings">
                                                    <th>#</th>
                                                    <th class="column-title">Keterangan </th>
                                                    <th class="column-title">Termin Pembayaran (%) </th>
                                                    <th class="column-title">Invoice </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($Termin as $key2 => $value2) : ?>
                                                    <tr>
                                                        <td class="text-center" style="width:5%;"><?= $key2 + 1 ?></td>
                                                        <td class="text-left" style="width:45%;"><?= $value2['keterangan'] ?></td>
                                                        <td class="text-right" style="width:40%;"><?= $value2['termin_pembayaran'] ?></td>
                                                        <td class="text-right" style="width:10%;">
                                                            <a href="<?= base_url() ?>invoice/print/?id=<?= $value2['pembelian_id'] ?>&pembelian_termin_no_item=<?= $value2['pembelian_termin_no_item'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered jambo_table" id="table-pembelian-detail" style="width:100%">
                                            <thead>
                                                <tr class=" headings">
                                                    <th>#</th>
                                                    <th class="column-title">Nama Barang </th>
                                                    <th class="column-title">Qty </th>
                                                    <th class="column-title">Unit </th>
                                                    <th class="column-title">Remarks </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($Detail as $key2 => $value2) : ?>
                                                    <tr>
                                                        <td class="text-center" style="width:5%;"><?= $key2 + 1 ?></td>
                                                        <td class="text-left" style="width:45%;"><?= $value2['barang_nama'] ?></td>
                                                        <td class="text-right" style="width:15%;"><?= $value2['qty'] ?></td>
                                                        <td class="text-right" style="width:15%;"><?= $value2['unit'] ?></td>
                                                        <td class="text-left" style="width:35%;"><?= $value2['remarks'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <a href="<?= base_url() ?>pembelian" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
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