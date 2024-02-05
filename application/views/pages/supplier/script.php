<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_supplier_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_supplier_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_supplier_termin();
    });

    $('#btn_search_supplier').click(function(event) {
        Get_supplier_by_filter();
    });

    function Get_supplier_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('supplier/Get_supplier_by_filter') ?>",
            data: {
                supplier: $("#filter_nama_supplier").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_supplier').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_supplier > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_supplier')) {
                        $('#table_list_supplier').DataTable().clear();
                        $('#table_list_supplier').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.is_aktif == '1') {
                                $("#table_list_supplier > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.supplier_nama}</td>
                                        <td class=" ">${v.supplier_alamat}</td>
                                        <td class=" ">${v.supplier_kelurahan}</td>
                                        <td class=" ">${v.supplier_kecamatan}</td>
                                        <td class=" ">${v.supplier_kota}</td>
                                        <td class=" ">${v.supplier_provinsi}</td>
                                        <td class=" ">${v.supplier_telp}</td>
                                        <td class=" ">${v.supplier_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowsupplierDetail('${v.supplier_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            } else {

                                $("#table_list_supplier > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.supplier_nama}</td>
                                        <td class=" ">${v.supplier_alamat}</td>
                                        <td class=" ">${v.supplier_kelurahan}</td>
                                        <td class=" ">${v.supplier_kecamatan}</td>
                                        <td class=" ">${v.supplier_kota}</td>
                                        <td class=" ">${v.supplier_provinsi}</td>
                                        <td class=" ">${v.supplier_telp}</td>
                                        <td class=" ">${v.supplier_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-danger">Not Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowsupplierDetail('${v.supplier_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_supplier").DataTable({
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

    $('#btn_tambah_supplier').click(function(event) {
        $("#modal-supplier").modal('show');
    });

    function ShowsupplierDetail(supplier_id) {

        $("#modal-supplier-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('supplier/Get_all_supplier_by_id') ?>",
            data: {
                id: supplier_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#id_supplier-edit").val(v.supplier_id);
                        $("#nama_supplier-edit").val(v.supplier_nama);
                        $("#alamat_supplier-edit").val(v.supplier_alamat);
                        $("#kelurahan-edit").val(v.supplier_kelurahan);
                        $("#kecamatan-edit").val(v.supplier_kecamatan);
                        $("#kota-edit").val(v.supplier_kota);
                        $("#provinsi-edit").val(v.supplier_provinsi);
                        $("#negara-edit").val(v.supplier_negara);
                        $("#telp-edit").val(v.supplier_telp);
                        $("#kode_pos-edit").val(v.supplier_kode_pos);
                        $("#email-edit").val(v.supplier_email);
                        $("#npwp-edit").val(v.supplier_npwp);
                        $("#supplier_nama_contact_person-edit").val(v.supplier_nama_contact_person);
                        $("#supplier_telp_contact_person-edit").val(v.supplier_telp_contact_person);

                        if (v.is_aktif == "1") {
                            $("#is_aktif-edit").prop("checked", true);
                        } else {
                            $("#is_aktif-edit").prop("checked", false);

                        }
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#id_supplier-edit").val('');
                        $("#nama_supplier-edit").val('');
                        $("#alamat_supplier-edit").val('');
                        $("#kelurahan-edit").val('');
                        $("#kecamatan-edit").val('');
                        $("#kota-edit").val('');
                        $("#provinsi-edit").val('');
                        $("#negara-edit").val('');
                        $("#telp-edit").val('');
                        $("#kode_pos-edit").val('');
                        $("#email-edit").val('');
                        $("#npwp-edit").val('');
                        $("#supplier_nama_contact_person-edit").val('');
                        $("#supplier_telp_contact_person-edit").val('');
                    });

                }
            }
        });

    }

    $("#btn_save_supplier").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_supplier").val() == "") {

                let alert = "Nama Pelanggan Tidak Boleh Kosong";
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
                            url: "<?= base_url('supplier/insert_supplier'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_supplier").prop("disabled", true);
                            },
                            data: {
                                supplier_id: $("#id_supplier").val(),
                                supplier_nama: $("#nama_supplier").val(),
                                supplier_alamat: $("#alamat_supplier").val(),
                                supplier_kelurahan: $("#kelurahan").val(),
                                supplier_kecamatan: $("#kecamatan").val(),
                                supplier_kota: $("#kota").val(),
                                supplier_provinsi: $("#provinsi").val(),
                                supplier_negara: $("#negara").val(),
                                supplier_telp: $("#telp").val(),
                                supplier_kode_pos: $("#kode_pos").val(),
                                supplier_email: $("#email").val(),
                                supplier_npwp: $("#npwp").val(),
                                supplier_nama_contact_person: $("#supplier_nama_contact_person").val(),
                                supplier_telp_contact_person: $("#supplier_telp_contact_person").val(),
                                is_aktif: $('#is_aktif:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-supplier").modal('hide');
                                    Get_supplier_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_supplier").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_supplier").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_supplier").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_supplier").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_supplier-edit").val() == "") {

                let alert = "Nama Pelanggan Tidak Boleh Kosong";
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
                            url: "<?= base_url('supplier/update_supplier'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_supplier").prop("disabled", true);
                            },
                            data: {
                                supplier_id: $("#id_supplier-edit").val(),
                                supplier_nama: $("#nama_supplier-edit").val(),
                                supplier_alamat: $("#alamat_supplier-edit").val(),
                                supplier_kelurahan: $("#kelurahan-edit").val(),
                                supplier_kecamatan: $("#kecamatan-edit").val(),
                                supplier_kota: $("#kota-edit").val(),
                                supplier_provinsi: $("#provinsi-edit").val(),
                                supplier_negara: $("#negara-edit").val(),
                                supplier_telp: $("#telp-edit").val(),
                                supplier_kode_pos: $("#kode_pos-edit").val(),
                                supplier_email: $("#email-edit").val(),
                                supplier_npwp: $("#npwp-edit").val(),
                                supplier_nama_contact_person: $("#supplier_nama_contact_person-edit").val(),
                                supplier_telp_contact_person: $("#supplier_telp_contact_person-edit").val(),
                                is_aktif: $('#is_aktif-edit:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-supplier-edit").modal('hide');

                                    Get_supplier_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_supplier").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_supplier").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_supplier").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    function ResetForm() {

        $("#id_supplier").val('');
        $("#nama_supplier").val('');
        $("#alamat_supplier").val('');
        $("#kelurahan").val('');
        $("#kecamatan").val('');
        $("#kota").val('');
        $("#provinsi").val('');
        $("#negara").val('');
        $("#telp").val('');
        $("#kode_pos").val('');
        $("#email").val('');
        $("#npwp").val('');
        $("#supplier_nama_contact_person").val('');
        $("#supplier_telp_contact_person").val('');
        $("#supplier_telp_contact_person").val('');
        $("#is_aktif").prop("checked", false);

        $("#id_supplier-edit").val('');
        $("#nama_supplier-edit").val('');
        $("#alamat_supplier-edit").val('');
        $("#kelurahan-edit").val('');
        $("#kecamatan-edit").val('');
        $("#kota-edit").val('');
        $("#provinsi-edit").val('');
        $("#negara-edit").val('');
        $("#telp-edit").val('');
        $("#kode_pos-edit").val('');
        $("#email-edit").val('');
        $("#npwp-edit").val('');
        $("#supplier_nama_contact_person-edit").val('');
        $("#supplier_telp_contact_person-edit").val('');
        $("#is_aktif-edit").prop("checked", false);

    }
</script>