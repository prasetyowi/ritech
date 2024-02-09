<?php
$ppn = 0;
$pph = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ritech | Cetak Invoice</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?= base_url() ?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?= base_url() ?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?= base_url() ?>assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?= base_url() ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?= base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Dropzone.js -->
    <link href="<?= base_url() ?>assets/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comic%20Sans%20MS">


    <style>
        body {
            font-family: 'Comic Sans MS', cursive;
            color: black;
        }

        .right-align {
            text-align: right;
        }
    </style>

</head>

<body style="background: white;">
    <div class="container body" style="margin-left:-20px;margin-top:-25px;">
        <div class="main_container">
            <div role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row" style="display: block;">
                        <div class="col-md-12 col-sm-12">

                            <?php foreach ($Header as $value) : ?>
                                <table width="100%">
                                    <tr>
                                        <td style="text-align: left;width:50%">
                                            <h5> <?php echo "PT. Kreasi Teknik Unggul"; ?></h5>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: left;width:45%">
                                            <h5>INVOICE</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:50%;font-size: 10px;">
                                            <?php echo "The Mansion Kemayoran Bougenville - Tower Fontana Lt. 21 unit E1"; ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: left;width:45%">
                                            Kepada Yth. :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:50%;font-size: 10px;">
                                            <?php echo "Jl. Trembesi D4, RT 009, RW 011, Jakarta Utara, DKI Jakarta"; ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: left;width:45%">
                                            <?= $value['customer_nama'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:45%;"></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: left;width:45%">
                                            <?= $value['customer_alamat'] . ", " . $value['customer_kelurahan'] . ", " . $value['customer_kecamatan'] . ", " . $value['customer_kota'] . ", " . $value['customer_provinsi'] . ", " . $value['customer_kode_pos'] ?>
                                        </td>
                                    </tr>
                                </table>
                                <table style="width:100%;margin-top:-50px;">
                                    <tr>
                                        <td style="text-align: left;width:20%;">No. Invoice</td>
                                        <td width="1%">:</td>
                                        <td><?= $value['penjualan_kode'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:20%;">Tanggal Invoice</td>
                                        <td>:</td>
                                        <td><?= $value['penjualan_tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:20%;">No. PO</td>
                                        <td>:</td>
                                        <td><?= $value['penjualan_no_po'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:20%;">Tanggal faktur PPn</td>
                                        <td>:</td>
                                        <td><?= $value['tanggal_faktur'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;width:20%;">No. Faktur PPn</td>
                                        <td>:</td>
                                        <td><?= $value['no_faktur'] ?></td>
                                    </tr>
                                </table>
                                <br>
                                <table class="table-bordered" width="100%" id="table_item_invoice" style="font-size: 12px;">
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
                                                <td colspan="4" style="text-align:center;color:black;background-color:#2E97A7;color:white"><?= ucfirst($value2['keterangan']); ?> (<?= $value2['termin_pembayaran']; ?>%), Down Payment
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
                                                <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                    <?= $value2['qty'] . " " . $value2['unit']; ?>
                                                </td>
                                                <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                    <?= $value2['barang_nama']; ?><br>
                                                </td>
                                                <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                    IDR <?= format_rupiah($harga_satuan); ?>
                                                </td>
                                                <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                    IDR <?= format_rupiah($jumlah); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <?php
                                            $ppn = $value['is_ppn'] == "1" ? ($grand_total * $nilai_var_ppn / 100) : 0;
                                            $pph = $value['is_pph'] == "1" ? ($grand_total * $nilai_var_pph / 100) : 0;
                                            ?>
                                            <td style="text-align:center" rowspan="4" colspan="2">
                                                <b>Terbilang :</b> <?= terbilang($grand_total + $ppn + $pph) ?>
                                            </td>
                                            <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                Total
                                            </td>
                                            <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                IDR <?= format_rupiah($grand_total); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                PPn <?= $nilai_var_ppn ?>%
                                            </td>
                                            <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                IDR <?= format_rupiah($ppn); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                PPh <?= $nilai_var_pph ?>%
                                            </td>
                                            <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                IDR <?= format_rupiah($pph); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left;padding-left:10px;padding-right:10px;">
                                                Grand total
                                            </td>
                                            <td style="text-align:right;padding-left:10px;padding-right:10px;">
                                                IDR <?= format_rupiah($grand_total + $ppn + $pph); ?>
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
                                                ( <?= $value['karyawan_nama'] ?> )
                                            </td>
                                        </tr>
                                    </thead>
                                </table>

                            <?php endforeach; ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <!-- /page content -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>