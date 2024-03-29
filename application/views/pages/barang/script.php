<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    $(document).ready(function() {
        Get_barang_by_filter();
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_barang_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_barang_termin();
    });

    $('#btn_search_barang').click(function(event) {
        Get_barang_by_filter();
    });

    function Get_barang_by_filter() {
        $.ajax({
            type: 'GET',
            url: "<?= base_url('Barang/Get_barang_by_filter') ?>",
            data: {
                barang: $("#filter_nama_barang").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_barang').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_barang > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_barang')) {
                        $('#table_list_barang').DataTable().clear();
                        $('#table_list_barang').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {

                            <?php if ($this->session->userdata('karyawan_level') == "ADMIN") { ?>
                                $("#table_list_barang > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class="text-left">${v.barang_id}</td>
                                        <td class="text-left">${v.barang_nama}</td>
                                        <td class="text-right">${formatRupiah(v.harga_satuan.replaceAll(".",","))}</td>
                                        <td class="text-right">${formatRupiah(v.harga_hpp.replaceAll(".",","))}</td>
                                        <td class="text-left">${v.barang_desc}</td>
                                        <td class="text-left">${v.unit}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" onclick="ShowbarangDetail('${v.barang_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);
                            <?php } else { ?>
                                $("#table_list_barang > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class="text-left">${v.barang_id}</td>
                                        <td class="text-left">${v.barang_nama}</td>
                                        <td class="text-right">${formatRupiah(v.harga_satuan.replaceAll(".",","))}</td>
                                        <td class="text-left">${v.barang_desc}</td>
                                        <td class="text-left">${v.unit}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" onclick="ShowbarangDetailDisabled('${v.barang_id}')"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                `);
                            <?php } ?>
                        });

                        $("#table_list_barang").DataTable({
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

    $('#btn_tambah_barang').click(function(event) {
        $("#modal-barang").modal('show');
    });

    function ShowbarangDetail(barang_id) {

        $("#modal-barang-edit").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('Barang/Get_all_barang_by_id') ?>",
            data: {
                id: barang_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#id_barang-edit").val(v.barang_id);
                        $("#nama_barang-edit").val(v.barang_nama);
                        $("#harga-edit").val(formatRupiah(v.harga_satuan.replaceAll(".", ",")));
                        $("#harga_hpp-edit").val(formatRupiah(v.harga_hpp.replaceAll(".", ",")));
                        $("#desc_barang-edit").val(v.barang_desc);
                        $("#satuan-edit").val(v.unit);
                    });

                } else {
                    $("#id_barang-edit").val('');
                    $("#nama_barang-edit").val('');
                    $("#harga-edit").val('');
                    $("#harga_hpp-edit").val('');
                    $("#desc_barang-edit").val('');
                    $("#satuan-edit").val('');

                }
            }
        });

    }

    function ShowbarangDetailDisabled(barang_id) {

        $("#modal-barang-detail").modal('show');

        $.ajax({
            type: 'GET',
            url: "<?= base_url('Barang/Get_all_barang_by_id') ?>",
            data: {
                id: barang_id
            },
            dataType: "JSON",
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $("#id_barang-detail").val(v.barang_id);
                        $("#nama_barang-detail").val(v.barang_nama);
                        $("#harga-detail").val(formatRupiah(v.harga_satuan.replaceAll(".", ",")));
                        $("#harga_hpp-detail").val(formatRupiah(v.harga_hpp.replaceAll(".", ",")));
                        $("#desc_barang-detail").val(v.barang_desc);
                        $("#satuan-detail").val(v.unit);
                    });

                } else {
                    $("#id_barang-detail").val('');
                    $("#nama_barang-detail").val('');
                    $("#harga-detail").val('');
                    $("#harga_hpp-detail").val('');
                    $("#desc_barang-detail").val('');
                    $("#satuan-detail").val('');

                }
            }
        });

    }

    $("#btn_save_barang").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_barang").val() == "") {

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
                            url: "<?= base_url('Barang/insert_barang'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_barang").prop("disabled", true);
                            },
                            data: {
                                barang_id: $("#id_barang").val(),
                                barang_nama: $("#nama_barang").val(),
                                harga_satuan: $("#harga").val().replaceAll(".", ""),
                                harga_hpp: $("#harga_hpp").val().replaceAll(".", ""),
                                barang_desc: $("#desc_barang").val(),
                                unit: $("#satuan").val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-barang").modal('hide');
                                    Get_barang_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_barang").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_barang").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_barang").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_barang").click(function() {
        cek_error = 0;
        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#nama_barang-edit").val() == "") {

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
                            url: "<?= base_url('Barang/update_barang'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_barang").prop("disabled", true);
                            },
                            data: {
                                barang_id: $("#id_barang-edit").val(),
                                barang_nama: $("#nama_barang-edit").val(),
                                harga_satuan: $("#harga-edit").val().replaceAll(".", ""),
                                harga_hpp: $("#harga_hpp-edit").val().replaceAll(".", ""),
                                barang_desc: $("#desc_barang-edit").val(),
                                unit: $("#satuan-edit").val()
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    $("#modal-barang-edit").modal('hide');

                                    Get_barang_by_filter();

                                    ResetForm();
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_barang").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_barang").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_barang").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    function ResetForm() {

        $("#id_barang").val('');
        $("#nama_barang").val('');
        $("#harga").val('');
        $("#desc_barang").val('');
        $("#satuan").val('');

        $("#id_barang-edit").val('');
        $("#nama_barang-edit").val('');
        $("#harga-edit").val('');
        $("#desc_barang-edit").val('');
        $("#satuan-edit").val('');
    }

    var harga = document.getElementById('harga');
    harga.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga.value = formatRupiah(this.value);
    });

    var harga_hpp = document.getElementById('harga_hpp');
    harga_hpp.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga_hpp.value = formatRupiah(this.value);
    });

    var harga_edit = document.getElementById('harga-edit');
    harga_edit.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga_edit.value = formatRupiah(this.value);
    });

    var harga_hpp_edit = document.getElementById('harga_hpp-edit');
    harga_hpp_edit.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga_hpp_edit.value = formatRupiah(this.value);
    });
</script>