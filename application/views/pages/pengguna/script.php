<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_pengguna_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_pengguna_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_pengguna_termin();
    });

    $('#btn_search_pengguna').click(function(event) {
        Get_pengguna_by_filter();
    });

    function Get_pengguna_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('Pengguna/Get_pengguna_by_filter') ?>",
            data: {
                pengguna: $("#filter_nama_pengguna").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_pengguna').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_pengguna > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_pengguna')) {
                        $('#table_list_pengguna').DataTable().clear();
                        $('#table_list_pengguna').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.is_aktif == '1') {
                                $("#table_list_pengguna > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.pengguna_id}</td>
                                        <td class=" ">${v.pengguna_username}</td>
                                        <td class=" ">${v.pengguna_email}</td>
                                        <td class=" ">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowpenggunaDetail('${v.pengguna_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            } else {

                                $("#table_list_pengguna > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.pengguna_id}</td>
                                        <td class=" ">${v.pengguna_username}</td>
                                        <td class=" ">${v.pengguna_email}</td>
                                        <td class=" ">
                                            <span class="badge badge-danger">Not Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowpenggunaDetail('${v.pengguna_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_pengguna").DataTable({
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

    $('#btn_tambah_pengguna').click(function(event) {
        $("#modal-pengguna").modal('show');
    });

    function ShowpenggunaDetail(pengguna_id) {

        $("#modal-pengguna-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('Pengguna/Get_all_pengguna_by_id') ?>",
            data: {
                id: pengguna_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {

                        $("#Pengguna-pengguna_id-edit").val(v.pengguna_id);
                        $("#Pengguna-pengguna_username-edit").val(v.pengguna_username);
                        $("#Pengguna-pengguna_email-edit").val(v.pengguna_email);
                        $("#Pengguna-password-edit").val(v.pengguna_password);
                        $("#Pengguna-perusahaan_id-edit").val(v.pengguna_perusahaan).trigger('change');
                        $("#Pengguna-karyawan_id-edit").val(v.karyawan_id).trigger('change');

                        if (v.is_aktif == "1") {
                            $("#is_aktif-edit").prop("checked", true);
                        } else {
                            $("#is_aktif-edit").prop("checked", false);

                        }
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#Pengguna-pengguna_id-edit").val('');
                        $("#Pengguna-pengguna_username-edit").val('');
                        $("#Pengguna-pengguna_email-edit").val('');
                        $("#Pengguna-password-edit").val('');
                        $("#Pengguna-perusahaan_id-edit").val('').trigger('change');
                        $("#Pengguna-karyawan_id-edit").val('').trigger('change');
                        $("#is_aktif-edit").prop("checked", false);
                    });

                }
            }
        });

    }

    $("#btn_save_pengguna").click(function() {

        if ($("#Pengguna-pengguna_username").val() == "") {

            let alert = "Pengguna Username Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-pengguna_email").val() == "") {

            let alert = "Email Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-password").val() == "") {

            let alert = "Password Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

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
                    url: "<?= base_url('Pengguna/insert_pengguna'); ?>",
                    type: "POST",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_simpan_pengguna").prop("disabled", true);
                    },
                    data: {
                        pengguna_id: "",
                        pengguna_username: $("#Pengguna-pengguna_username").val(),
                        pengguna_password: $("#Pengguna-password").val(),
                        pengguna_perusahaan: $("#Pengguna-perusahaan_id").val(),
                        karyawan_id: $("#Pengguna-karyawan_id").val(),
                        add_by: "",
                        updwho: "",
                        updtgl: "",
                        is_aktif: $('#is_aktif:checked').val(),
                        pengguna_email: $("#Pengguna-pengguna_email").val(),
                        is_delete: ""
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            $("#modal-pengguna").modal('hide');
                            Get_pengguna_by_filter();

                            ResetForm();
                        } else if (response.status == 2) {
                            var alert = response.data;
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_simpan_pengguna").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_simpan_pengguna").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_simpan_pengguna").prop("disabled", false);
                    }
                });
            }
        });
    });

    $("#btn_update_pengguna").click(function() {

        if ($("#Pengguna-pengguna_username-edit").val() == "") {

            let alert = "Pengguna Username Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-pengguna_email-edit").val() == "") {

            let alert = "Email Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-password-edit").val() == "") {

            let alert = "Password Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

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
                    url: "<?= base_url('Pengguna/update_pengguna'); ?>",
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
                        pengguna_id: $("#Pengguna-pengguna_id-edit").val(),
                        pengguna_username: $("#Pengguna-pengguna_username-edit").val(),
                        pengguna_password: $("#Pengguna-password-edit").val(),
                        pengguna_perusahaan: $("#Pengguna-perusahaan_id-edit").val(),
                        karyawan_id: $("#Pengguna-karyawan_id-edit").val(),
                        add_by: "",
                        updwho: "",
                        updtgl: "",
                        is_aktif: $('#is_aktif-edit:checked').val(),
                        pengguna_email: $("#Pengguna-pengguna_email-edit").val(),
                        is_delete: ""
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            $("#modal-pengguna-edit").modal('hide');

                            Get_pengguna_by_filter();

                            ResetForm();
                        } else if (response.status == 2) {
                            var alert = response.data;
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
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
            }
        });
    });

    $("#btn_update_profil").click(function() {

        if ($("#Pengguna-pengguna_username-edit").val() == "") {

            let alert = "Pengguna Username Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-pengguna_email-edit").val() == "") {

            let alert = "Email Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#Pengguna-password-edit").val() == "") {

            let alert = "Password Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

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
                    url: "<?= base_url('Pengguna/update_pengguna'); ?>",
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
                        pengguna_id: $("#Pengguna-pengguna_id-edit").val(),
                        pengguna_username: $("#Pengguna-pengguna_username-edit").val(),
                        pengguna_password: $("#Pengguna-password-edit").val(),
                        pengguna_perusahaan: $("#Pengguna-perusahaan_id-edit").val(),
                        karyawan_id: $("#Pengguna-karyawan_id-edit").val(),
                        add_by: "",
                        updwho: "",
                        updtgl: "",
                        is_aktif: $('#is_aktif-edit:checked').val(),
                        pengguna_email: $("#Pengguna-pengguna_email-edit").val(),
                        is_delete: ""
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);

                            setTimeout(() => {
                                window.location.reload()
                            }, 500);

                            ResetForm();
                        } else if (response.status == 2) {
                            var alert = response.data;
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
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
            }
        });
    });

    function ResetForm() {

        $("#Pengguna-pengguna_username").val('');
        $("#Pengguna-pengguna_email").val('');
        $("#Pengguna-password").val('');
        $("#Pengguna-perusahaan_id").val('').trigger('change');
        $("#Pengguna-karyawan_id").val('').trigger('change');
        $("#is_aktif").prop("checked", false);

        $("#Pengguna-pengguna_id-edit").val('');
        $("#Pengguna-pengguna_username-edit").val('');
        $("#Pengguna-pengguna_email-edit").val('');
        $("#Pengguna-password-edit").val('');
        $("#Pengguna-perusahaan_id-edit").val('').trigger('change');
        $("#Pengguna-karyawan_id-edit").val('').trigger('change');
        $("#is_aktif-edit").prop("checked", false);

    }
</script>