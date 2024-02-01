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
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <?php foreach ($Header as $value) : ?>
                                    <table width="100%">
                                        <tr>
                                            <td colspan="2" style="text-align: left;width:50%;">
                                                <h5> <?php echo "PT. Kreasi Teknik Unggul"; ?></h5>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: center;width:40%" colspan="3">
                                                <h5>Surat Jalan</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;width:50%;"><b>Ship to:</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style=" text-align:right;width:20%;"><b>No. SJ/DO</b></td>
                                            <td style="text-align:center;width:5%;">:</td>
                                            <td style="text-align: left;width:20%;"><?= $value['pembelian_kode']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;width:50%;"><?= $value['customer_nama']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;width:20%;"><b>Tanggal SJ/DO</b></td>
                                            <td style="text-align:center;width:5%;">:</td>
                                            <td style="text-align: left;width:25%;"><?= $value['pembelian_tanggal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;width:50%;">
                                                <?= $value['customer_alamat'] . ", " ?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;width:20%;"><b>No. PO</b></td>
                                            <td style="text-align:center;width:5%;">:</td>
                                            <td style="text-align: left;width:25%;"><?= $value['pembelian_no_po'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;width:50%;">
                                                <?= $value['customer_kelurahan'] . ", " . $value['customer_kecamatan'] . ", " . $value['customer_kota'] . ", " . $value['customer_provinsi'] . ", " . $value['customer_kode_pos'] ?>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;width:20%;"><b>PIC</b></td>
                                            <td style="text-align:center;width:5%;">:</td>
                                            <td style="text-align: left;width:25%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;width:50%;"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;width:20%;"><b>Oleh</b></td>
                                            <td style="text-align:center;width:5%;">:</td>
                                            <td style="text-align: left;width:25%;"></td>
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
                                                <td style="text-align:center;padding-left:10px;padding-right:10px;"><?= $key + 1 ?></td>
                                                <td style="text-align:left;padding-left:10px;padding-right:10px;"><?= $value['barang_nama'] ?></td>
                                                <td style="text-align:right;padding-left:10px;padding-right:10px;"><?= $value['qty'] ?></td>
                                                <td style="text-align:left;padding-left:10px;padding-right:10px;"><?= $value['unit'] ?></td>
                                                <td style="text-align:left;padding-left:10px;padding-right:10px;"><?= $value['remarks'] ?></td>
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
                                            <td style="text-align:center"></td>
                                            <td style="text-align:center" width="60%"></td>
                                            <td style="text-align:center"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center"><br><br><br></td>
                                            <td style="text-align:center" width="60%"></td>
                                            <td style="text-align:center"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">Hendry</td>
                                            <td style="text-align:center" width="60%"></td>
                                            <td style="text-align:center"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">
                                                <hr>
                                            </td>
                                            <td style="text-align:center" width="60%"></td>
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

                </div>
            </div>
        </div>
    </div>
</body>

</html>