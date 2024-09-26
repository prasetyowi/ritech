<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_orang_tua_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_orang_tua_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_orang_tua_termin();
    });

    $('#btn_search_orang_tua').click(function(event) {
        Get_orang_tua_by_filter();
    });

    function Get_orang_tua_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('OrangTua/Get_orang_tua_by_filter') ?>",
            data: {
                orang_tua: $("#filter_nama_orang_tua").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_orang_tua').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_orang_tua > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_orang_tua')) {
                        $('#table_list_orang_tua').DataTable().clear();
                        $('#table_list_orang_tua').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.is_aktif == '1') {
                                $("#table_list_orang_tua > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.orang_tua_nama}</td>
                                        <td class=" ">${v.orang_tua_alamat}</td>
                                        <td class=" ">${v.orang_tua_kelurahan}</td>
                                        <td class=" ">${v.orang_tua_kecamatan}</td>
                                        <td class=" ">${v.orang_tua_kota}</td>
                                        <td class=" ">${v.orang_tua_provinsi}</td>
                                        <td class=" ">${v.orang_tua_telp}</td>
                                        <td class=" ">${v.orang_tua_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="Showorang_tuaDetail('${v.orang_tua_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            } else {

                                $("#table_list_orang_tua > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.orang_tua_nama}</td>
                                        <td class=" ">${v.orang_tua_alamat}</td>
                                        <td class=" ">${v.orang_tua_kelurahan}</td>
                                        <td class=" ">${v.orang_tua_kecamatan}</td>
                                        <td class=" ">${v.orang_tua_kota}</td>
                                        <td class=" ">${v.orang_tua_provinsi}</td>
                                        <td class=" ">${v.orang_tua_telp}</td>
                                        <td class=" ">${v.orang_tua_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-danger">Not Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="Showorang_tuaDetail('${v.orang_tua_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_orang_tua").DataTable({
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

    $('#btn_tambah_orang_tua').click(function(event) {
        $("#modal-orang_tua").modal('show');
    });

    function Showorang_tuaDetail(orang_tua_id) {

        $("#modal-orang_tua-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('OrangTua/Get_orang_tua_by_id') ?>",
            data: {
                id: orang_tua_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#orang_tua_id-edit").val(v.orang_tua_id);
                        $("#nama_orang_tua-edit").val(v.orang_tua_nama);
                        $("#alamat_orang_tua-edit").val(v.orang_tua_alamat);
                        $("#kelurahan-edit").val(v.orang_tua_kelurahan);
                        $("#kecamatan-edit").val(v.orang_tua_kecamatan);
                        $("#kota-edit").val(v.orang_tua_kota);
                        $("#provinsi-edit").val(v.orang_tua_provinsi);
                        $("#negara-edit").val(v.orang_tua_negara);
                        $("#telp-edit").val(v.orang_tua_telp);
                        $("#kode_pos-edit").val(v.orang_tua_kode_pos);
                        // $("#email-edit").val(v.orang_tua_email);
                        $("#tgl_lahir-edit").val(v.tgl_lahir);
                        $("#jenis_kelamin-edit").val(v.jenis_kelamin);

                        if (v.is_aktif == "1") {
                            $("#is_aktif-edit").prop("checked", true);
                        } else {
                            $("#is_aktif-edit").prop("checked", false);

                        }
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#orang_tua_id-edit").val('');
                        $("#nama_orang_tua-edit").val('');
                        $("#alamat_orang_tua-edit").val('');
                        $("#kelurahan-edit").val('');
                        $("#kecamatan-edit").val('');
                        $("#kota-edit").val('');
                        $("#provinsi-edit").val('');
                        $("#negara-edit").val('');
                        $("#telp-edit").val('');
                        $("#kode_pos-edit").val('');
                        $("#email-edit").val('');
                        $("#tgl_lahir-edit").val('');
                        $("#jenis_kelamin-edit").val('');
                    });

                }
            }
        });

    }

    $("#btn_save_orang_tua").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_orang_tua").val() == "") {

                let alert = "Nama Orang Tua Tidak Boleh Kosong";
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
                            url: "<?= base_url('OrangTua/insert_orang_tua'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_orang_tua").prop("disabled", true);
                            },
                            data: {
                                orang_tua_id: $("#orang_tua_id").val(),
                                orang_tua_nama: $("#nama_orang_tua").val(),
                                orang_tua_alamat: $("#alamat_orang_tua").val(),
                                orang_tua_kelurahan: $("#kelurahan").val(),
                                orang_tua_kecamatan: $("#kecamatan").val(),
                                orang_tua_kota: $("#kota").val(),
                                orang_tua_provinsi: $("#provinsi").val(),
                                orang_tua_negara: $("#negara").val(),
                                orang_tua_telp: $("#telp").val(),
                                orang_tua_kode_pos: $("#kode_pos").val(),
                                pengguna_email: "",
                                // pengguna_email: $("#email").val(),
                                tgl_lahir: $("#tgl_lahir").val(),
                                jenis_kelamin: $("#jenis_kelamin").val(),
                                is_aktif: $('#is_aktif:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-orang_tua").modal('hide');
                                    Get_orang_tua_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_orang_tua").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_orang_tua-edit").val() == "") {

                let alert = "Nama Orang Tua Tidak Boleh Kosong";
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
                            url: "<?= base_url('OrangTua/update_orang_tua'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_orang_tua").prop("disabled", true);
                            },
                            data: {
                                orang_tua_id: $("#orang_tua_id-edit").val(),
                                orang_tua_nama: $("#nama_orang_tua-edit").val(),
                                orang_tua_alamat: $("#alamat_orang_tua-edit").val(),
                                orang_tua_kelurahan: $("#kelurahan-edit").val(),
                                orang_tua_kecamatan: $("#kecamatan-edit").val(),
                                orang_tua_kota: $("#kota-edit").val(),
                                orang_tua_provinsi: $("#provinsi-edit").val(),
                                orang_tua_negara: $("#negara-edit").val(),
                                orang_tua_telp: $("#telp-edit").val(),
                                orang_tua_kode_pos: $("#kode_pos-edit").val(),
                                pengguna_email: "",
                                // pengguna_email: $("#email-edit").val(),
                                tgl_lahir: $("#tgl_lahir-edit").val(),
                                jenis_kelamin: $("#jenis_kelamin-edit").val(),
                                is_aktif: $('#is_aktif-edit:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-orang_tua-edit").modal('hide');

                                    Get_orang_tua_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_orang_tua").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    function ResetForm() {

        $("#orang_tua_id").val('');
        $("#nama_orang_tua").val('');
        $("#alamat_orang_tua").val('');
        $("#kelurahan").val('');
        $("#kecamatan").val('');
        $("#kota").val('');
        $("#provinsi").val('');
        $("#negara").val('');
        $("#telp").val('');
        $("#kode_pos").val('');
        $("#email").val('');

        $("#orang_tua_id-edit").val('');
        $("#nama_orang_tua-edit").val('');
        $("#alamat_orang_tua-edit").val('');
        $("#kelurahan-edit").val('');
        $("#kecamatan-edit").val('');
        $("#kota-edit").val('');
        $("#provinsi-edit").val('');
        $("#negara-edit").val('');
        $("#telp-edit").val('');
        $("#kode_pos-edit").val('');
        $("#email-edit").val('');


    }
</script>