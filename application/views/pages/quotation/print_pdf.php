<!-- page content -->
<style>
    .right-align {
        text-align: right;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cetak Quotation</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <?php foreach ($Header as $key => $value) : ?>
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <table width="100%">
                            <tr>
                                <td colspan="3" style="text-align: left;">
                                    The Mansion Kemayoran<br>
                                    Bougenville - Tower Fontana <br>
                                    Jalan Trembesi D4, Lantai 21, Unit E1, Pademangan, Jakarta Utara 14410
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6><b>
                                            <u>QUOTATION</u></b>
                                    </h6>
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
                                <td class="right-align">
                                    Jakarta, <?= date('d M Y'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Quotation
                                </td>
                                <td>
                                    &nbsp; :
                                </td>
                                <td>
                                    &nbsp; <?= $value['quotation_kode']; ?>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                                <td class="right-align">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kepada
                                </td>
                                <td>
                                    &nbsp; :
                                </td>
                                <td>
                                    &nbsp; <?= $value['customer_nama']; ?>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                                <td class="right-align">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
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
                                <td class="right-align">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    Dengan hormat, <br><?php echo "Berikut kami sampaikan penawaran harga material clean room dengan spesifikasi sebagai berikut:"; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table class="table-bordered table-striped" width="100%" id="table_quotation">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No.</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Unit</th>
                                    <th>Harga Satuan Material</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Detail as $key2 => $value2) : ?>
                                    <?php
                                    $barang_desc = explode("\n", $value2['barang_desc']);
                                    ?>
                                    <tr>
                                        <td style="text-align:center;padding: 10px 10px 10px 10px;">
                                            <?= $key2 + 1; ?>
                                        </td>
                                        <td style="text-align:left;padding: 10px 10px 10px 10px;">
                                            <?= $value2['barang_nama']; ?><br>
                                            <?php foreach ($barang_desc as $val_desc) {
                                                echo $val_desc . "<br>";
                                            } ?>
                                        </td>
                                        <td style="text-align:right;padding: 10px 10px 10px 10px;">
                                            <?= $value2['qty']; ?>
                                        </td>
                                        <td style="text-align:left;padding: 10px 10px 10px 10px;">
                                            <?= $value2['unit']; ?>
                                        </td>
                                        <td style="text-align:right;padding: 10px 10px 10px 10px;">
                                            <?= format_rupiah($value2['harga_satuan']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <?php
                        $keterangan = explode("\n", $value['quotation_keterangan']);
                        ?>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <h6><b>
                                            <u>CATATAN</u></b>
                                    </h6>
                                </tr>
                                <?php foreach ($keterangan as $key_ket => $val_ket) : ?>
                                    <tr>
                                        <td>
                                            <?= $val_ket; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td> <br><br><br>Hormat Kami, </td>
                                </tr>
                                <tr>
                                    <td><br><br><br> <u>Arif K.</u><br>Mobile (+62) 812-1722-8185 <br> Note: This letter is sent by email, no need signature for verification.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            <?php endforeach; ?>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->