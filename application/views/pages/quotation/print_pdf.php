<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

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
    <div class="container body" style="margin-left:-25px;margin-top:-25px;">
        <div class="main_container">
            <div role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row" style="display: block;">
                        <?php foreach ($Header as $key => $value) : ?>
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    The Mansion Kemayoran<br>
                                    Bougenville - Tower Fontana <br>
                                    Jalan Trembesi D4, Lantai 21, Unit E1, Pademangan, Jakarta Utara 14410
                                    <table width="100%">
                                        <tr>
                                            <td colspan="5">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:15%;">
                                                <h6><b><u>QUOTATION</u></b></h6>
                                            </td>
                                            <td style="width:2%;"></td>
                                            <td style="width:35%;"></td>
                                            <td></td>
                                            <td class="right-align">
                                                Jakarta, <?= date('d M Y'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:15%;">
                                                Quotation
                                            </td>
                                            <td style="width:2%;">:</td>
                                            <td style="width:35%;">
                                                <?= $value['quotation_kode']; ?>
                                            </td>
                                            <td></td>
                                            <td class="right-align"></td>
                                        </tr>
                                        <tr>
                                            <td style="width:15%;">Kepada</td>
                                            <td style="width:2%;">:</td>
                                            <td style="width:35%;">
                                                <?= $value['customer_nama']; ?>
                                            </td>
                                            <td> </td>
                                            <td class="right-align"></td>
                                        </tr>
                                        <tr>
                                            <td style="width:15%;"></td>
                                            <td style="width:2%;"></td>
                                            <td style="width:35%;"></td>
                                            <td></td>
                                            <td class="right-align"></td>
                                        </tr>
                                    </table>
                                    Dengan hormat, <br><?php echo "Berikut kami sampaikan penawaran harga material clean room dengan spesifikasi sebagai berikut:"; ?>
                                    <br>
                                    <table class="table-bordered" width="100%" id="table_quotation">
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
                                                <tr style="background: #EFECEC;">
                                                    <td style=" text-align:center;padding-left: 5px;padding-right:5px;">
                                                        <?= $key2 + 1; ?>
                                                    </td>
                                                    <td style="text-align:left;padding-left: 5px;padding-right:5px;">
                                                        <?= $value2['barang_nama']; ?>
                                                    </td>
                                                    <td style="text-align:right;padding-left: 5px;padding-right:5px;">
                                                        <?= $value2['qty']; ?>
                                                    </td>
                                                    <td style="text-align:left;padding-left: 5px;padding-right:5px;">
                                                        <?= $value2['unit']; ?>
                                                    </td>
                                                    <td style="text-align:right;padding-left: 5px;padding-right:5px;">
                                                        <?= format_rupiah($value2['harga_satuan']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center;padding-left: 5px;padding-right:5px;"></td>
                                                    <td style="text-align:left;padding-left: 5px;padding-right:5px;">
                                                        <?php foreach ($barang_desc as $val_desc) {
                                                            echo $val_desc . "<br>";
                                                        } ?>
                                                    </td>
                                                    <td style="text-align:right;padding-left: 5px;padding-right:5px;"></td>
                                                    <td style="text-align:left;padding-left: 5px;padding-right:5px;"></td>
                                                    <td style="text-align:right;padding-left: 5px;padding-right:5px;"></td>
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
                                                <td><br><br><br> <u><?= $value['karyawan_nama']; ?></u><br>Mobile <?= $value['karyawan_telp']; ?> <br> Note: This letter is sent by email, no need signature for verification.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>