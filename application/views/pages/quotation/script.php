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
                    'barang_desc': "<?= $value['barang_desc'] ?>",
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

            Get_list_quotation_detail();
            Get_list_quotation_termin();
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
                var barang_desc = this.getAttribute('data-barang_desc');
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
        Get_list_quotation_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'termin_pembayaran': 0
        });

        Get_list_quotation_termin();
    });

    $('#btn_search_quotation').click(function(event) {
        Get_quotation_by_filter();
    });

    function Get_quotation_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Quotation/Get_quotation_by_filter') ?>",
            data: {
                tgl: $("#filter_tanggal_quotation").val(),
                quotation_id: $("#filter_no_quotation").val(),
                customer: $("#filter_customer").val(),
                status: $("#filter_status_quotation").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_quotation').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_quotation > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_quotation')) {
                        $('#table_list_quotation').DataTable().clear();
                        $('#table_list_quotation').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_list_quotation > tbody").append(`
								<tr class="even pointer">
                                    <td class="a-center ">${i+1}</td>
                                    <td class=" ">${v.quotation_kode}</td>
                                    <td class=" ">${v.quotation_tanggal}</td>
                                    <td class=" ">${v.customer_nama}</td>
                                    <td class=" ">${v.quotation_status}</td>
                                    <td class=" ">
                                        <a href="<?= base_url() ?>quotation/edit/?id=${v.quotation_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
							`);
                        });

                        $("#table_list_quotation").DataTable({
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
                                        <input type="checkbox" class="flat" id="item-${i}-barang_id" name="CheckboxBarang" data-barang_id="${v.barang_id}" data-barang_nama="${v.barang_nama}" data-unit="${v.unit}" data-harga_satuan="${v.harga_satuan}" data-barang_desc="${v.barang_desc}" value="${v.barang_id}" onClick="PushArrayBarang('${i}','${v.barang_id}','${v.barang_nama}','${v.unit}','${v.harga_satuan}','${v.barang_desc}')">
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

    function Get_list_quotation_detail() {
        $('#table-quotation-detail').fadeOut("slow", function() {
            $(this).hide();

            $('#table-quotation-detail > tbody').empty('');

            if ($.fn.DataTable.isDataTable('#table-quotation-detail')) {
                $('#table-quotation-detail').DataTable().clear();
                $('#table-quotation-detail').DataTable().destroy();
            }

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_barang.length != 0) {

                $.each(arr_list_barang, function(i, v) {
                    $("#table-quotation-detail > tbody").append(`
						<tr>
						    <td class="text-center" style="width:5%;">
								${i+1}
								<input type="hidden" class="form-control" id="item-${i}-quotation-barang_id" value="${v.barang_id}">
								<input type="hidden" class="form-control" id="item-${i}-quotation-barang_desc" value="${v.barang_desc}">
								<input type="hidden" class="form-control" id="item-${i}-quotation-harga_satuan" value="${v.harga_satuan}">
							</td>
							<td class="text-left" style="width:20%;">
                                <span id="item-${i}-quotation-nama_barang">${v.barang_nama}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="number" class="form-control" id="item-${i}-quotation-qty" value="${v.qty}" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-left" style="width:10%;">
                                <span id="item-${i}-quotation-unit">${v.unit}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="text" class="form-control" id="item-${i}-quotation-remarks" value="${v.remarks}" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-center" style="width:5%;">
								<button type="button" class="btn btn-danger btn-sm" onClick="DeleteListBarang('${v.barang_id}','${i}')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					`);
                });

                $("#table-quotation-detail").DataTable({
                    lengthMenu: [
                        [50, 100, 200, -1],
                        [50, 100, 200, 'All'],
                    ],
                });
            }
        });
    }

    function Get_list_quotation_termin() {
        $('#table-quotation-termin').fadeOut("slow", function() {
            $(this).hide();

            $('#table-quotation-termin > tbody').empty('');

            if ($.fn.DataTable.isDataTable('#table-quotation-termin')) {
                $('#table-quotation-termin').DataTable().clear();
                $('#table-quotation-termin').DataTable().destroy();
            }

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_termin.length != 0) {

                $.each(arr_list_termin, function(i, v) {
                    $("#table-quotation-termin > tbody").append(`
						<tr>
						    <td class="text-center" style="width:5%;">
								${i+1}
								<input type="hidden" class="form-control" id="item-${i}-quotation_termin-idx" value="${v.idx}">
							</td>
                            <td class="text-left" style="width:45%;">
                                <input type="text" class="form-control" id="item-${i}-quotation_termin-keterangan" value="${v.keterangan}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                            </td>
                            <td class="text-left" style="width:45%;">
                                <input type="number" class="form-control" id="item-${i}-quotation_termin-termin_pembayaran" value="${v.termin_pembayaran}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                            </td>
                            <td class="text-center" style="width:5%;">
								<button type="button" class="btn btn-danger btn-sm" onClick="DeleteListTermin('${v.idx}','${i}')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					`);
                });

                $("#table-quotation-termin").DataTable({
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
            'barang_id': $('#item-' + index + '-quotation-barang_id').val(),
            'barang_nama': $('#item-' + index + '-quotation-barang_nama').text(),
            'unit': $('#item-' + index + '-quotation-uniy').text(),
            'barang_desc': $('#item-' + index + '-quotation-barang_desc').val(),
            'harga_satuan': $('#item-' + index + '-quotation-harga_satuan').val(),
            'remarks': $('#item-' + index + '-quotation-remarks').val(),
            'qty': $('#item-' + index + '-quotation-qty').val()
        });
    }

    function UpdateListTermin(idx, index, tipe) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);


        arr_list_termin[findIndexData] = ({
            'idx': $("#item-" + index + "-quotation_termin-idx").val(),
            'keterangan': $("#item-" + index + "-quotation_termin-keterangan").val(),
            'termin_pembayaran': $("#item-" + index + "-quotation_termin-termin_pembayaran").val()
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

        Get_list_quotation_detail();

    }

    function DeleteListTermin(idx, index) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);

        if (findIndexData > -1) { // only splice array when item is found
            arr_list_termin.splice(findIndexData, 1); // 2nd parameter means remove one item only
        }

        // console.log(arr_list_barang);

        Get_list_quotation_termin();

    }

    $("#Quotation-customer_nama").autocomplete({
        serviceUrl: "<?= base_url('Customer/search_customer') ?>",
        params: {},
        dataType: 'json',
        onSearchComplete: function(query, suggestions) {
            if (suggestions.length == 0) {
                setTimeout(() => {
                    $("#Quotation-customer_id").val('');
                    $("#Quotation-customer_nama").val('');
                    $("#Quotation-customer_alamat").val('');
                    $("#Quotation-customer_kelurahan").val('');
                    $("#Quotation-customer_kecamatan").val('');
                    $("#Quotation-customer_kota").val('');
                    $("#Quotation-customer_provinsi").val('');
                    $("#Quotation-customer_kode_pos").val('');
                }, 1000);
            }
        },
        onSelect: function(data) {
            if (data) {
                $("#Quotation-customer_id").val(data.id);
                $("#Quotation-customer_nama").val(data.nama);
                $("#Quotation-customer_alamat").val(data.customer_alamat);
                $("#Quotation-customer_kelurahan").val(data.customer_kelurahan);
                $("#Quotation-customer_kecamatan").val(data.customer_kecamatan);
                $("#Quotation-customer_kota").val(data.customer_kota);
                $("#Quotation-customer_provinsi").val(data.customer_provinsi);
                $("#Quotation-customer_kode_pos").val(data.customer_kode_pos);
            } else {
                $("#Quotation-customer_id").val('');
                $("#Quotation-customer_nama").val('');
                $("#Quotation-customer_alamat").val('');
                $("#Quotation-customer_kelurahan").val('');
                $("#Quotation-customer_kecamatan").val('');
                $("#Quotation-customer_kota").val('');
                $("#Quotation-customer_provinsi").val('');
                $("#Quotation-customer_kode_pos").val('');
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

    $("#btn_simpan_quotation").click(function() {
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

            if ($("#Quotation-quotation_id").val() == "") {

                let alert = "No Quotation Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Quotation-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Quotation-jumlah").val() == "" || $("#Quotation-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-quotation_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-quotation_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-periode_penawaran").val() == "") {

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
                            url: "<?= base_url('Quotation/insert_quotation'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_quotation").prop("disabled", true);
                            },
                            data: {
                                quotation_kode: $('#Quotation-quotation_kode').val(),
                                quotation_tanggal: $('#Quotation-quotation_tanggal').val(),
                                customer_id: $('#Quotation-customer_id').val(),
                                quotation_keterangan: $('#Quotation-quotation_keterangan').val(),
                                quotation_jumlah: "",
                                quotation_status: $('#Quotation-quotation_status').val(),
                                updwho: "",
                                updtgl: "",
                                quotation_waktu_pengiriman: "",
                                quotation_waktu_pengerjaan: "",
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
                                        location.href = "<?= base_url() ?>Quotation";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Quotation " + $('#Quotation-quotation_id').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_quotation").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_quotation").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_quotation").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_quotation").click(function() {
        cek_error = 0;

        console.log(arr_list_barang);
        console.log(arr_list_termin);

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

            if ($("#Quotation-quotation_id").val() == "") {

                let alert = "No Quotation Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Quotation-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Quotation-jumlah").val() == "" || $("#Quotation-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-quotation_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-quotation_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Quotation-periode_penawaran").val() == "") {

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
                            url: "<?= base_url('Quotation/update_quotation'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_quotation").prop("disabled", true);
                            },
                            data: {
                                quotation_id: $('#Quotation-quotation_id').val(),
                                quotation_kode: $('#Quotation-quotation_kode').val(),
                                quotation_tanggal: $('#Quotation-quotation_tanggal').val(),
                                customer_id: $('#Quotation-customer_id').val(),
                                quotation_keterangan: $('#Quotation-quotation_keterangan').val(),
                                quotation_jumlah: "",
                                quotation_status: $('#Quotation-quotation_status').val(),
                                updwho: $('#Quotation-updwho').val(),
                                updtgl: $('#Quotation-updtgl').val(),
                                quotation_waktu_pengiriman: "",
                                quotation_waktu_pengerjaan: "",
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
                                        location.href = "<?= base_url() ?>Quotation";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Quotation " + $('#Quotation-quotation_id').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_quotation").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_quotation").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_quotation").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });
</script>