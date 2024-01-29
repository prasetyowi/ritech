<!-- page content -->
<style>
    body {
        color: black;
    }

    .right-align {
        text-align: right;
    }
</style>
<div class="row" style="display: block;">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <?php foreach ($Header as $value) : ?>
                <table width="100%">
                    <tr>
                        <td colspan="2" style="text-align: left;" width="40%">
                            <h5> <?php echo "PT. Kreasi Teknik Unggul"; ?></h5>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align: left;" colspan="2">
                            <h1>Surat Jalan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" width="60%">
                            <b>Ship to:</b>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align:right;">
                            <b>No. SJ/DO</b>
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td style="text-align: left;">
                            <?= $value['pembelian_kode']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" width="60%">
                            <?= $value['customer_nama']; ?>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align:right;">
                            <b>Tanggal SJ/DO</b>
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td style="text-align: left;">
                            <?= $value['pembelian_tanggal']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" width="60%">
                            <?= $value['customer_alamat'] . ", " . $value['customer_kelurahan'] . ", " . $value['customer_kecamatan'] . ", " . $value['customer_kota'] . ", " . $value['customer_provinsi'] . ", " . $value['customer_kode_pos'] ?>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align:right;">
                            <b>No. PO</b>
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td style="text-align: left;">
                            <?= $value['pembelian_no_po'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" width="60%">
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align:right;">
                            <b>PIC</b>
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td style="text-align: left;">
                            <?php echo "Nama PIC"; ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" width="60%">
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td style="text-align:right;">
                            <b>Oleh</b>
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td style="text-align: left;">
                            <?php echo "Andi"; ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <br>
            <table class="table-bordered table-bordered" width="100%" id="table_item_DO">
                <thead>
                    <tr style="text-align:center">
                        <th>No</th>
                        <th>Deskripsi Barang</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Detail as $key => $value) : ?>
                        <tr>
                            <td style="text-align:center"><?= $key + 1 ?></td>
                            <td style="text-align:left"><?= $value['barang_nama'] ?></td>
                            <td style="text-align:right"><?= $value['qty'] ?></td>
                            <td style="text-align:left"><?= $value['unit'] ?></td>
                            <td style="text-align:left"><?= $value['remarks'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <thead>
                    <tr>
                        <td style="text-align:center">
                            <b>Dibuat Oleh, </b>
                        </td>
                        <td style="text-align:center" width="60%">

                        </td>
                        <td style="text-align:center">
                            <b>Diterima oleh, </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            &nbsp;
                        </td>
                        <td style="text-align:center">
                            &nbsp;
                        </td>
                        <td style="text-align:center">

                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            &nbsp;
                        </td>
                        <td style="text-align:center" width="60%">
                            &nbsp;
                        </td>
                        <td style="text-align:center">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            Hendry
                        </td>
                        <td style="text-align:center" width="60%">
                            &nbsp;
                        </td>
                        <td style="text-align:center">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <hr>
                        </td>
                        <td style="text-align:center" width="60%">
                            &nbsp;
                        </td>
                        <td style="text-align:center">
                            <hr>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

    <div class="clearfix"></div>
</div>