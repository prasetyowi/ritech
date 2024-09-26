<script type="text/javascript">
    $("#btn_update_pengguna").click(function() {

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
            url: "<?= base_url('OrangTua/update_orang_tua'); ?>",
            type: "POST",
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading ...',
                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                    timerProgressBar: false,
                    showConfirmButton: false
                });

                $("#btn_update_pengguna").prop("disabled", true);
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
                is_Aktif: 1
            },
            dataType: "JSON",
            success: function(response) {

                if (response.status == 1) {
                    var alert = "Data orang tua berhasil disimpan";
                    console.log(alert);
                } else {
                    var alert = "Data orang tua gagal disimpan";
                    console.log(alert);
                }

                $("#btn_update_pengguna").prop("disabled", false);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var alert = "Error 500 Internal Server Connection Failure";
                message_custom("Error", "error", alert);

                $("#btn_update_pengguna").prop("disabled", false);
            },
            complete: function() {
                // Swal.close();
                $("#btn_update_pengguna").prop("disabled", false);
            }
        });

        setTimeout(() => {

            $.ajax({
                url: "<?= base_url('Pengguna/update_pengguna_profile'); ?>",
                type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading ...',
                        html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                        timerProgressBar: false,
                        showConfirmButton: false
                    });

                    $("#btn_update_pengguna").prop("disabled", true);
                },
                data: {
                    pengguna_email: $("#pengguna_email").val(),
                    pengguna_password: $("#pengguna_password").val()
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.status == 1) {
                        var alert = "Data berhasil disimpan!";
                        message_custom("Success", "success", alert);

                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        var alert = "Data gagal disimpan!";
                        message_custom("Error", "error", alert);
                    }

                    $("#btn_update_pengguna").prop("disabled", false);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var alert = "Error 500 Internal Server Connection Failure";
                    message_custom("Error", "error", alert);

                    $("#btn_update_pengguna").prop("disabled", false);
                },
                complete: function() {
                    // Swal.close();
                    $("#btn_update_pengguna").prop("disabled", false);
                }
            });

        }, 1000);
    });
</script>