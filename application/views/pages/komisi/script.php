<script type="text/javascript">
    $('#btn_search_komisi').click(function(event) {
        Get_komisi_by_filter();
    });

    <?php if (isset($act)) { ?>
        <?php if ($act == "edit" || $act == "detail") { ?>
            if ($("#Komisi-komisi_status").val() != "Draft") {
                location.href = "<?= base_url() ?>Komisi/detail/?id=" + $("#komisi_id").val();
            }
        <?php } ?>
    <?php } ?>

    function Get_komisi_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Komisi/Get_komisi_by_filter') ?>",
            data: {
                tgl: $("#filter_tanggal_komisi").val(),
                status: $("#filter_status").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_komisi').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_komisi > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_komisi')) {
                        $('#table_list_komisi').DataTable().clear();
                        $('#table_list_komisi').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {

                            if (v.komisi_status == "Applied" || v.komisi_status == "Canceled") {
                                $("#table_list_komisi > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="text-center">${i+1}</td>
                                        <td class="text-left">${v.komisi_id}</td>
                                        <td class="text-left">${v.tanggal_pembayaran}</td>
                                        <td class="text-left">${v.karyawan_nama}</td>
                                        <td class="text-left">${formatRupiah(v.jumlah)}</td>
                                        <td class=" ">
                                            <a href="<?= base_url() ?>Komisi/detail/?id=${v.komisi_id}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                `);

                            } else {
                                $("#table_list_komisi > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="text-center">${i+1}</td>
                                        <td class="text-left">${v.komisi_id}</td>
                                        <td class="text-left">${v.tanggal_pembayaran}</td>
                                        <td class="text-left">${v.karyawan_nama}</td>
                                        <td class="text-left">${formatRupiah(v.jumlah)}</td>
                                        <td class=" ">
                                            <a href="<?= base_url() ?>Komisi/edit/?id=${v.komisi_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_komisi").DataTable({
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

    $("#btn_simpan_komisi").click(function() {
        cek_error = 0;

        if ($("#Komisi-nama_project").val() == "") {

            let alert = "Nama Project Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-karyawan_id").val() == "") {

            let alert = "Karyawan Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-tanggal_pembayaran").val() == "") {

            let alert = "Tanggal Pembayaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#Komisi-jumlah").val().replaceAll(",", "")) <= 0) {

            let alert = "Jumlah Komisi Tidak Boleh 0";
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
                        url: "<?= base_url('Komisi/insert_komisi'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_simpan_komisi").prop("disabled", true);
                        },
                        data: {
                            komisi_id: $("#Komisi-komisi_id").val(),
                            komisi_tanggal: $("#Komisi-komisi_tanggal").val(),
                            karyawan_id: $("#Komisi-karyawan_id").val(),
                            nama_project: $("#Komisi-nama_project").val(),
                            tanggal_pembayaran: $("#Komisi-tanggal_pembayaran").val(),
                            jumlah: $("#Komisi-jumlah").val().replaceAll(".", ""),
                            komisi_status: "Draft",
                            updwho: "",
                            updtgl: ""
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>Komisi";
                                }, 500);

                                ResetForm();
                            } else if (response.status == "2") {

                                var msg = "No komisi " + $('#komisi_id').val() + " Sudah Ada";
                                message_custom("Error", "error", alert);
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_simpan_komisi").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_simpan_komisi").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_simpan_komisi").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_update_komisi").click(function() {
        cek_error = 0;

        if ($("#Komisi-nama_project").val() == "") {

            let alert = "Nama Project Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-karyawan_id").val() == "") {

            let alert = "Karyawan Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-tanggal_pembayaran").val() == "") {

            let alert = "Tanggal Pembayaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#Komisi-jumlah").val().replaceAll(",", "")) <= 0) {

            let alert = "Jumlah Komisi Tidak Boleh 0";
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
                        url: "<?= base_url('Komisi/update_komisi'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_update_komisi").prop("disabled", true);
                            $("#btn_konfirmasi_komisi").prop("disabled", true);
                            $("#btn_cancel_komisi").prop("disabled", true);
                        },
                        data: {
                            komisi_id: $("#Komisi-komisi_id").val(),
                            komisi_tanggal: $("#Komisi-komisi_tanggal").val(),
                            karyawan_id: $("#Komisi-karyawan_id").val(),
                            nama_project: $("#Komisi-nama_project").val(),
                            tanggal_pembayaran: $("#Komisi-tanggal_pembayaran").val(),
                            jumlah: $("#Komisi-jumlah").val().replaceAll(".", ""),
                            komisi_status: "Draft",
                            updwho: $('#updwho').val(),
                            updtgl: $('#updtgl').val()
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>Komisi";
                                }, 500);

                                ResetForm();
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_konfirmasi_komisi").click(function() {
        cek_error = 0;

        if ($("#Komisi-nama_project").val() == "") {

            let alert = "Nama Project Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-karyawan_id").val() == "") {

            let alert = "Karyawan Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Komisi-tanggal_pembayaran").val() == "") {

            let alert = "Tanggal Pembayaran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if (parseInt($("#Komisi-jumlah").val().replaceAll(",", "")) <= 0) {

            let alert = "Jumlah Komisi Tidak Boleh 0";
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
                        url: "<?= base_url('Komisi/update_komisi'); ?>",
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                timerProgressBar: false,
                                showConfirmButton: false
                            });

                            $("#btn_update_komisi").prop("disabled", true);
                            $("#btn_konfirmasi_komisi").prop("disabled", true);
                            $("#btn_cancel_komisi").prop("disabled", true);
                        },
                        data: {
                            komisi_id: $("#Komisi-komisi_id").val(),
                            komisi_tanggal: $("#Komisi-komisi_tanggal").val(),
                            karyawan_id: $("#Komisi-karyawan_id").val(),
                            nama_project: $("#Komisi-nama_project").val(),
                            tanggal_pembayaran: $("#Komisi-tanggal_pembayaran").val(),
                            jumlah: $("#Komisi-jumlah").val().replaceAll(".", ""),
                            komisi_status: "Applied",
                            updwho: "",
                            updtgl: ""
                        },
                        dataType: "JSON",
                        success: function(response) {

                            if (response.status == 1) {
                                var alert = "Data Berhasil Disimpan";
                                message_custom("Success", "success", alert);
                                setTimeout(() => {
                                    location.href = "<?= base_url() ?>Komisi";
                                }, 500);

                                ResetForm();
                            } else {
                                var alert = "Data Gagal Disimpan";
                                message_custom("Error", "error", alert);
                            }

                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var alert = "Error 500 Internal Server Connection Failure";
                            message_custom("Error", "error", alert);

                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        },
                        complete: function() {
                            // Swal.close();
                            $("#btn_update_komisi").prop("disabled", false);
                            $("#btn_konfirmasi_komisi").prop("disabled", false);
                            $("#btn_cancel_komisi").prop("disabled", false);
                        }
                    });
                }
            });

        }
    });

    $("#btn_cancel_komisi").click(function() {
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
                    url: "<?= base_url('Komisi/update_komisi'); ?>",
                    type: "POST",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_update_komisi").prop("disabled", true);
                        $("#btn_konfirmasi_komisi").prop("disabled", true);
                        $("#btn_cancel_komisi").prop("disabled", true);
                    },
                    data: {
                        komisi_id: $("#Komisi-komisi_id").val(),
                        komisi_tanggal: $("#Komisi-komisi_tanggal").val(),
                        karyawan_id: $("#Komisi-karyawan_id").val(),
                        nama_project: $("#Komisi-nama_project").val(),
                        tanggal_pembayaran: $("#Komisi-tanggal_pembayaran").val(),
                        jumlah: $("#Komisi-jumlah").val().replaceAll(".", ""),
                        komisi_status: "Canceled",
                        updwho: "",
                        updtgl: ""
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            setTimeout(() => {
                                location.href = "<?= base_url() ?>Komisi";
                            }, 500);

                            ResetForm();
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_update_komisi").prop("disabled", false);
                        $("#btn_konfirmasi_komisi").prop("disabled", false);
                        $("#btn_cancel_komisi").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_update_komisi").prop("disabled", false);
                        $("#btn_konfirmasi_komisi").prop("disabled", false);
                        $("#btn_cancel_komisi").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_update_komisi").prop("disabled", false);
                        $("#btn_konfirmasi_komisi").prop("disabled", false);
                        $("#btn_cancel_komisi").prop("disabled", false);
                    }
                });
            }
        });
    });


    var jumlah = document.getElementById('Komisi-jumlah');
    jumlah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        jumlah.value = formatRupiah(this.value);

        console.log(formatRupiah(this.value));
    });
</script>