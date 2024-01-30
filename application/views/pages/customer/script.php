<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_customer_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_customer_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_customer_termin();
    });

    $('#btn_search_customer').click(function(event) {
        Get_customer_by_filter();
    });

    function Get_customer_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('Customer/Get_customer_by_filter') ?>",
            data: {
                customer: $("#filter_nama_customer").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_customer').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_customer > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_customer')) {
                        $('#table_list_customer').DataTable().clear();
                        $('#table_list_customer').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_list_customer > tbody").append(`
								<tr class="even pointer">
                                    <td class="a-center ">${i+1}</td>
                                    <td class=" ">${v.customer_nama}</td>
                                    <td class=" ">${v.customer_alamat}</td>
                                    <td class=" ">${v.customer_kelurahan}</td>
                                    <td class=" ">${v.customer_kecamatan}</td>
                                    <td class=" ">${v.customer_kota}</td>
                                    <td class=" ">${v.customer_provinsi}</td>
                                    <td class=" ">${v.customer_telp}</td>
                                    <td class=" ">${v.customer_kode_pos}</td>
                                    <td class=" ">
                                        <button class="btn btn-primary" onclick="ShowCustomerDetail('${v.customer_id}')"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
							`);
                        });

                        $("#table_list_customer").DataTable({
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

    $('#btn_tambah_customer').click(function(event) {
        $("#modal-customer").modal('show');
    });

    function ShowCustomerDetail(customer_id) {

        $("#modal-customer-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('Customer/Get_all_customer_by_id') ?>",
            data: {
                id: customer_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#id_customer-edit").val(v.customer_id);
                        $("#nama_customer-edit").val(v.customer_nama);
                        $("#alamat_customer-edit").val(v.customer_alamat);
                        $("#kelurahan-edit").val(v.customer_kelurahan);
                        $("#kecamatan-edit").val(v.customer_kecamatan);
                        $("#kota-edit").val(v.customer_kota);
                        $("#provinsi-edit").val(v.customer_provinsi);
                        $("#negara-edit").val(v.customer_negara);
                        $("#telp-edit").val(v.customer_telp);
                        $("#kode_pos-edit").val(v.customer_kode_pos);
                        $("#email-edit").val(v.customer_email);
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#id_customer-edit").val('');
                        $("#nama_customer-edit").val('');
                        $("#alamat_customer-edit").val('');
                        $("#kelurahan-edit").val('');
                        $("#kecamatan-edit").val('');
                        $("#kota-edit").val('');
                        $("#provinsi-edit").val('');
                        $("#negara-edit").val('');
                        $("#telp-edit").val('');
                        $("#kode_pos-edit").val('');
                        $("#email-edit").val('');
                    });

                }
            }
        });

    }

    $("#btn_save_customer").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_customer").val() == "") {

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
                            url: "<?= base_url('Customer/insert_customer'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_customer").prop("disabled", true);
                            },
                            data: {
                                customer_id: $("#id_customer").val(),
                                customer_nama: $("#nama_customer").val(),
                                customer_alamat: $("#alamat_customer").val(),
                                customer_kelurahan: $("#kelurahan").val(),
                                customer_kecamatan: $("#kecamatan").val(),
                                customer_kota: $("#kota").val(),
                                customer_provinsi: $("#provinsi").val(),
                                customer_negara: $("#negara").val(),
                                customer_telp: $("#telp").val(),
                                customer_kode_pos: $("#kode_pos").val(),
                                customer_email: $("#email").val(),
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-customer").modal('hide');
                                    Get_customer_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_customer").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_customer").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_customer").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_customer").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_customer-edit").val() == "") {

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
                            url: "<?= base_url('Customer/update_customer'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_customer").prop("disabled", true);
                            },
                            data: {
                                customer_id: $("#id_customer-edit").val(),
                                customer_nama: $("#nama_customer-edit").val(),
                                customer_alamat: $("#alamat_customer-edit").val(),
                                customer_kelurahan: $("#kelurahan-edit").val(),
                                customer_kecamatan: $("#kecamatan-edit").val(),
                                customer_kota: $("#kota-edit").val(),
                                customer_provinsi: $("#provinsi-edit").val(),
                                customer_negara: $("#negara-edit").val(),
                                customer_telp: $("#telp-edit").val(),
                                customer_kode_pos: $("#kode_pos-edit").val(),
                                customer_email: $("#email-edit").val(),
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-customer-edit").modal('hide');

                                    Get_customer_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_customer").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_customer").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_customer").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    function ResetForm() {

        $("#id_customer").val('');
        $("#nama_customer").val('');
        $("#alamat_customer").val('');
        $("#kelurahan").val('');
        $("#kecamatan").val('');
        $("#kota").val('');
        $("#provinsi").val('');
        $("#negara").val('');
        $("#telp").val('');
        $("#kode_pos").val('');
        $("#email").val('');

        $("#id_customer-edit").val('');
        $("#nama_customer-edit").val('');
        $("#alamat_customer-edit").val('');
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