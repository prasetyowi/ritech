<script type="text/javascript">
    $('#btn_view_laporan').click(function(event) {
        Get_laporan_keuangan_by_filter();
    });

    function Get_laporan_keuangan_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Laporan/LaporanKeuangan/Get_laporan_keuangan_by_filter') ?>",
            data: {
                tahun: $("#filter_tahun").val(),
                perusahaan: $("#filter_perusahaan").val(),
            },
            dataType: "JSON",
            success: function(response) {
                $("#th_tahun").html($("#filter_tahun").val());

                $('#table_laporan_keuangan').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_laporan_keuangan > tbody').html('');
                    $('#table_laporan_keuangan > tbody').empty('');

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_laporan_keuangan > tbody").append(`
                                <tr>
                                    <td class="text-left">${v.keterangan}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_1)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_2)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_3)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_4)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_5)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_6)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_7)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_8)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_9)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_10)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_11)}</td>
                                    <td class="text-right">${formatRupiah(v.laporan_12)}</td>
                                    <td class="text-right" style="background-color:#DDF2FD;">${formatRupiah(v.laporan_total)}</td>
                                </tr>
                            `);
                        });
                    }
                });
            }
        });
    }

    function exportTableToExcel(tableID, filename = '') {

        let table = document.getElementsByTagName("table");

        TableToExcel.convert(table[0], {
            name: `Laporan_keuangan.xlsx`,
            sheet: {
                name: 'Usermanagement'
            }
        });
    }
</script>