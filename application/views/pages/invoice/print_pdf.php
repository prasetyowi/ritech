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
                        <td colspan="2" style="text-align: left;" width="30%">
                            <h5> <?php echo "PT. Kreasi Teknik Unggul"; ?></h5>
                        </td>
                        <td width="40%">
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <h1>INVOICE</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left;">
                            <p> <?php echo "The Mansion Kemayoran Bougenville - Tower Fontana Lt. 21 unit E1 Jl. Trembesi D4, RT 009, RW 011, Jakarta Utara, DKI Jakarta"; ?></p>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Kepada Yth. : <br><?= $value['customer_nama'] ?><br><?= $value['customer_alamat'] . ", " . $value['customer_kelurahan'] . ", " . $value['customer_kecamatan'] . ", " . $value['customer_kota'] . ", " . $value['customer_provinsi'] . ", " . $value['customer_kode_pos'] ?>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: left;" width="12%">
                            No. Invoice
                        </td>
                        <td width="1%">
                            :
                        </td>
                        <td>
                            <?= $value['pembelian_kode'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            Tanggal Invoice
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $value['pembelian_tanggal'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            No. PO
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $value['pembelian_no_po'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            Tanggal faktur PPn
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $value['pembelian_tanggal'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            No. Faktur PPn
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $value['pembelian_no_po'] ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <br>
            <table class="table-bordered table-striped" width="100%" id="table_item_invoice">
                <thead>
                    <tr style="text-align:center">
                        <th>Jumlah Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Termin as $value2) : ?>
                        <tr>
                            <td colspan="4" style="text-align:center;color:black;" bgcolor="#2E97A7"><?= ucfirst($value2['keterangan']); ?> (<?= $value2['termin_pembayaran']; ?>%), Down Payment
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    $grand_total = 0;

                    foreach ($Detail as $value2) :
                        $harga_satuan = $value2['harga_satuan'];
                        $jumlah = $value2['harga_satuan'] * $value2['qty'] * $value2['termin_pembayaran'] / 100;

                        $grand_total += $jumlah;

                    ?>
                        <tr>
                            <td style="text-align:left;padding: 10px 10px 10px 10px;">
                                <?= $value2['qty'] . " " . $value2['unit']; ?>
                            </td>
                            <td style="text-align:left;padding: 10px 10px 10px 10px;">
                                <?= $value2['barang_nama']; ?><br>
                            </td>
                            <td style="text-align:right;padding: 10px 10px 10px 10px;">
                                IDR <?= format_rupiah($harga_satuan); ?>
                            </td>
                            <td style="text-align:right;padding: 10px 10px 10px 10px;">
                                IDR <?= format_rupiah($jumlah); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td style="text-align:center" rowspan="4" colspan="2">
                            <b>Terbilang :</b> <?= terbilang($grand_total + ($grand_total * 10 / 100) + ($grand_total * 2 / 100)) ?>
                        </td>
                        <td style="text-align:left">
                            Total
                        </td>
                        <td style="text-align:left">
                            IDR <?= format_rupiah($grand_total); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left">
                            PPn 10%
                        </td>
                        <td style="text-align:left;">
                            IDR <?= format_rupiah($grand_total * 10 / 100); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left">
                            PPh 2%
                        </td>
                        <td style="text-align:left;">
                            IDR <?= format_rupiah($grand_total * 2 / 100); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left">
                            Grand total
                        </td>
                        <td style="text-align:left;">
                            IDR <?= format_rupiah($grand_total + ($grand_total * 10 / 100) + ($grand_total * 2 / 100)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <thead>
                    <tr>
                        <td width="80%">
                            <b>Pembayaran harap ditransfer ke: </b>
                        </td>
                        <td style="text-align:center">
                            Hormat Kami,
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PT. Kreasi Teknik Unggul
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            A/C. 006-000-879-8799
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mandiri KCP Pemuda - Jakarta
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Perhatian : Barang-barang yang sudah dibeli tidak dapat ditukar / dikembalikan </b>
                        </td>
                        <td style="text-align:center">
                            ( Arief Koeswanto )
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

    <div class="clearfix"></div>
</div>
<!-- /page content -->