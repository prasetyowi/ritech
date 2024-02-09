<script type="text/javascript">
    $('#btn_search_pengeluaran_kas').click(function(event) {
        Get_pengeluaran_kas_by_filter();
    });

    <?php if (isset($act)) { ?>
        <?php if ($act == "edit" || $act == "detail") { ?>
            if ($("#status").val() != "Draft") {
                location.href = "<?= base_url() ?>PengeluaranKas/detail/?id=" + $("#kas_id").val();
            }
        <?php } ?>
    <?php } ?>

    function Get_pengeluaran_kas_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('PengeluaranKas/Get_pengeluaran_kas_by_filter') ?>",
            data: {
                tgl: $("#filter_tanggal_kas").val(),
                no_akun: $("#filter_no_akun").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_pengeluaran_kas').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_pengeluaran_kas > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_pengeluaran_kas')) {
                        $('#table_list_pengeluaran_kas').DataTable().clear();
                        $('#table_list_pengeluaran_kas').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {

                            if (v.kas_status == "Applied" || v.kas_status == "Canceled") {
                                $("#table_list_pengeluaran_kas > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="text-center">${i+1}</td>
                                        <td class="text-left">${v.kas_id}</td>
                                        <td class="text-left">${v.kas_tanggal}</td>
                                        <td class="text-left">${v.kas_no_akun}</td>
                                        <td class="text-left">${v.no_po}</td>
                                        <td class="text-left">${v.customer_nama}</td>
                                        <td class="text-left">${v.kas_keterangan}</td>
                                        <td class="text-left">${v.kas_no_rekening}</td>
                                        <td class="text-right">${v.kas_jumlah}</td>
                                        <td class=" ">
                                            <a href="<?= base_url() ?>PengeluaranKas/detail/?id=${v.kas_id}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                `);

                            } else {
                                $("#table_list_pengeluaran_kas > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="text-center">${i+1}</td>
                                        <td class="text-left">${v.kas_id}</td>
                                        <td class="text-left">${v.kas_tanggal}</td>
                                        <td class="text-left">${v.kas_no_akun}</td>
                                        <td class="text-left">${v.no_po}</td>
                                        <td class="text-left">${v.customer_nama}</td>
                                        <td class="text-left">${v.kas_keterangan}</td>
                                        <td class="text-left">${v.kas_no_rekening}</td>
                                        <td class="text-right">${v.kas_jumlah}</td>
                                        <td class=" ">
                                            <a href="<?= base_url() ?>PengeluaranKas/edit/?id=${v.kas_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_pengeluaran_kas").DataTable({
                            lengthMenu: [
                                [50, 100, 200, -1],
                                [50, 100, 200, 'All'],
                            ],
                        });
                    }
                });
            }
        });
    }

    $("#btn_simpan_pengeluaran_kas").click(function() {
        cek_error = 0;

        if ($("#akun").val() == "") {

            let alert = "Akun Pengeluaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#jumlah").val()) <= 0) {

            let alert = "Jumlah Nominal Tidak Boleh 0";
            message_custom("Error", "error", alert);

            return false;
        }

        if (cek_error == 0) {

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Pastikan data yang sudah anda input benar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.value == true) {

                    $.ajax({
                        async: false,
                        url: "<?= base_url('PengeluaranKas/insert_pengeluaran_kas'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_simpan_pengeluaran_kas").prop("disabled", true);
                        },
                        data: {
                            kas_id: $('#kas_id').val(),
                            kas_tanggal: $('#tanggal_pengeluaran').val(),
                            tipe_kas: "Out",
                            kas_no_akun: $('#akun').val(),
                            kas_keterangan: $('#desc').val(),
                            kas_no_rekening: $('#no_rekening').val(),
                            kas_jumlah: $('#jumlah').val(),
                            kas_status: "Draft",
                            updwho: "",
                            updtgl: "",
                            customer_id: $('#customer_id').val(),
                            no_po: $('#no_po').val()
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>PengeluaranKas";
                                }, 500);

                                ResetForm();
                            } else if (response.status == "2") {

                                var msg = "No Kas " + $('#kas_id').val() + " Sudah Ada";
                                message_custom("Error", "error", alert);
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_simpan_pengeluaran_kas").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_simpan_pengeluaran_kas").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_simpan_pengeluaran_kas").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_update_pengeluaran_kas").click(function() {
        cek_error = 0;

        if ($("#akun").val() == "") {

            let alert = "Akun Pengeluaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#jumlah").val()) <= 0) {

            let alert = "Jumlah Nominal Tidak Boleh 0";
            message_custom("Error", "error", alert);

            return false;
        }

        if (cek_error == 0) {

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Pastikan data yang sudah anda input benar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.value == true) {

                    $.ajax({
                        async: false,
                        url: "<?= base_url('PengeluaranKas/update_pengeluaran_kas'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_update_pengeluaran_kas").prop("disabled", true);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", true);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", true);
                        },
                        data: {
                            kas_id: $('#kas_id').val(),
                            kas_tanggal: $('#tanggal_pengeluaran').val(),
                            tipe_kas: "Out",
                            kas_no_akun: $('#akun').val(),
                            kas_keterangan: $('#desc').val(),
                            kas_no_rekening: $('#no_rekening').val(),
                            kas_jumlah: $('#jumlah').val(),
                            kas_status: "Draft",
                            updwho: $('#updwho').val(),
                            updtgl: $('#updtgl').val(),
                            customer_id: $('#customer_id').val(),
                            no_po: $('#no_po').val()
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>PengeluaranKas";
                                }, 500);

                                ResetForm();
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_konfirmasi_pengeluaran_kas").click(function() {
        cek_error = 0;

        if ($("#akun").val() == "") {

            let alert = "Akun Pengeluaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#jumlah").val()) <= 0) {

            let alert = "Jumlah Nominal Tidak Boleh 0";
            message_custom("Error", "error", alert);

            return false;
        }

        if (cek_error == 0) {

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Pastikan data yang sudah anda input benar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.value == true) {

                    $.ajax({
                        async: false,
                        url: "<?= base_url('PengeluaranKas/update_pengeluaran_kas'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_update_pengeluaran_kas").prop("disabled", true);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", true);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", true);
                        },
                        data: {
                            kas_id: $('#kas_id').val(),
                            kas_tanggal: $('#tanggal_pengeluaran').val(),
                            tipe_kas: "Out",
                            kas_no_akun: $('#akun').val(),
                            kas_keterangan: $('#desc').val(),
                            kas_no_rekening: $('#no_rekening').val(),
                            kas_jumlah: $('#jumlah').val(),
                            kas_status: "Applied",
                            updwho: $('#updwho').val(),
                            updtgl: $('#updtgl').val(),
                            customer_id: $('#customer_id').val(),
                            no_po: $('#no_po').val()
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>PengeluaranKas";
                                }, 500);

                                ResetForm();
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_cancel_pengeluaran_kas").click(function() {
        cek_error = 0;

        if ($("#akun").val() == "") {

            let alert = "Akun Pengeluaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#jumlah").val()) <= 0) {

            let alert = "Jumlah Nominal Tidak Boleh 0";
            message_custom("Error", "error", alert);

            return false;
        }

        if (cek_error == 0) {

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Pastikan data yang sudah anda input benar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.value == true) {

                    $.ajax({
                        async: false,
                        url: "<?= base_url('PengeluaranKas/update_pengeluaran_kas'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_update_pengeluaran_kas").prop("disabled", true);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", true);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", true);
                        },
                        data: {
                            kas_id: $('#kas_id').val(),
                            kas_tanggal: $('#tanggal_pengeluaran').val(),
                            tipe_kas: "Out",
                            kas_no_akun: $('#akun').val(),
                            kas_keterangan: $('#desc').val(),
                            kas_no_rekening: $('#no_rekening').val(),
                            kas_jumlah: $('#jumlah').val(),
                            kas_status: "Canceled",
                            updwho: $('#updwho').val(),
                            updtgl: $('#updtgl').val(),
                            customer_id: $('#customer_id').val(),
                            no_po: $('#no_po').val()
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>PengeluaranKas";
                                }, 500);

                                ResetForm();
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_update_pengeluaran_kas").prop("disabled", false);
                            $("#btn_konfirmasi_pengeluaran_kas").prop("disabled", false);
                            $("#btn_cancel_pengeluaran_kas").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    Dropzone.autoDiscover = false;

    var foto_upload = new Dropzone(".dropzone", {
        url: "<?php echo base_url('PengeluaranKas/proses_upload') ?>",
        maxFiles: 1,
        maxFilesize: 20,
        method: "post",
        acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
        paramName: "userfile",
        dictInvalidFileType: "Type file ini tidak dizinkan",
        addRemoveLinks: true,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
        }
    });

    //Event ketika Memulai mengupload
    foto_upload.on("sending", function(a, b, c) {
        a.kas_id = $('#kas_id').val();
        a.token = Math.random();
        c.append("kas_id", a.kas_id);
        c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
    });

    //Event ketika foto dihapus
    foto_upload.on("removedfile", function(a) {
        var token = a.token;
        $.ajax({
            type: "post",
            data: {
                token: token
            },
            url: "<?php echo base_url('PengeluaranKas/hapus_file') ?>",
            cache: false,
            dataType: 'json',
            success: function() {
                console.log("Foto terhapus");
            },
            error: function() {
                console.log("Error");

            }
        });
    });
</script>