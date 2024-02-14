<script type="text/javascript">
    var arr_list_barang = [];
    var arr_list_termin = [];
    var index_termin = 0;
    var jml_termin = 0;
    var max_jml_termin = 100;

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
                    'tanggal_invoice': "<?= $value['tanggal_invoice'] ?>",
                    'termin_pembayaran': <?= $value['termin_pembayaran'] ?>,
                    'termin_tanggal_bayar': "<?= $value['termin_tanggal_bayar'] ?>",
                    'termin_status': "<?= $value['termin_status'] ?>"
                });
            <?php } ?>

            if ($("#Penjualan-penjualan_status").val() != "Draft") {
                location.href = "<?= base_url() ?>Penjualan/detail/?id=" + $("#Penjualan-penjualan_id").val();
            }

            Get_list_penjualan_detail();
            Get_list_penjualan_termin();
        <?php } ?>
    <?php } ?>

    $('#check-all-barang').click(function(event) {
        if (this.checked) {
            arr_list_barang = [];
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
        Get_list_penjualan_detail();
    });


    $('#btn_tambah_termin').click(function(event) {

        index_termin++;

        arr_list_termin.push({
            'idx': index_termin,
            'keterangan': "",
            'tanggal_invoice': "",
            'termin_pembayaran': 0,
            'termin_tanggal_bayar': "",
            'termin_status': ""
        });

        Get_list_penjualan_termin();
    });

    $('#btn_search_penjualan').click(function(event) {
        Get_penjualan_by_filter();
    });

    function Get_penjualan_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Penjualan/Get_penjualan_by_filter') ?>",
            data: {
                tgl: $("#filter_tanggal_penjualan").val(),
                penjualan_id: $("#filter_no_penjualan").val(),
                customer: $("#filter_customer").val(),
                status: $("#filter_status_penjualan").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_penjualan').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_penjualan > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_penjualan')) {
                        $('#table_list_penjualan').DataTable().clear();
                        $('#table_list_penjualan').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            if (v.penjualan_status == "Applied" || v.penjualan_status == "Canceled") {
                                $("#table_list_penjualan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.penjualan_id}</td>
                                        <td class=" ">${v.penjualan_tanggal}</td>
                                        <td class=" ">${v.penjualan_no_po}</td>
                                        <td class=" ">${v.customer_nama}</td>
                                        <td class=" ">${v.penjualan_status}</td>
                                        <td class="text-center">
                                            <a href="<?= base_url() ?>Penjualan/detail/?id=${v.penjualan_id}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                `);
                            } else {
                                $("#table_list_penjualan > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class=" ">${v.penjualan_id}</td>
                                        <td class=" ">${v.penjualan_tanggal}</td>
                                        <td class=" ">${v.penjualan_no_po}</td>
                                        <td class=" ">${v.customer_nama}</td>
                                        <td class=" ">${v.penjualan_status}</td>
                                        <td class="text-center">
                                            <a href="<?= base_url() ?>Penjualan/edit/?id=${v.penjualan_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                `);
                            }
                        });

                        $("#table_list_penjualan").DataTable({
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

    function Get_list_penjualan_detail() {
        $('#table-penjualan-detail').fadeOut("slow", function() {
            $(this).hide();

            $('#table-penjualan-detail > tbody').empty('');
            $('#table-penjualan-detail > tbody').html('');

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_barang.length != 0) {

                $.each(arr_list_barang, function(i, v) {
                    $("#table-penjualan-detail > tbody").append(`
						<tr>
						    <td class="text-center" style="width:5%;">
								${i+1}
								<input type="hidden" class="form-control" id="item-${i}-Penjualan-barang_id" value="${v.barang_id}">
								<input type="hidden" class="form-control" id="item-${i}-Penjualan-barang_desc" value="">
								<input type="hidden" class="form-control" id="item-${i}-Penjualan-harga_satuan" value="${v.harga_satuan}">
							</td>
							<td class="text-left" style="width:20%;">
                                <span id="item-${i}-Penjualan-nama_barang">${v.barang_nama}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="number" class="form-control" id="item-${i}-Penjualan-qty" value="${v.qty}" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-left" style="width:10%;">
                                <span id="item-${i}-Penjualan-unit">${v.unit}</span>
                            </td>
                            <td class="text-left" style="width:25%;">
                                <input type="text" class="form-control" id="item-${i}-Penjualan-remarks" value="${v.remarks}" max="250" onchange="UpdateListBarang('${v.barang_id}', '${i}','text')">
                            </td>
                            <td class="text-center" style="width:5%;">
								<button type="button" class="btn btn-danger btn-sm" onClick="DeleteListBarang('${v.barang_id}','${i}')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					`);
                });
            }
        });
    }

    function Get_list_penjualan_termin() {
        $('#table-penjualan-termin').fadeOut("slow", function() {
            $(this).hide();

            $('#table-penjualan-termin > tbody').html('');
            $('#table-penjualan-termin > tbody').empty('');

        }).fadeIn("slow", function() {
            $(this).show();

            if (arr_list_termin.length != 0) {

                $.each(arr_list_termin, function(i, v) {

                    if (v.termin_status == "LUNAS") {
                        $("#table-penjualan-termin > tbody").append(`
                            <tr style="background-color:#9ED5C5">
                                <td class="text-center" style="width:5%;">
                                    ${i+1}
                                    <input type="hidden" class="form-control" id="item-${i}-penjualan_termin-idx" value="${v.idx}">
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="text" class="form-control" id="item-${i}-penjualan_termin-keterangan" value="${v.keterangan}"  max="250" disabled>
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="date" class="form-control" id="item-${i}-penjualan_termin-tanggal_invoice" value="${v.tanggal_invoice}" disabled>
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="number" class="form-control" id="item-${i}-penjualan_termin-termin_pembayaran" value="${v.termin_pembayaran}" disabled>
                                </td>
                                <td class="text-center" style="width:10%;">
                                    <input type="checkbox" id="item-${i}-penjualan_termin-termin_status" value="${v.termin_status}" checked disabled>
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="date" class="form-control" id="item-${i}-penjualan_termin-termin_tanggal_bayar" value="${v.termin_tanggal_bayar}" disabled>
                                </td>
                                <td class="text-center" style="width:5%;">

                                </td>
                            </tr>
                        `);

                    } else {
                        $("#table-penjualan-termin > tbody").append(`
                            <tr>
                                <td class="text-center" style="width:5%;">
                                    ${i+1}
                                    <input type="hidden" class="form-control" id="item-${i}-penjualan_termin-idx" value="${v.idx}">
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="text" class="form-control" id="item-${i}-penjualan_termin-keterangan" value="${v.keterangan}"  max="250" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="date" class="form-control" id="item-${i}-penjualan_termin-tanggal_invoice" value="${v.tanggal_invoice}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="number" class="form-control" id="item-${i}-penjualan_termin-termin_pembayaran" value="${v.termin_pembayaran}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                                </td>
                                <td class="text-center" style="width:10%;">
                                    <input type="checkbox"  id="item-${i}-penjualan_termin-termin_status" value="LUNAS" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                                </td>
                                <td class="text-left" style="width:20%;">
                                    <input type="date" class="form-control" id="item-${i}-penjualan_termin-termin_tanggal_bayar" value="${v.termin_tanggal_bayar}" onchange="UpdateListTermin('${v.idx}', '${i}','text')">
                                </td>
                                <td class="text-center" style="width:5%;">
                                    <button type="button" class="btn btn-danger btn-sm" onClick="DeleteListTermin('${v.idx}','${i}')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        `);
                    }
                });
            }
        });
    }

    function UpdateListBarang(barang_id, index, tipe) {

        const findIndexData = arr_list_barang.findIndex((value) => value.barang_id == barang_id);


        arr_list_barang[findIndexData] = ({
            'barang_id': $('#item-' + index + '-Penjualan-barang_id').val(),
            'barang_nama': $('#item-' + index + '-Penjualan-barang_nama').text(),
            'unit': $('#item-' + index + '-Penjualan-uniy').text(),
            'barang_desc': "",
            'harga_satuan': $('#item-' + index + '-Penjualan-harga_satuan').val(),
            'remarks': $('#item-' + index + '-Penjualan-remarks').val(),
            'qty': $('#item-' + index + '-Penjualan-qty').val()
        });
    }

    function UpdateListTermin(idx, index, tipe) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);

        arr_list_termin[findIndexData] = ({
            'idx': $("#item-" + index + "-penjualan_termin-idx").val(),
            'keterangan': $("#item-" + index + "-penjualan_termin-keterangan").val(),
            'tanggal_invoice': $("#item-" + index + "-penjualan_termin-tanggal_invoice").val(),
            'termin_pembayaran': $("#item-" + index + "-penjualan_termin-termin_pembayaran").val(),
            'termin_tanggal_bayar': $("#item-" + index + "-penjualan_termin-termin_tanggal_bayar").val(),
            'termin_status': $("#item-" + index + "-penjualan_termin-termin_status:checked").val() === undefined ? '' : $("#item-" + index + "-penjualan_termin-termin_status:checked").val()
        });

        console.log(arr_list_termin);
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

        Get_list_penjualan_detail();

    }

    function DeleteListTermin(idx, index) {

        const findIndexData = arr_list_termin.findIndex((value) => value.idx == idx);

        if (findIndexData > -1) { // only splice array when item is found
            arr_list_termin.splice(findIndexData, 1); // 2nd parameter means remove one item only
        }

        // console.log(arr_list_barang);

        Get_list_penjualan_termin();

    }

    $("#Penjualan-customer_nama").autocomplete({
        serviceUrl: "<?= base_url('Customer/search_customer') ?>",
        params: {},
        dataType: 'json',
        onSearchComplete: function(query, suggestions) {
            if (suggestions.length == 0) {
                setTimeout(() => {
                    $("#Penjualan-customer_id").val('');
                    $("#Penjualan-customer_nama").val('');
                    $("#Penjualan-customer_alamat").val('');
                    $("#Penjualan-customer_kelurahan").val('');
                    $("#Penjualan-customer_kecamatan").val('');
                    $("#Penjualan-customer_kota").val('');
                    $("#Penjualan-customer_provinsi").val('');
                    $("#Penjualan-customer_kode_pos").val('');
                }, 1000);
            }
        },
        onSelect: function(data) {
            if (data) {
                $("#Penjualan-customer_id").val(data.id);
                $("#Penjualan-customer_nama").val(data.nama);
                $("#Penjualan-customer_alamat").val(data.customer_alamat);
                $("#Penjualan-customer_kelurahan").val(data.customer_kelurahan);
                $("#Penjualan-customer_kecamatan").val(data.customer_kecamatan);
                $("#Penjualan-customer_kota").val(data.customer_kota);
                $("#Penjualan-customer_provinsi").val(data.customer_provinsi);
                $("#Penjualan-customer_kode_pos").val(data.customer_kode_pos);
            } else {
                $("#Penjualan-customer_id").val('');
                $("#Penjualan-customer_nama").val('');
                $("#Penjualan-customer_alamat").val('');
                $("#Penjualan-customer_kelurahan").val('');
                $("#Penjualan-customer_kecamatan").val('');
                $("#Penjualan-customer_kota").val('');
                $("#Penjualan-customer_provinsi").val('');
                $("#Penjualan-customer_kode_pos").val('');
            }
        }
    });

    $("#Penjualan-karyawan_nama").autocomplete({
        serviceUrl: "<?= base_url('Karyawan/search_karyawan') ?>",
        params: {},
        dataType: 'json',
        onSearchComplete: function(query, suggestions) {
            if (suggestions.length == 0) {
                setTimeout(() => {
                    $("#Penjualan-karyawan_id").val('');
                    $("#Penjualan-karyawan_nama").val('');
                }, 1000);
            }
        },
        onSelect: function(data) {
            if (data) {
                $("#Penjualan-karyawan_id").val(data.id);
                $("#Penjualan-karyawan_nama").val(data.nama);
            } else {
                $("#Penjualan-karyawan_id").val('');
                $("#Penjualan-karyawan_nama").val('');
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

    $("#btn_simpan_penjualan").click(function() {
        cek_error = 0;
        jml_termin = 0;

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

            jml_termin += parseInt(v.termin_pembayaran);

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

            if (v.tanggal_invoice == "") {
                let alert = "Tanggal Invoice Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if (jml_termin > max_jml_termin) {

                let alert = "Termin Pembayaran Lebih dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }

            if (jml_termin < max_jml_termin) {

                let alert = "Termin Pembayaran Kurang dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }


            if ($("#Penjualan-penjualan_id").val() == "") {

                let alert = "No Penjualan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-penjualan_no_po").val() == "") {

                let alert = "No PO Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-karyawan_id").val() == "") {

                let alert = "Sales Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Penjualan-jumlah").val() == "" || $("#Penjualan-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-periode_penawaran").val() == "") {

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
                            url: "<?= base_url('Penjualan/insert_penjualan'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_simpan_penjualan").prop("disabled", true);
                            },
                            data: {
                                penjualan_id: $('#Penjualan-penjualan_id').val(),
                                penjualan_kode: $('#Penjualan-penjualan_no_po').val(),
                                penjualan_tanggal: $('#Penjualan-penjualan_tanggal').val(),
                                customer_id: $('#Penjualan-customer_id').val(),
                                penjualan_keterangan: $('#Penjualan-penjualan_keterangan').val(),
                                penjualan_jumlah: "",
                                penjualan_status: "Draft",
                                // penjualan_status: $('#Penjualan-penjualan_status').val(),
                                penjualan_no_po: $('#Penjualan-penjualan_no_po').val(),
                                penjualan_pic: $('#Penjualan-penjualan_pic').val(),
                                penjualan_oleh: $('#Penjualan-penjualan_oleh').val(),
                                karyawan_id: $('#Penjualan-karyawan_id').val(),
                                updwho: "",
                                updtgl: "",
                                penjualan_waktu_pengiriman: "",
                                penjualan_waktu_pengerjaan: "",
                                periode_penawaran: "",
                                garansi: "",
                                no_faktur: $('#Penjualan-no_faktur').val(),
                                tanggal_faktur: $('#Penjualan-tanggal_faktur').val(),
                                perusahaan_id: $('#Penjualan-perusahaan_id').val(),
                                is_ppn: $('#Penjualan-is_ppn:checked').val(),
                                is_pph: $('#Penjualan-is_pph:checked').val(),
                                detail: arr_list_barang,
                                detail2: arr_list_termin
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    setTimeout(() => {
                                        location.href = "<?= base_url() ?>penjualan";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var alert = "No Penjualan " + $('#Penjualan-penjualan_no_po').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_simpan_penjualan").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_simpan_penjualan").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_simpan_penjualan").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_update_penjualan").click(function() {
        cek_error = 0;
        jml_termin = 0;

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

            jml_termin += parseInt(v.termin_pembayaran);

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

            if (v.tanggal_invoice == "") {
                let alert = "Tanggal Invoice Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        setTimeout(() => {

            // console.log(arr_list_faktur_klaim);

            if (jml_termin > max_jml_termin) {

                let alert = "Termin Pembayaran Lebih dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }

            if (jml_termin < max_jml_termin) {

                let alert = "Termin Pembayaran Kurang dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-penjualan_id").val() == "") {

                let alert = "No Penjualan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-penjualan_no_po").val() == "") {

                let alert = "No PO Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-karyawan_id").val() == "") {

                let alert = "Sales Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Penjualan-jumlah").val() == "" || $("#Penjualan-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-periode_penawaran").val() == "") {

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
                            url: "<?= base_url('Penjualan/update_penjualan'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_update_penjualan").prop("disabled", true);
                                $("#btn_konfirmasi_penjualan").prop("disabled", true);
                                $("#btn_cancel_penjualan").prop("disabled", true);
                            },
                            data: {
                                penjualan_id: $('#Penjualan-penjualan_id').val(),
                                penjualan_kode: $('#Penjualan-penjualan_no_po').val(),
                                penjualan_tanggal: $('#Penjualan-penjualan_tanggal').val(),
                                customer_id: $('#Penjualan-customer_id').val(),
                                penjualan_keterangan: $('#Penjualan-penjualan_keterangan').val(),
                                penjualan_jumlah: "",
                                penjualan_status: "Draft",
                                // penjualan_status: $('#Penjualan-penjualan_status').val(),
                                penjualan_no_po: $('#Penjualan-penjualan_no_po').val(),
                                updwho: $('#Penjualan-updwho').val(),
                                updtgl: $('#Penjualan-updtgl').val(),
                                penjualan_pic: $('#Penjualan-penjualan_pic').val(),
                                penjualan_oleh: $('#Penjualan-penjualan_oleh').val(),
                                karyawan_id: $('#Penjualan-karyawan_id').val(),
                                penjualan_waktu_pengiriman: "",
                                penjualan_waktu_pengerjaan: "",
                                periode_penawaran: "",
                                garansi: "",
                                perusahaan_id: $('#Penjualan-perusahaan_id').val(),
                                no_faktur: $('#Penjualan-no_faktur').val(),
                                tanggal_faktur: $('#Penjualan-tanggal_faktur').val(),
                                is_ppn: $('#Penjualan-is_ppn:checked').val(),
                                is_pph: $('#Penjualan-is_pph:checked').val(),
                                detail: arr_list_barang,
                                detail2: arr_list_termin
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    setTimeout(() => {
                                        location.href = "<?= base_url() ?>penjualan";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Penjualan " + $('#Penjualan-penjualan_no_po').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_konfirmasi_penjualan").click(function() {
        cek_error = 0;
        jml_termin = 0;

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

            jml_termin += parseInt(v.termin_pembayaran);

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

            if (v.tanggal_invoice == "") {
                let alert = "Tanggal Invoice Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                cek_error++;

                return false;
            }

        });

        setTimeout(() => {

            if (jml_termin > max_jml_termin) {

                let alert = "Termin Pembayaran Lebih dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }

            if (jml_termin < max_jml_termin) {

                let alert = "Termin Pembayaran Kurang dari 100%";
                message_custom("Error", "error", alert);

                return false;
            }

            // console.log(arr_list_faktur_klaim);

            if ($("#Penjualan-penjualan_id").val() == "") {

                let alert = "No Penjualan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-penjualan_no_po").val() == "") {

                let alert = "No PO Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-customer_id").val() == "") {

                let alert = "Pelanggan Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            if ($("#Penjualan-karyawan_id").val() == "") {

                let alert = "Sales Tidak Boleh Kosong";
                message_custom("Error", "error", alert);

                return false;
            }

            // if ($("#Penjualan-jumlah").val() == "" || $("#Penjualan-jumlah").val() == "0") {

            //     let alert = "Jumlah Material Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengiriman").val() == "") {

            //     let alert = "Waktu Pengiriman Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-penjualan_waktu_pengerjaan").val() == "") {

            //     let alert = "Waktu Pengerjaan Tidak Boleh Kosong";
            //     message_custom("Error", "error", alert);

            //     return false;
            // }

            // if ($("#Penjualan-periode_penawaran").val() == "") {

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
                            url: "<?= base_url('Penjualan/update_penjualan'); ?>",
                            type: "POST",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Loading ...',
                                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                                    timerProgressBar: false,
                                    showConfirmButton: false
                                });

                                $("#btn_update_penjualan").prop("disabled", true);
                                $("#btn_konfirmasi_penjualan").prop("disabled", true);
                                $("#btn_cancel_penjualan").prop("disabled", true);
                            },
                            data: {
                                penjualan_id: $('#Penjualan-penjualan_id').val(),
                                penjualan_kode: $('#Penjualan-penjualan_no_po').val(),
                                penjualan_tanggal: $('#Penjualan-penjualan_tanggal').val(),
                                customer_id: $('#Penjualan-customer_id').val(),
                                penjualan_keterangan: $('#Penjualan-penjualan_keterangan').val(),
                                penjualan_jumlah: "",
                                penjualan_status: "Applied",
                                // penjualan_status: $('#Penjualan-penjualan_status').val(),
                                penjualan_no_po: $('#Penjualan-penjualan_no_po').val(),
                                updwho: $('#Penjualan-updwho').val(),
                                updtgl: $('#Penjualan-updtgl').val(),
                                penjualan_pic: $('#Penjualan-penjualan_pic').val(),
                                penjualan_oleh: $('#Penjualan-penjualan_oleh').val(),
                                karyawan_id: $('#Penjualan-karyawan_id').val(),
                                penjualan_waktu_pengiriman: "",
                                penjualan_waktu_pengerjaan: "",
                                periode_penawaran: "",
                                garansi: "",
                                perusahaan_id: $('#Penjualan-perusahaan_id').val(),
                                no_faktur: $('#Penjualan-no_faktur').val(),
                                tanggal_faktur: $('#Penjualan-tanggal_faktur').val(),
                                is_ppn: $('#Penjualan-is_ppn:checked').val(),
                                is_pph: $('#Penjualan-is_pph:checked').val(),
                                detail: arr_list_barang,
                                detail2: arr_list_termin
                            },
                            dataType: "JSON",
                            success: function(response) {

                                if (response.status == 1) {
                                    var alert = "Data Berhasil Disimpan";
                                    message_custom("Success", "success", alert);
                                    setTimeout(() => {
                                        location.href = "<?= base_url() ?>penjualan";
                                    }, 500);

                                    ResetForm();
                                } else if (response.status == "2") {

                                    var msg = "No Penjualan " + $('#Penjualan-penjualan_no_po').val() + " Sudah Ada";
                                    message_custom("Error", "error", alert);
                                } else {
                                    var alert = "Data Gagal Disimpan";
                                    message_custom("Error", "error", alert);
                                }

                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                var alert = "Error 500 Internal Server Connection Failure";
                                message_custom("Error", "error", alert);

                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            },
                            complete: function() {
                                // Swal.close();
                                $("#btn_update_penjualan").prop("disabled", false);
                                $("#btn_konfirmasi_penjualan").prop("disabled", false);
                                $("#btn_cancel_penjualan").prop("disabled", false);
                            }
                        });
                    }
                });

            }

        }, 1000);
    });

    $("#btn_cancel_penjualan").click(function() {
        jml_termin = 0;

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
                    url: "<?= base_url('Penjualan/update_penjualan'); ?>",
                    type: "POST",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_update_penjualan").prop("disabled", true);
                        $("#btn_konfirmasi_penjualan").prop("disabled", true);
                        $("#btn_cancel_penjualan").prop("disabled", true);
                    },
                    data: {
                        penjualan_id: $('#Penjualan-penjualan_id').val(),
                        penjualan_kode: $('#Penjualan-penjualan_no_po').val(),
                        penjualan_tanggal: $('#Penjualan-penjualan_tanggal').val(),
                        customer_id: $('#Penjualan-customer_id').val(),
                        penjualan_keterangan: $('#Penjualan-penjualan_keterangan').val(),
                        penjualan_jumlah: "",
                        penjualan_status: "Canceled",
                        // penjualan_status: $('#Penjualan-penjualan_status').val(),
                        penjualan_no_po: $('#Penjualan-penjualan_no_po').val(),
                        updwho: $('#Penjualan-updwho').val(),
                        updtgl: $('#Penjualan-updtgl').val(),
                        penjualan_pic: $('#Penjualan-penjualan_pic').val(),
                        penjualan_oleh: $('#Penjualan-penjualan_oleh').val(),
                        karyawan_id: $('#Penjualan-karyawan_id').val(),
                        penjualan_waktu_pengiriman: "",
                        penjualan_waktu_pengerjaan: "",
                        periode_penawaran: "",
                        garansi: "",
                        perusahaan_id: $('#Penjualan-perusahaan_id').val(),
                        no_faktur: $('#Penjualan-no_faktur').val(),
                        tanggal_faktur: $('#Penjualan-tanggal_faktur').val(),
                        is_ppn: $('#Penjualan-is_ppn:checked').val(),
                        is_pph: $('#Penjualan-is_pph:checked').val(),
                        detail: arr_list_barang,
                        detail2: arr_list_termin
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            setTimeout(() => {
                                location.href = "<?= base_url() ?>penjualan";
                            }, 500);

                            ResetForm();
                        } else if (response.status == "2") {

                            var msg = "No Penjualan " + $('#Penjualan-penjualan_no_po').val() + " Sudah Ada";
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_update_penjualan").prop("disabled", false);
                        $("#btn_konfirmasi_penjualan").prop("disabled", false);
                        $("#btn_cancel_penjualan").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_update_penjualan").prop("disabled", false);
                        $("#btn_konfirmasi_penjualan").prop("disabled", false);
                        $("#btn_cancel_penjualan").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_update_penjualan").prop("disabled", false);
                        $("#btn_konfirmasi_penjualan").prop("disabled", false);
                        $("#btn_cancel_penjualan").prop("disabled", false);
                    }
                });
            }
        });
    });


    Dropzone.autoDiscover = false;

    var foto_upload = new Dropzone(".dropzone", {
        url: "<?php echo base_url('Penjualan/proses_upload') ?>",
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
        a.penjualan_id = $('#Penjualan-penjualan_id').val();
        a.token = Math.random();
        c.append("penjualan_id", a.penjualan_id);
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
            url: "<?php echo base_url('Penjualan/hapus_file') ?>",
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