<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;

    <?php if (isset($act)) { ?>
        <?php if ($act == "edit" || $act == "detail") { ?>
            <?php foreach ($Detail as $key => $value) { ?>
                arr_list_barang.push({
                    'barang_id': "<?= $value['barang_id'] ?>",
                    'barang_nama': "<?= $value['barang_nama'] ?>",
                    'unit': "<?= $value['unit'] ?>",
                    'barang_desc': "",
                    'harga_satuan': "<?= $value['harga_satuan'] ?>",
                    'remarks': "<?= $value['remarks'] ?>",
                    'qty': <?= $value['qty'] ?>
                });
            <?php } ?>

            index_termin = <?= count($Termin) ?>;

            <?php foreach ($Termin as $key => $value) { ?>
                arr_list_termin.push({
                    'idx': "<?= $key + 1 ?>",
                    'keterangan': "<?= $value['keterangan'] ?>",
                    'termin_pembayaran': <?= $value['termin_pembayaran'] ?>
                });
            <?php } ?>

            Get_list_pembelian_detail();
            Get_list_pembelian_termin();
        <?php } ?>
    <?php } ?>

    $('#check-all-barang').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('[name="CheckboxBarang"]:checkbox').each(function() {
                this.checked = true;
                var barang_id = this.getAttribute('data-barang_id');
                var barang_nama = this.getAttribute('data-barang_nama');
                var unit = this.getAttribute('data-unit');
                var barang_desc = "";
                var harga_satuan = this.getAttribute('data-harga_satuan');

                arr_list_barang.push({
                    'barang_id': barang_id,
                    'barang_nama': barang_nama,
                    'unit': unit,
                    'barang_desc': barang_desc,
                    'harga_satuan': harga_satuan,
                    'remarks': "",
                    'qty': 0
                });
                // console.log(this.getAttribute('data-customer'));
            });
        } else {
            $('[name="CheckboxBarang"]:checkbox').each(function() {
                this.checked = false;
                arr_list_barang = [];
            });
        }
    });

    $('#btn_modal_pilih_barang').click(function(event) {
        $("#modal-barang").modal('show');

        Get_barang_not_in_selected_barang();
    });

    $('#btn_choose_multi_barang').click(function(event) {

        $("#modal-barang").modal('hide');
        Get_list_pembelian_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_pembelian_termin();
    });

    $('#btn_search_pembelian').click(function(event) {
        Get_pembelian_by_filter();
    });

    function Get_pembelian_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Pembelian/Get_pembelian_by_filter') ?>",
            data: {
                tgl: $("#filter_tanggal_pembelian").val(),
                pembelian_id: $("#filter_no_pembelian").val(),
                customer: $("#filter_customer").val(),
                status: $("#filter_status_pembelian").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_pembelian').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_pembelian > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_pembelian')) {
                        $('#table_list_pembelian').DataTable().clear();
                        $('#table_list_pembelian').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_list_pembelian > tbody").append(`
								<tr class="even pointer">
                                    <td class="a-center ">${i+1}</td>
                                    <td class=" ">${v.pembelian_id}</td>
                                    <td class=" ">${v.pembelian_tanggal}</td>
                                    <td class=" ">${v.pembelian_no_po}</td>
                                    <td class=" ">${v.customer_nama}</td>
                                    <td class=" ">${v.pembelian_status}</td>
                                    <td class=" ">
                                        <a href="<?= base_url() ?>Pembelian/edit/?id=${v.pembelian_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url() ?>Pembelian/detail/?id=${v.pembelian_id}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
							`);
                        });

                        $("#table_list_pembelian").DataTable({
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

    function Get_barang_not_in_selected_barang() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Barang/Get_barang_not_in_selected_barang') ?>",
            data: {
                arr_list_barang: arr_list_barang
            },
            dataType: "JSON",
            success: function(response) {

                $("#check-all-barang").prop("checked", false);

                $('#table-list-barang').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table-list-barang > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table-list-barang')) {
                        $('#table-list-barang').DataTable().clear();
                        $('#table-list-barang').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table-list-barang > tbody").append(`
								<tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" id="item-${i}-barang_id" name="CheckboxBarang" data-barang_id="${v.barang_id}" data-barang_nama="${v.barang_nama}" data-unit="${v.unit}" data-harga_satuan="${v.harga_satuan}" data-barang_desc="" value="${v.barang_id}" onClick="PushArrayBarang('${i}','${v.barang_id}','${v.barang_nama}','${v.unit}','${v.harga_satuan}','')">
                                    </td>
                                    <td class=" ">${v.barang_id}</td>
                                    <td class=" ">${v.barang_nama}</td>
                                    <td class=" ">${v.unit}</td>
                                    <td class=" ">${v.harga_satuan}</td>
                                    <td class=" ">${v.barang_desc}</td>
                                </tr>
							`);
                        });

                        $("#table-list-barang").DataTable({
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

    function Get_list_pembelian_detail() {
        $('#table-pembelian-detail').fadeOut("slow", function() {
            $(this).hide();

            $('#table-pembelian-detail > tbody').empty('');

            if ($.fn.DataTable.isDataTable('#table-pembelian-detail')) {
                $('#table-pembelian-detail').DataTable().clear();
                $('#table-pembelian-detail').DataTable().destroy();
            }

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_barang.length != 0) {

                $.each(arr_list_barang, function(i, v) {
                    $("#table-pembelian-detail > tbody").append(`
						<tr>
						    <td class="text-center" style="width:5%;">
								${i+1}
								<input type="hidden" class="form-control" id="item-${i}-Pembelian-barang_id" value="${v.barang_id}">
								<input type="hidden" class="form-control" id="item-${i}-Pembelian-barang_desc" value="">
								<input type="hidden" class="form-control" id="item-${i}-Pembelian-harga_satuan" value="${v.harga_satuan}">
							</td>
							<td class="text-left" style="width:20%;">
                                <span id="item-${i}-Pembelian-nama_barang">${v.barang_nama}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="number" class="form-control" id="item-${i}-Pembelian-qty" value="${v.qty}" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-left" style="width:10%;">
                                <span id="item-${i}-Pembelian-unit">${v.unit}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="text" class="form-control" id="item-${i}-Pembelian-remarks" value="${v.remarks}" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-center" style="width:5%;">
								<button type="button" class="btn btn-danger btn-sm" onClick="DeleteListBarang('${v.barang_id}','${i}')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					`);
                });

                $("#table-pembelian-detail").DataTable({
                    lengthMenu: [
                        [50, 100, 200, -1],
                        [50, 100, 200, 'All'],
                    ],
                });
            }
        });
    }

    function Get_list_pembelian_termin() {
        $('#table-pembelian-termin').fadeOut("slow", function() {
            $(this).hide();

            $('#table-pembelian-termin > tbody').empty('');

            if ($.fn.DataTable.isDataTable('#table-pembelian-termin')) {
                $('#table-pembelian-termin').DataTable().clear();
                $('#table-pembelian-termin').DataTable().destroy();
            }

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_termin.length != 0) {

                $.each(arr_list_termin, function(i, v) {
                    $("#table-pembelian-termin > tbody").append(`
						<tr>
						    <td class="text-center" style="width:5%;">
								${i+1}
								<input type="hidden" class="form-control" id="item-${i}-pembelian_termin-idx" value="${v.idx}">
							</td>
                            <td class="text-left" style="width:45%;">
                                <input type="text" class="form-control" id="item-${i}-pembelian_termin-keterangan" value="${v.keterangan}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                            </td>
                            <td class="text-left" style="width:45%;">
                                <input type="number" class="form-control" id="item-${i}-pembelian_termin-termin_pembayaran" value="${v.termin_pembayaran}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                            </td>
                            <td class="text-center" style="width:5%;">
								<button type="button" class="btn btn-danger btn-sm" onClick="DeleteListTermin('${v.idx}','${i}')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					`);
                });

                $("#table-pembelian-termin").DataTable({
                    lengthMenu: [
                        [50, 100, 200, -1],
                        [50, 100, 200, 'All'],
                    ],
                });
            }
        });
    }

    function UpdateListBarang(barang_id, index, tipe) {

        const findIndexData = arr_list_barang.findIndex((value) => value.barang_id == barang_id);


        arr_list_barang[findIndexData] = ({
            'barang_id': $('#item-' + index + '-Pembelian-barang_id').val(),
            'barang_nama': $('#item-' + index + '-Pembelian-barang_nama').text(),
            'unit': $('#item-' + index + '-Pembelian-uniy').text(),
            'barang_desc': "",
            'harga_satuan': $('#item-' + index + '-Pembelian-harga_satuan').val(),
            'remarks': $('#item-' + index + '-Pembelian-remarks').val(),
            'qty': $('#item-' + index + '-Pembelian-qty').val()
        });
    }

    function UpdateListTermin(idx, index, tipe) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);


        arr_list_termin[findIndexData] = ({
            'idx': $("#item-" + index + "-pembelian_termin-idx").val(),
            'keterangan': $("#item-" + index + "-pembelian_termin-keterangan").val(),
            'termin_pembayaran': $("#item-" + index + "-pembelian_termin-termin_pembayaran").val()
        });
    }

    function PushArrayBarang(index, barang_id, barang_nama, unit, harga_satuan, barang_desc) {

        $("#check-all-barang").prop("checked", false);

        if ($('[id="item-' + index + '-barang_id"]:checked').length > 0) {
            arr_list_barang.push({
                'barang_id': barang_id,
                'barang_nama': barang_nama,
                'unit': unit,
                'barang_desc': barang_desc,
                'harga_satuan': harga_satuan,
                'remarks': "",
                'qty': 0
            });

            const uniqueArray = [];
            const seenIds = {};

            for (const obj of arr_list_barang) {
                if (!seenIds[obj.barang_id]) {
                    seenIds[obj.barang_id] = true;
                    uniqueArray.push(obj);
                }
            }
            arr_list_barang = uniqueArray;
        } else {
            const findIndexData = arr_list_barang.findIndex((value) => value.barang_id == barang_id);
            if (findIndexData > -1) { // only splice array when item is found
                arr_list_barang.splice(findIndexData, 1); // 2nd parameter means remove one item only
            }
        }

    }

    function DeleteListBarang(barang_id, index) {

        const findIndexData = arr_list_barang.findIndex((value) => value.barang_id == barang_id);

        if (findIndexData > -1) { // only splice array when item is found
            arr_list_barang.splice(findIndexData, 1); // 2nd parameter means remove one item only
        }

        // console.log(arr_list_barang);

        Get_list_pembelian_detail();

    }

    function DeleteListTermin(idx, index) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);

        if (findIndexData > -1) { // only splice array when item is found
            arr_list_termin.splice(findIndexData, 1); // 2nd parameter means remove one item only
        }

        // console.log(arr_list_barang);

        Get_list_pembelian_termin();

    }

    $("#Pembelian-customer_nama").autocomplete({
        serviceUrl: "<?= base_url('Customer/search_customer') ?>",
        params: {},
        dataType: 'json',
        onSearchComplete: function(query, suggestions) {
            if (suggestions.length == 0) {
                setTimeout(() => {
                    $("#Pembelian-customer_id").val('');
                    $("#Pembelian-customer_nama").val('');
                    $("#Pembelian-customer_alamat").val('');
                    $("#Pembelian-customer_kelurahan").val('');
                    $("#Pembelian-customer_kecamatan").val('');
                    $("#Pembelian-customer_kota").val('');
                    $("#Pembelian-customer_provinsi").val('');
                    $("#Pembelian-customer_kode_pos").val('');
                }, 1000);
            }
        },
        onSelect: function(data) {
            if (data) {
                $("#Pembelian-customer_id").val(data.id);
                $("#Pembelian-customer_nama").val(data.nama);
                $("#Pembelian-customer_alamat").val(data.customer_alamat);
                $("#Pembelian-customer_kelurahan").val(data.customer_kelurahan);
                $("#Pembelian-customer_kecamatan").val(data.customer_kecamatan);
                $("#Pembelian-customer_kota").val(data.customer_kota);
                $("#Pembelian-customer_provinsi").val(data.customer_provinsi);
                $("#Pembelian-customer_kode_pos").val(data.customer_kode_pos);
            } else {
                $("#Pembelian-customer_id").val('');
                $("#Pembelian-customer_nama").val('');
                $("#Pembelian-customer_alamat").val('');
                $("#Pembelian-customer_kelurahan").val('');
                $("#Pembelian-customer_kecamatan").val('');
                $("#Pembelian-customer_kota").val('');
                $("#Pembelian-customer_provinsi").val('');
                $("#Pembelian-customer_kode_pos").val('');
            }
        }
    });

    $("#filter_customer").autocomplete({
        serviceUrl: "<?= base_url('Customer/search_customer') ?>",
        params: {},
        dataType: 'json',
        onSearchComplete: function(query, suggestions) {
            if (suggestions.length == 0) {
                setTimeout(() => {
                    $("#filter_customer").val('');
                }, 1000);
            }
        },
        onSelect: function(data) {
            if (data) {
                $("#filter_customer").val(data.nama);
            } else {
                $("#filter_customer").val('');
            }
        }
    });

    $("#btn_simpan_pembelian").click(function() {
        cek_error = 0;

        if (arr_list_barang.length == 0) {

            let alert = "List Barang Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        $.each(arr_list_barang, function(i, v) {
            if (parseInt(v.qty) == 0) {
                let alert = "Qty Barang Tidak Boleh 0";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        if (arr_list_termin.length == 0) {

            let alert = "List Termin Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        $.each(arr_list_termin, function(i, v) {
            if (parseInt(v.keterangan) == 0) {
                let alert = "Keterangan Termin Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

            if (parseInt(v.termin_pembayaran) == 0) {
                let alert = "Termin Pembayaran Tidak Boleh 0";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#Pembelian-pembelian_id").val() == "") {

                let alert = "No Pembelian Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Pembelian-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Pembelian-jumlah").val() == "" || $("#Pembelian-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-pembelian_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-pembelian_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-periode_penawaran").val() == "") {

            //     let alert = "Periode Penawaran Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

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
                            url: "<?= base_url('Pembelian/insert_pembelian'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_pembelian").prop("disabled", true);
                            },
                            data: {
                                pembelian_id: $('#Pembelian-pembelian_id').val(),
                                pembelian_kode: $('#Pembelian-pembelian_kode').val(),
                                pembelian_tanggal: $('#Pembelian-pembelian_tanggal').val(),
                                customer_id: $('#Pembelian-customer_id').val(),
                                pembelian_keterangan: $('#Pembelian-pembelian_keterangan').val(),
                                pembelian_jumlah: "",
                                pembelian_status: $('#Pembelian-pembelian_status').val(),
                                pembelian_no_po: $('#Pembelian-pembelian_no_po').val(),
                                updwho: "",
                                updtgl: "",
                                pembelian_waktu_pengiriman: "",
                                pembelian_waktu_pengerjaan: "",
                                periode_penawaran: "",
                                garansi: "",
                                detail: arr_list_barang,
                                detail2: arr_list_termin
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    setTimeout(() => {
                                        location.href = "<?= base_url() ?>pembelian";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Pembelian " + $('#Pembelian-pembelian_id').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_pembelian").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_pembelian").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_pembelian").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_pembelian").click(function() {
        cek_error = 0;

        if (arr_list_barang.length == 0) {

            let alert = "List Barang Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        $.each(arr_list_barang, function(i, v) {
            if (parseInt(v.qty) == 0) {
                let alert = "Qty Barang Tidak Boleh 0";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        if (arr_list_termin.length == 0) {

            let alert = "List Termin Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        $.each(arr_list_termin, function(i, v) {
            if (parseInt(v.keterangan) == 0) {
                let alert = "Keterangan Termin Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

            if (parseInt(v.termin_pembayaran) == 0) {
                let alert = "Termin Pembayaran Tidak Boleh 0";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if ($("#Pembelian-pembelian_id").val() == "") {

                let alert = "No Pembelian Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Pembelian-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Pembelian-jumlah").val() == "" || $("#Pembelian-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-pembelian_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-pembelian_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Pembelian-periode_penawaran").val() == "") {

            //     let alert = "Periode Penawaran Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

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
                            url: "<?= base_url('Pembelian/update_pembelian'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_pembelian").prop("disabled", true);
                            },
                            data: {
                                pembelian_id: $('#Pembelian-pembelian_id').val(),
                                pembelian_kode: $('#Pembelian-pembelian_kode').val(),
                                pembelian_tanggal: $('#Pembelian-pembelian_tanggal').val(),
                                customer_id: $('#Pembelian-customer_id').val(),
                                pembelian_keterangan: $('#Pembelian-pembelian_keterangan').val(),
                                pembelian_jumlah: "",
                                pembelian_status: $('#Pembelian-pembelian_status').val(),
                                pembelian_no_po: $('#Pembelian-pembelian_no_po').val(),
                                updwho: $('#Pembelian-updwho').val(),
                                updtgl: $('#Pembelian-updtgl').val(),
                                pembelian_waktu_pengiriman: "",
                                pembelian_waktu_pengerjaan: "",
                                periode_penawaran: "",
                                garansi: "",
                                detail: arr_list_barang,
                                detail2: arr_list_termin
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    setTimeout(() => {
                                        location.href = "<?= base_url() ?>pembelian";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Pembelian " + $('#Pembelian-pembelian_id').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_pembelian").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_pembelian").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_pembelian").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    Dropzone.autoDiscover = false;

    var foto_upload = new Dropzone(".dropzone", {
        url: "<?php echo base_url('Pembelian/proses_upload') ?>",
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
        a.pembelian_id = $('#Pembelian-pembelian_id').val();
        a.token = Math.random();
        c.append("pembelian_id", a.pembelian_id);
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
            url: "<?php echo base_url('Pembelian/hapus_file') ?>",
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