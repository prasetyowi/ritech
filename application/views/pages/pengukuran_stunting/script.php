<script type="text/javascript">
    $('#btn_search_pengukuran').click(function(event) {
        Get_pengukuran_by_filter();
    });

    function Get_pengukuran_by_filter() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('PengukuranStuntingAdmin/Get_pengukuran_stunting_by_filter_admin') ?>",
            data: {
                tgl: $("#filter_tanggal_pengukuran").val(),
                umur_awal: $("#filter_umur_awal").val(),
                umur_akhir: $("#filter_umur_akhir").val(),
                nama_orang_tua: $("#filter_nama_orang_tua").val(),
                nama_anak: $("#filter_status_nama_anak").val(),
            },
            dataType: "JSON",
            success: function(response) {


                $('#table_list_pengukuran').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_pengukuran > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_pengukuran')) {
                        $('#table_list_pengukuran').DataTable().clear();
                        $('#table_list_pengukuran').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_list_pengukuran > tbody").append(`
								<tr class="even pointer">
                                    <td class="a-center ">${i+1}</td>
                                    <td class=" ">${v.nama_anak}</td>
                                    <td class=" ">${v.jenis_kelamin}</td>
                                    <td class=" ">${v.tanggal_lahir}</td>
                                    <td class=" ">${v.nama_orang_tua}</td>
                                    <td class=" ">${v.usia_saat_ukur}</td>
                                    <td class=" ">${v.tanggal_pengukuran}</td>
                                    <td class=" ">${v.berat}</td>
                                    <td class=" ">${v.tinggi}</td>
                                    <td class=" ">${v.cara_pengukuran}</td>
                                    <td class=" ">${v.lk}</td>
                                    <td class=" ">${v.zs_tb_u}</td>
                                    <td class=" ">${v.umur_tb}</td>
                                    <td class=" ">${v.umur_bb}</td>
                                    <td class=" ">${v.kesimpulan}</td>
                                </tr>
							`);
                        });

                        $("#table_list_pengukuran").DataTable({
                            lengthMenu: [
                                [-1],
                                ['All'],
                            ],
                            dom: 'lBfrtip',
                            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                        });
                    }
                });
            }
        });
    }
</script>