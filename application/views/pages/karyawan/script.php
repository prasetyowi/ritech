<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_karyawan_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_karyawan_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_karyawan_termin();
    });

    $('#btn_search_karyawan').click(function(event) {
        Get_karyawan_by_filter();
    });

    function Get_karyawan_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('karyawan/Get_karyawan_by_filter') ?>",
            data: {
                karyawan: $("#filter_nama_karyawan").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_karyawan').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_karyawan > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_karyawan')) {
                        $('#table_list_karyawan').DataTable().clear();
                        $('#table_list_karyawan').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.is_aktif == '1') {
                                $("#table_list_karyawan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.karyawan_id}</td>
                                        <td class=" ">${v.karyawan_nama}</td>
                                        <td class=" ">${v.perusahaan_nama}</td>
                                        <td class=" ">${v.karyawan_divisi}</td>
                                        <td class=" ">${v.karyawan_level}</td>
                                        <td class=" ">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowkaryawanDetail('${v.karyawan_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            } else {

                                $("#table_list_karyawan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.karyawan_id}</td>
                                        <td class=" ">${v.karyawan_nama}</td>
                                        <td class=" ">${v.perusahaan_nama}</td>
                                        <td class=" ">${v.karyawan_divisi}</td>
                                        <td class=" ">${v.karyawan_level}</td>
                                        <td class=" ">
                                            <span class="badge badge-danger">Not Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowkaryawanDetail('${v.karyawan_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_karyawan").DataTable({
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

    $('#btn_tambah_karyawan').click(function(event) {
        $("#modal-karyawan").modal('show');
    });

    function ShowkaryawanDetail(karyawan_id) {

        $("#modal-karyawan-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('karyawan/Get_all_karyawan_by_id') ?>",
            data: {
                id: karyawan_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {

                        $("#id_karyawan-edit").val(v.karyawan_id);
                        $("#nama_karyawan-edit").val(v.karyawan_nama);
                        $("#alamat_karyawan-edit").val(v.karyawan_alamat);
                        $("#karyawan_level-edit").val(v.karyawan_level).trigger('change');
                        $("#karyawan_divisi-edit").val(v.karyawan_divisi).trigger('change');
                        $("#perusahaan_id-edit").val(perusahaan_id).trigger('change');

                        if (v.is_aktif == "1") {
                            $("#is_aktif-edit").prop("checked", true);
                        } else {
                            $("#is_aktif-edit").prop("checked", false);

                        }
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#id_karyawan-edit").val('');
                        $("#nama_karyawan-edit").val('');
                        $("#alamat_karyawan-edit").val('');
                        $("#karyawan_level-edit").val("").trigger('change');
                        $("#karyawan_divisi-edit").val("").trigger('change');
                        $("#perusahaan_id-edit").val("").trigger('change');
                        $("#is_aktif-edit").prop("checked", false);
                    });

                }
            }
        });

    }

    $("#btn_save_karyawan").click(function() {

        if ($("#nama_karyawan").val() == "") {

            let alert = "Nama Pelanggan Tidak Boleh Kosong";
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
                    url: "<?= base_url('karyawan/insert_karyawan'); ?>",
                    type: "POST",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_simpan_karyawan").prop("disabled", true);
                    },
                    data: {
                        karyawan_id: "",
                        karyawan_nama: $("#nama_karyawan").val(),
                        karyawan_alamat: $("#alamat_karyawan").val(),
                        karyawan_telp: $("#telp").val(),
                        karyawan_divisi: $("#karyawan_divisi").val(),
                        karyawan_level: $("#karyawan_level").val(),
                        perusahaan_id: $("#perusahaan_id").val(),
                        is_aktif: $('#is_aktif:checked').val()
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            $("#modal-karyawan").modal('hide');
                            Get_karyawan_by_filter();

                            ResetForm();
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_simpan_karyawan").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_simpan_karyawan").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_simpan_karyawan").prop("disabled", false);
                    }
                });
            }
        });
    });

    $("#btn_update_karyawan").click(function() {

        if ($("#nama_karyawan-edit").val() == "") {

            let alert = "Nama Pelanggan Tidak Boleh Kosong";
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
                    url: "<?= base_url('karyawan/update_karyawan'); ?>",
                    type: "POST",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_update_karyawan").prop("disabled", true);
                    },
                    data: {
                        karyawan_id: $("#id_karyawan-edit").val(),
                        karyawan_nama: $("#nama_karyawan-edit").val(),
                        karyawan_alamat: $("#alamat_karyawan-edit").val(),
                        karyawan_telp: $("#telp-edit").val(),
                        karyawan_divisi: $("#karyawan_divisi-edit").val(),
                        karyawan_level: $("#karyawan_level-edit").val(),
                        perusahaan_id: $("#perusahaan_id-edit").val(),
                        is_aktif: $('#is_aktif-edit:checked').val()
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            $("#modal-karyawan-edit").modal('hide');

                            Get_karyawan_by_filter();

                            ResetForm();
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_update_karyawan").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_update_karyawan").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_update_karyawan").prop("disabled", false);
                    }
                });
            }
        });
    });

    function ResetForm() {

        $("#nama_karyawan").val('');
        $("#alamat_karyawan").val('');
        $("#karyawan_level").val("").trigger('change');
        $("#karyawan_divisi").val("").trigger('change');
        $("#perusahaan_id").val("").trigger('change');
        $("#is_aktif").prop("checked", false);

        $("#id_karyawan-edit").val('');
        $("#nama_karyawan-edit").val('');
        $("#alamat_karyawan-edit").val('');
        $("#karyawan_level-edit").val("").trigger('change');
        $("#karyawan_divisi-edit").val("").trigger('change');
        $("#perusahaan_id-edit").val("").trigger('change');
        $("#is_aktif-edit").prop("checked", false);


    }
</script>