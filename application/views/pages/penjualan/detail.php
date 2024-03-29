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
                        <h2>Form Data</h2>
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
                                        <input type="date" class="form-control col-md-12" id="Penjualan-penjualan_tanggal" name="Penjualan[penjualan_tanggal]" value="<?= $value['penjualan_tanggal'] ?>" disabled>
                                    </div>
                                </div> -->
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nomor Purchase Order</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_no_po" name="Penjualan[penjualan_no_po]" value="<?= $value['penjualan_no_po'] ?>" disabled>

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
                                        <input type="text" class="form-control col-md-12" id="Penjualan-karyawan_nama" name="Penjualan[karyawan_nama]" value="<?= $value['karyawan_nama'] ?>" disabled />
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-karyawan_id" name="Penjualan[karyawan_id]" value="<?= $value['karyawan_id'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-customer_nama" name="Penjualan[customer_nama]" value="<?= $value['customer_nama'] ?>" disabled />
                                        <input type="hidden" class="form-control col-md-12" id="Penjualan-customer_id" name="Penjualan[customer_id]" value="<?= $value['customer_id'] ?>" disabled />
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
                                        <select class="form-control select2 col-md-12" id="Penjualan-perusahaan_id" name="Penjualan[perusahaan_id]" disabled>
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
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_pic" name="Penjualan[penjualan_pic]" value="<?= $value['penjualan_pic'] ?>" max="250" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Dikirim Oleh</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-penjualan_oleh" name="Penjualan[penjualan_oleh]" value="<?= $value['penjualan_oleh'] ?>" max="250" disabled />
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">PPn</label>
                                    <div class="col-md-1 col-sm-1">
                                        <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_ppn" <?= $value['is_ppn'] == '1' ? 'checked' : '' ?> disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">PPh</label>
                                    <div class="col-md-1 col-sm-1">
                                        <input type="checkbox" class="form-control col-md-12" id="Penjualan-is_pph" <?= $value['is_pph'] == '1' ? 'checked' : '' ?> value="1" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">No Faktur PPn</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control col-md-12" id="Penjualan-no_faktur" name="Penjualan[no_faktur]" value="<?= $value['no_faktur'] ?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Tanggal Faktur PPn</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control col-md-12" id="Penjualan-tanggal_faktur" name="Penjualan[tanggal_faktur]" value="<?= $value['tanggal_faktur'] ?>" disabled>
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
                                        <textarea class="resizable_textarea form-control col-md-12" id="Penjualan-penjualan_keterangan" name="Penjualan[penjualan_keterangan]" style="height:200px" disabled><?= $value['penjualan_keterangan'] ?></textarea>
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
                                                <h2>File Pendukung</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
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
                                <?php if ($value['penjualan_status'] == "Applied") { ?>
                                    <a href="<?= base_url() ?>SuratJalan/print/?id=<?= $value['penjualan_id'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak Surat Jalan</a>
                                <?php } ?>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
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
                                                    <th class="column-title text-center">Invoice </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($Termin as $key2 => $value2) : ?>
                                                    <?php if ($value2['termin_status'] == "LUNAS") { ?>
                                                        <tr style="background-color:#9ED5C5">
                                                            <td class="text-center" style="width:5%;"><?= $key2 + 1 ?></td>
                                                            <td class="text-left" style="width:20%;"><?= $value2['keterangan'] ?></td>
                                                            <td class="text-left" style="width:20%;"><?= $value2['tanggal_invoice'] ?></td>
                                                            <td class="text-right" style="width:20%;"><?= $value2['termin_pembayaran'] ?></td>
                                                            <td class="text-center" style="width:10%;">
                                                                <input type="checkbox" id="item-<?= $key2 ?>-penjualan_termin-termin_status" value="LUNAS" <?= $value2['termin_status'] == 'LUNAS' ? 'checked' : '' ?> disabled>
                                                            </td>
                                                            <td class="text-right" style="width:20%;"><?= $value2['termin_tanggal_bayar'] ?></td>
                                                            <td class="text-right" style="width:5%;">
                                                                <?php if ($value['penjualan_status'] == "Applied") { ?>
                                                                    <a href="<?= base_url() ?>invoice/print/?id=<?= $value2['penjualan_id'] ?>&penjualan_termin_no_item=<?= $value2['penjualan_termin_no_item'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } else { ?>
                                                        <?php if ($value['penjualan_status'] == "Applied") { ?>
                                                            <tr>
                                                                <td class="text-center" style="width:5%;"><?= $key2 + 1 ?></td>
                                                                <td class="text-left" style="width:20%;"><?= $value2['keterangan'] ?></td>
                                                                <td class="text-right" style="width:20%;">
                                                                    <input type="date" class="form-control" id="item-<?= $key2 ?>-penjualan_termin-tanggal_invoice" value="<?= $value2['tanggal_invoice'] ?>" onchange="UpdateTerminPembayaran('<?= $value2['penjualan_termin_no_item'] ?>','<?= $key2 ?>')" disabled>
                                                                </td>
                                                                <td class="text-right" style="width:20%;"><?= $value2['termin_pembayaran'] ?></td>
                                                                <td class="text-center" style="width:10%;">
                                                                    <input type="checkbox" id="item-<?= $key2 ?>-penjualan_termin-termin_status" value="LUNAS" <?= $value2['termin_status'] == 'LUNAS' ? 'checked' : '' ?> onclick="UpdateTerminPembayaran('<?= $value2['penjualan_termin_no_item'] ?>','<?= $key2 ?>')">
                                                                </td>
                                                                <td class="text-right" style="width:20%;">
                                                                    <input type="date" class="form-control" id="item-<?= $key2 ?>-penjualan_termin-termin_tanggal_bayar" value="<?= $value2['termin_tanggal_bayar'] ?>" onchange="UpdateTerminPembayaran('<?= $value2['penjualan_termin_no_item'] ?>','<?= $key2 ?>')">
                                                                </td>
                                                                <td class="text-right" style="width:5%;">
                                                                    <?php if ($value['penjualan_status'] == "Applied") { ?>
                                                                        <a href="<?= base_url() ?>invoice/print/?id=<?= $value2['penjualan_id'] ?>&penjualan_termin_no_item=<?= $value2['penjualan_termin_no_item'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td class="text-center" style="width:5%;"><?= $key2 + 1 ?></td>
                                                                <td class="text-left" style="width:20%;"><?= $value2['keterangan'] ?></td>
                                                                <td class="text-right" style="width:20%;"><?= $value2['tanggal_invoice'] ?></td>
                                                                <td class="text-right" style="width:20%;"><?= $value2['termin_pembayaran'] ?></td>
                                                                <td class="text-center" style="width:10%;"></td>
                                                                <td class="text-right" style="width:20%;"></td>
                                                                <td class="text-right" style="width:5%;"></td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered jambo_table" id="table-penjualan-detail" style="width:100%">
                                            <thead>
                                                <tr class=" headings">
                                                    <th>#</th>
                                                    <th class="column-title text-center">Nama Barang </th>
                                                    <th class="column-title text-center">Qty </th>
                                                    <th class="column-title text-center">Unit </th>
                                                    <th class="column-title text-center">Remarks </th>
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
                                    <a href="<?= base_url() ?>penjualan" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
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

<script>
    function UpdateTerminPembayaran(penjualan_termin_no_item, index) {

        if ($("#item-" + index + "-penjualan_termin-termin_tanggal_bayar").val() == "") {
            var alert = "Tanggal Pembayaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            $("#item-" + index + "-penjualan_termin-termin_status").prop("checked", false);

            return false;
        }

        $.ajax({
            type: 'POST',
            url: "<?= base_url('Penjualan/Update_termin_pembayaran') ?>",
            data: {
                penjualan_id: $("#Penjualan-penjualan_id").val(),
                penjualan_termin_no_item: penjualan_termin_no_item,
                tanggal_invoice: $("#item-" + index + "-penjualan_termin-tanggal_invoice").val(),
                termin_tanggal_bayar: $("#item-" + index + "-penjualan_termin-termin_tanggal_bayar").val(),
                termin_status: $("#item-" + index + "-penjualan_termin-termin_status:checked").val() === undefined ? '' : $("#item-" + index + "-penjualan_termin-termin_status:checked").val()
            },
            dataType: "JSON",
            success: function(response) {
                if (response == "1") {
                    console.log("UpdateTerminPembayaran success");
                    Get_penjualan_termin_by_id();
                } else {
                    console.log("UpdateTerminPembayaran failed");
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log("Error 500 Internal Server Connection Failure");
            }
        });
    }

    function Get_penjualan_termin_by_id() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('Penjualan/Get_penjualan_termin_by_id') ?>",
            data: {
                penjualan_id: $("#Penjualan-penjualan_id").val()
            },
            dataType: "JSON",
            success: function(response) {
                $("#table-penjualan-termin > tbody").html('');
                $("#table-penjualan-termin > tbody").empty('');

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        if (v.termin_status == "LUNAS") {
                            $("#table-penjualan-termin > tbody").append(`
                                <tr style="background-color:#9ED5C5">
                                    <td class="text-center" style="width:5%;">${i+1}</td>
                                    <td class="text-left" style="width:20%;">${v.keterangan}</td>
                                    <td class="text-left" style="width:20%;">${v.tanggal_invoice}</td>
                                    <td class="text-right" style="width:20%;">${v.termin_pembayaran}</td>
                                    <td class="text-center" style="width:10%;">
                                        <input type="checkbox" id="item-${i}-penjualan_termin-termin_status" value="LUNAS" ${v.termin_status == 'LUNAS' ? 'checked' : '' } disabled>
                                    </td>
                                    <td class="text-right" style="width:20%;">${v.termin_tanggal_bayar}</td>
                                    <td class="text-right" style="width:5%;">
                                        <a href="<?= base_url() ?>invoice/print/?id=${v.penjualan_id}&penjualan_termin_no_item=${v.penjualan_termin_no_item}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            `);
                        } else {
                            $("#table-penjualan-termin > tbody").append(`
                                <tr>
                                    <td class="text-center" style="width:5%;">${i+1}</td>
                                    <td class="text-left" style="width:20%;">${v.keterangan}</td>
                                    <td class="text-left" style="width:20%;">
                                        <input type="date" class="form-control" id="item-${i}-penjualan_termin-tanggal_invoice" value="${v.tanggal_invoice}" onchange="UpdateTerminPembayaran('${v.penjualan_termin_no_item}','${i}')" disabled>
                                    </td>
                                    <td class="text-right" style="width:20%;">${v.termin_pembayaran}</td>
                                    <td class="text-center" style="width:10%;">
                                        <input type="checkbox" id="item-${i}-penjualan_termin-termin_status" value="LUNAS" ${v.termin_status == 'LUNAS' ? 'checked' : '' } onclick="UpdateTerminPembayaran('${v.penjualan_termin_no_item}','${i}')">
                                    </td>
                                    <td class="text-right" style="width:20%;">
                                        <input type="date" class="form-control" id="item-${i}-penjualan_termin-termin_tanggal_bayar" value="${v.termin_tanggal_bayar}" onchange="UpdateTerminPembayaran('${v.penjualan_termin_no_item}','${i}')">
                                    </td>
                                    <td class="text-right" style="width:5%;">
                                        <a href="<?= base_url() ?>invoice/print/?id=${v.penjualan_id}&penjualan_termin_no_item=${v.penjualan_termin_no_item}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            `);
                        }

                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log("Error 500 Internal Server Connection Failure");
            }
        });
    }
</script>