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
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <div>
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" id="email" placeholder="Email" required="" />
                        </div><br>
                        <div>
                            <input type="password" class="form-control" id="password" placeholder="Password" required="" />
                        </div><br>
                        <div>
                            <button class="btn btn-primary" id="btn_login">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <p class="change_link">Belum punya akun ?
                                <a href="#signup" class="to_register"> Buat Akun </a>
                            </p>
                            <p class="change_link">Lupa Password ?
                                <a href="<?= base_url('Auth/lupa_password') ?>" class="to_forget_password"> Lupa Password </a>
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

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <div>
                        <h1>Buat Akun</h1>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_id" name="orang_tua_id" placeholder=" Nomor Induk Kependudukan" required="" onkeyup="validateOnKeyUp(event,'orang_tua_id')" />
                            <p id="feedback-orang_tua_id"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_nama" name="orang_tua_nama" placeholder=" Nama" required="" onkeyup="validateOnKeyUp(event,'orang_tua_nama')" />
                            <p id="feedback-orang_tua_nama"></p>
                        </div><br>
                        <div>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder=" Nama" required="" onkeyup="validateOnKeyUp(event,'tgl_lahir')" />
                            <p id="feedback-tgl_lahir"></p>
                        </div><br>
                        <div>
                            <select class="form-control rounded-0" name="jenis_kelamin" id="jenis_kelamin" style="height:48px;" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_alamat" name="orang_tua_alamat" placeholder=" Alamat" required="" onkeyup="validateOnKeyUp(event,'orang_tua_alamat')" />
                            <p id="feedback-orang_tua_alamat"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_kelurahan" name="orang_tua_kelurahan" placeholder=" Kelurahan" required="" onkeyup="validateOnKeyUp(event,'orang_tua_kelurahan')" />
                            <p id="feedback-orang_tua_kelurahan"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_kecamatan" name="orang_tua_kecamatan" placeholder=" Kecamatan" required="" onkeyup="validateOnKeyUp(event,'orang_tua_kecamatan')" />
                            <p id="feedback-orang_tua_kecamatan"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_kota" name="orang_tua_kota" placeholder=" Kota" required="" onkeyup="validateOnKeyUp(event,'orang_tua_kota')" />
                            <p id="feedback-orang_tua_kota"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_provinsi" name="orang_tua_provinsi" placeholder=" Provinsi" required="" onkeyup="validateOnKeyUp(event,'orang_tua_provinsi')" />
                            <p id="feedback-orang_tua_provinsi"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_negara" name="orang_tua_negara" placeholder=" Negara" required="" onkeyup="validateOnKeyUp(event,'orang_tua_negara')" />
                            <p id="feedback-orang_tua_negara"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_kode_pos" name="orang_tua_kode_pos" placeholder=" Kode Pos" required="" onkeyup="validateOnKeyUp(event,'orang_tua_kode_pos')" />
                            <p id="feedback-orang_tua_kode_pos"></p>
                        </div><br>
                        <div>
                            <input type="text" class="form-control" id="orang_tua_telp" name="orang_tua_telp" placeholder=" No. Telp" required="" onkeyup="validateOnKeyUp(event,'orang_tua_telp')" />
                            <p id="feedback-orang_tua_telp"></p>
                        </div><br>
                        <div>
                            <input type="email" class="form-control" id="pengguna_email" name="pengguna_email" placeholder=" Email" required="" onkeyup="validateOnKeyUp(event,'pengguna_email')" />
                            <p id="feedback-pengguna_email"></p>
                        </div><br>
                        <div>
                            <input type="password" class="form-control" id="pengguna_password" name="pengguna_password" placeholder="Password" required="" onkeyup="validateOnKeyUp(event,'pengguna_password')" />
                            <p id="feedback-pengguna_password"></p>
                        </div><br>
                        <div>
                            <button class="btn btn-primary" id="btn_daftar">Daftar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah punya akun ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>
                            <p class="change_link">Lupa Password ?
                                <a href="<?= base_url('Auth/lupa_password') ?>" class="to_forget_password"> Lupa Password </a>
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

        $("#btn_login").click(function() {

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

            $.ajax({
                async: false,
                url: "<?= base_url('Auth/proses_login'); ?>",
                type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading ...',
                        html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                        timerProgressBar: false,
                        showConfirmButton: false
                    });

                    $("#btn_login").prop("disabled", true);
                },
                data: {
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.status == 1) {
                        if (response.level == "orang tua") {
                            location.href = "<?= base_url() ?>MainApp/MainMenu";
                        } else if (response.level == "administrator") {
                            location.href = "<?= base_url() ?>Dashboard";
                        }
                    } else {
                        var alert = "Email dan Password Salah!";
                        message_custom("Error", "error", alert);
                    }

                    $("#btn_login").prop("disabled", false);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var alert = "Error 500 Internal Server Connection Failure";
                    message_custom("Error", "error", alert);

                    $("#btn_login").prop("disabled", false);
                },
                complete: function() {
                    // Swal.close();
                    $("#btn_login").prop("disabled", false);
                }
            });
        });

        $("#btn_daftar").click(function() {

            // console.log(arr_list_faktur_klaim);

            if ($("#orang_tua_id").val() == "") {

                let alert = "Nomor Induk Kependudukan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_nama").val() == "") {

                let alert = "Nama Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#tgl_lahir").val() == "") {

                let alert = "Tanggal Lahir Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_alamat").val() == "") {

                let alert = "Alamat Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_kelurahan").val() == "") {

                let alert = "Kelurahan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_kecamatan").val() == "") {

                let alert = "Kecamatan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_kota").val() == "") {

                let alert = "Kota Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_provinsi").val() == "") {

                let alert = "Provinsi Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_negara").val() == "") {

                let alert = "Negara Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_kode_pos").val() == "") {

                let alert = "Kode Pos Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_telp").val() == "") {

                let alert = "Kelurahan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#orang_tua_kelurahan").val() == "") {

                let alert = "Kelurahan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#pengguna_email").val() == "") {

                let alert = "Email Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#pengguna_password").val() == "") {

                let alert = "Password Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            $.ajax({
                async: false,
                url: "<?= base_url('Auth/proses_register'); ?>",
                type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading ...',
                        html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                        timerProgressBar: false,
                        showConfirmButton: false
                    });

                    $("#btn_daftar").prop("disabled", true);
                },
                data: {
                    orang_tua_id: $("#orang_tua_id").val(),
                    orang_tua_nama: $("#orang_tua_nama").val(),
                    tgl_lahir: $("#tgl_lahir").val(),
                    jenis_kelamin: $("#jenis_kelamin").val(),
                    orang_tua_alamat: $("#orang_tua_alamat").val(),
                    orang_tua_kelurahan: $("#orang_tua_kelurahan").val(),
                    orang_tua_kecamatan: $("#orang_tua_kecamatan").val(),
                    orang_tua_kota: $("#orang_tua_kota").val(),
                    orang_tua_provinsi: $("#orang_tua_provinsi").val(),
                    orang_tua_negara: $("#orang_tua_negara").val(),
                    orang_tua_kode_pos: $("#orang_tua_kode_pos").val(),
                    orang_tua_telp: $("#orang_tua_telp").val(),
                    pengguna_email: $("#pengguna_email").val(),
                    pengguna_password: $("#pengguna_password").val()
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.status == 1) {
                        var alert = "Pendaftaran Berhasil";
                        message_custom("Success", "success", alert);

                        setTimeout(() => {
                            locaion.href = "<?= base_url() ?>/Auth/login#signin"
                        }, 1000);
                    } else if (response.status == 2) {
                        var alert = "Nomor Induk Kependudukan Sudah Ada!";
                        message_custom("Error", "error", alert);
                    } else if (response.status == 3) {
                        var alert = "Email Sudah Ada!";
                        message_custom("Error", "error", alert);
                    } else {
                        var alert = "Pendaftaran Gagal!";
                        message_custom("Error", "error", alert);
                    }

                    $("#btn_daftar").prop("disabled", false);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var alert = "Error 500 Internal Server Connection Failure";
                    message_custom("Error", "error", alert);

                    $("#btn_daftar").prop("disabled", false);
                },
                complete: function() {
                    // Swal.close();
                    $("#btn_daftar").prop("disabled", false);
                }
            });
        });

        function sanitizeInput(input) {
            const dangerousChars = /[<>{}[\]'"\/\\;=%&$|`]/g;
            return input.replace(dangerousChars, "");
        }

        function validateInput(input) {
            const pattern = /^[a-zA-Z0-9\s]*$/;
            return pattern.test(input);
        }

        function validateOnKeyUp(event, idx) {
            const inputField = event.target;
            let sanitizedValue = sanitizeInput(inputField.value);
            inputField.value = sanitizedValue; // Apply sanitization directly

            const isValid = validateInput(sanitizedValue);
            const feedback = document.getElementById("feedback-" + idx);

            if (isValid) {
                feedback.textContent = "";
                feedback.style.color = "";
            } else {
                feedback.textContent = "Input tidak valid! Hanya huruf, angka, dan spasi yang diizinkan.";
                feedback.style.color = "red";
            }
        }
    </script>
</body>

</html>