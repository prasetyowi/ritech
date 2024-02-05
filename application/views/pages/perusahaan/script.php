<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_perusahaan_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_perusahaan_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_perusahaan_termin();
    });

    $('#btn_search_perusahaan').click(function(event) {
        Get_perusahaan_by_filter();
    });

    function Get_perusahaan_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('Perusahaan/Get_perusahaan_by_filter') ?>",
            data: {
                perusahaan: $("#filter_nama_perusahaan").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_perusahaan').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_perusahaan > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_perusahaan')) {
                        $('#table_list_perusahaan').DataTable().clear();
                        $('#table_list_perusahaan').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.is_aktif == '1') {
                                $("#table_list_perusahaan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.perusahaan_nama}</td>
                                        <td class=" ">${v.perusahaan_alamat}</td>
                                        <td class=" ">${v.perusahaan_kelurahan}</td>
                                        <td class=" ">${v.perusahaan_kecamatan}</td>
                                        <td class=" ">${v.perusahaan_kota}</td>
                                        <td class=" ">${v.perusahaan_provinsi}</td>
                                        <td class=" ">${v.perusahaan_telp}</td>
                                        <td class=" ">${v.perusahaan_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowperusahaanDetail('${v.perusahaan_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            } else {

                                $("#table_list_perusahaan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.perusahaan_nama}</td>
                                        <td class=" ">${v.perusahaan_alamat}</td>
                                        <td class=" ">${v.perusahaan_kelurahan}</td>
                                        <td class=" ">${v.perusahaan_kecamatan}</td>
                                        <td class=" ">${v.perusahaan_kota}</td>
                                        <td class=" ">${v.perusahaan_provinsi}</td>
                                        <td class=" ">${v.perusahaan_telp}</td>
                                        <td class=" ">${v.perusahaan_kode_pos}</td>
                                        <td class=" ">
                                            <span class="badge badge-danger">Not Active</span>
                                        </td>
                                        <td class=" ">
                                            <button class="btn btn-primary" onclick="ShowperusahaanDetail('${v.perusahaan_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        $("#table_list_perusahaan").DataTable({
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

    $('#btn_tambah_perusahaan').click(function(event) {
        $("#modal-perusahaan").modal('show');
    });

    function ShowperusahaanDetail(perusahaan_id) {

        $("#modal-perusahaan-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('Perusahaan/Get_all_perusahaan_by_id') ?>",
            data: {
                id: perusahaan_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#id_perusahaan-edit").val(v.perusahaan_id);
                        $("#nama_perusahaan-edit").val(v.perusahaan_nama);
                        $("#alamat_perusahaan-edit").val(v.perusahaan_alamat);
                        $("#kelurahan-edit").val(v.perusahaan_kelurahan);
                        $("#kecamatan-edit").val(v.perusahaan_kecamatan);
                        $("#kota-edit").val(v.perusahaan_kota);
                        $("#provinsi-edit").val(v.perusahaan_provinsi);
                        $("#negara-edit").val(v.perusahaan_negara);
                        $("#telp-edit").val(v.perusahaan_telp);
                        $("#kode_pos-edit").val(v.perusahaan_kode_pos);
                        $("#email-edit").val(v.perusahaan_email);
                        $("#npwp-edit").val(v.perusahaan_npwp);
                        $("#perusahaan_nama_contact_person-edit").val(v.perusahaan_nama_contact_person);
                        $("#perusahaan_telp_contact_person-edit").val(v.perusahaan_telp_contact_person);

                        if (v.is_aktif == "1") {
                            $("#is_aktif-edit").prop("checked", true);
                        } else {
                            $("#is_aktif-edit").prop("checked", false);

                        }
                    });

                } else {
                    $.each(response, function(i, v) {
                        $("#id_perusahaan-edit").val('');
                        $("#nama_perusahaan-edit").val('');
                        $("#alamat_perusahaan-edit").val('');
                        $("#kelurahan-edit").val('');
                        $("#kecamatan-edit").val('');
                        $("#kota-edit").val('');
                        $("#provinsi-edit").val('');
                        $("#negara-edit").val('');
                        $("#telp-edit").val('');
                        $("#kode_pos-edit").val('');
                        $("#email-edit").val('');
                        $("#npwp-edit").val('');
                        $("#perusahaan_nama_contact_person-edit").val('');
                        $("#perusahaan_telp_contact_person-edit").val('');
                    });

                }
            }
        });

    }

    $("#btn_save_perusahaan").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_perusahaan").val() == "") {

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
                            url: "<?= base_url('Perusahaan/insert_perusahaan'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_perusahaan").prop("disabled", true);
                            },
                            data: {
                                perusahaan_id: $("#id_perusahaan").val(),
                                perusahaan_nama: $("#nama_perusahaan").val(),
                                perusahaan_alamat: $("#alamat_perusahaan").val(),
                                perusahaan_kelurahan: $("#kelurahan").val(),
                                perusahaan_kecamatan: $("#kecamatan").val(),
                                perusahaan_kota: $("#kota").val(),
                                perusahaan_provinsi: $("#provinsi").val(),
                                perusahaan_negara: $("#negara").val(),
                                perusahaan_telp: $("#telp").val(),
                                perusahaan_kode_pos: $("#kode_pos").val(),
                                perusahaan_email: $("#email").val(),
                                perusahaan_npwp: $("#npwp").val(),
                                perusahaan_nama_contact_person: $("#perusahaan_nama_contact_person").val(),
                                perusahaan_telp_contact_person: $("#perusahaan_telp_contact_person").val(),
                                is_aktif: $('#is_aktif:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-perusahaan").modal('hide');
                                    Get_perusahaan_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_perusahaan").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_perusahaan-edit").val() == "") {

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
                            url: "<?= base_url('Perusahaan/update_perusahaan'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_perusahaan").prop("disabled", true);
                            },
                            data: {
                                perusahaan_id: $("#id_perusahaan-edit").val(),
                                perusahaan_nama: $("#nama_perusahaan-edit").val(),
                                perusahaan_alamat: $("#alamat_perusahaan-edit").val(),
                                perusahaan_kelurahan: $("#kelurahan-edit").val(),
                                perusahaan_kecamatan: $("#kecamatan-edit").val(),
                                perusahaan_kota: $("#kota-edit").val(),
                                perusahaan_provinsi: $("#provinsi-edit").val(),
                                perusahaan_negara: $("#negara-edit").val(),
                                perusahaan_telp: $("#telp-edit").val(),
                                perusahaan_kode_pos: $("#kode_pos-edit").val(),
                                perusahaan_email: $("#email-edit").val(),
                                perusahaan_npwp: $("#npwp-edit").val(),
                                perusahaan_nama_contact_person: $("#perusahaan_nama_contact_person-edit").val(),
                                perusahaan_telp_contact_person: $("#perusahaan_telp_contact_person-edit").val(),
                                is_aktif: $('#is_aktif-edit:checked').val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-perusahaan-edit").modal('hide');

                                    Get_perusahaan_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_perusahaan").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    function ResetForm() {

        $("#id_perusahaan").val('');
        $("#nama_perusahaan").val('');
        $("#alamat_perusahaan").val('');
        $("#kelurahan").val('');
        $("#kecamatan").val('');
        $("#kota").val('');
        $("#provinsi").val('');
        $("#negara").val('');
        $("#telp").val('');
        $("#kode_pos").val('');
        $("#email").val('');
        $("#npwp").val('');
        $("#perusahaan_nama_contact_person").val('');
        $("#perusahaan_telp_contact_person").val('');
        $("#perusahaan_telp_contact_person").val('');
        $("#is_aktif").prop("checked", false);

        $("#id_perusahaan-edit").val('');
        $("#nama_perusahaan-edit").val('');
        $("#alamat_perusahaan-edit").val('');
        $("#kelurahan-edit").val('');
        $("#kecamatan-edit").val('');
        $("#kota-edit").val('');
        $("#provinsi-edit").val('');
        $("#negara-edit").val('');
        $("#telp-edit").val('');
        $("#kode_pos-edit").val('');
        $("#email-edit").val('');
        $("#npwp-edit").val('');
        $("#perusahaan_nama_contact_person-edit").val('');
        $("#perusahaan_telp_contact_person-edit").val('');
        $("#is_aktif-edit").prop("checked", false);

    }
</script>