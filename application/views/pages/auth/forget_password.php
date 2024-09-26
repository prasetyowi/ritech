<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RITECH</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>/assets/build/css/custom.min.css" rel="stylesheet">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="login">
    <div>

        <div class="login_wrapper">

            <div>
                <section class="login_content">
                    <div>
                        <h1>Lupa Password</h1>
                        <div>
                            <input type="email" class="form-control" id="email" name="email" placeholder=" Email" required="" />
                        </div><br>
                        <div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" />
                        </div><br>
                        <div>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password" required="" />
                        </div><br>
                        <div>
                            <button class="btn btn-primary" id="btn_lupa_password">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah punya akun ?
                                <a href="<?= base_url('Auth/login') ?>" class="to_register"> Log in </a>
                            </p>
                            <p class="change_link">Belum punya akun ?
                                <a href="<?= base_url('Auth/login') ?>" class="to_register"> Buat Akun </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-home"></i> RSUD Dungus</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function message_custom(titleType, iconType, htmlType) {
            Swal.fire({
                title: titleType,
                icon: iconType,
                html: htmlType,
            });
        }

        $("#btn_lupa_password").click(function() {

            // console.log(arr_list_faktur_klaim);

            if ($("#email").val() == "") {

                let alert = "Email Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#password").val() == "") {

                let alert = "Password Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#password").val() != $("#password_confirm").val()) {

                let alert = "Password Tidak Sama";
                message_custom("Error", "error", alert);

                return false;
            }

            $.ajax({
                async: false,
                url: "<?= base_url('Auth/forget_password'); ?>",
                type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading ...',
                        html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                        timerProgressBar: false,
                        showConfirmButton: false
                    });

                    $("#btn_lupa_password").prop("disabled", true);
                },
                data: {
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.status == 1) {
                        var alert = "Password berhasil diganti!";
                        message_custom("Success", "success", alert);

                        setTimeout(() => {
                            location.href = "<?= base_url('Auth/login') ?>";

                        }, 1000);
                    } else if (response.status == 2) {
                        var alert = "Email tidak ada!";
                        message_custom("Error", "error", alert);
                    } else {
                        var alert = "Password gagal diganti!";
                        message_custom("Error", "error", alert);
                    }

                    $("#btn_lupa_password").prop("disabled", false);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var alert = "Error 500 Internal Server Connection Failure";
                    message_custom("Error", "error", alert);

                    $("#btn_lupa_password").prop("disabled", false);
                },
                complete: function() {
                    // Swal.close();
                    $("#btn_lupa_password").prop("disabled", false);
                }
            });
        });
    </script>
</body>

</html>