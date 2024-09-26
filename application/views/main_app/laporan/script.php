<script type="text/javascript">
    function Get_pengukuran_stunting_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('MainApp/Laporan/Get_pengukuran_stunting_by_filter') ?>",
            data: {
                tahun: $("#filter_tahun").val(),
                bulan: $("#filter_bulan").val()
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_pengukuran_stunting').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_pengukuran_stunting > tbody').html('');
                    $('#table_pengukuran_stunting > tbody').empty('');

                    // if ($.fn.DataTable.isDataTable('#table_pengukuran_stunting')) {
                    //     $('#table_pengukuran_stunting').DataTable().clear();
                    //     $('#table_pengukuran_stunting').DataTable().destroy();
                    // }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {

                            if (v.kesimpulan == "Tidak Stunting") {

                                $("#table_pengukuran_stunting > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}">${v.nama_anak}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}">${v.tanggal_pengukuran}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}" class="btn btn-success">${v.kesimpulan}</a>
                                        </td>
                                    </tr>
                                `);

                            } else if (v.kesimpulan == "Hampir Stunting") {
                                $("#table_pengukuran_stunting > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}"}>${v.nama_anak}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}">${v.tanggal_pengukuran}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}" class="btn btn-warning">${v.kesimpulan}</a>
                                        </td>
                                    </tr>
                                `);

                            } else {
                                $("#table_pengukuran_stunting > tbody").append(`
                                    <tr class="even pointer">
                                        <td class="a-center ">${i+1}</td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}"}>${v.nama_anak}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}">${v.tanggal_pengukuran}</a>
                                        </td>
                                        <td class="text-left">
                                            <a href="<?= base_url() ?>/MainApp/Laporan/detail/?id=${v.pengukuran_stunting_id}" class="btn btn-danger">${v.kesimpulan}</a>
                                        </td>
                                    </tr>
                                `);

                            }
                        });

                        // $("#table_pengukuran_stunting").DataTable({
                        //     lengthMenu: [
                        //         [50, 100, 200, -1],
                        //         [50, 100, 200, 'All'],
                        //     ],
                        // });
                    }
                });
            }
        });
    }
</script>