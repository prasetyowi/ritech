<script type="text/javascript">
    function hitungUmurBulan() {
        // var tanggalLahir = new Date($("#tanggal_lahir").val());

        // var sekarang = new Date();
        // var tahunSekarang = sekarang.getFullYear();
        // var bulanSekarang = sekarang.getMonth() + 1;
        // var tanggalSekarang = sekarang.getDate();

        // var tahunLahir = tanggalLahir.getFullYear();
        // var bulanLahir = tanggalLahir.getMonth() + 1;
        // var tanggalLahir = tanggalLahir.getDate();

        // var umurBulan = (tahunSekarang - tahunLahir) * 12;
        // umurBulan += bulanSekarang - bulanLahir;

        // if (tanggalSekarang < tanggalLahir) {
        //     umurBulan--;
        // }

        var tanggal1 = $("#tanggal_lahir").val();
        var tanggal2 = $("#tanggal_pengukuran").val();
        // var tanggal2 = "<?= date('d/m/Y') ?>";

        var tanggalPecah1 = tanggal1.split('/');
        var tanggalPecah2 = tanggal2.split('/');

        // Membuat objek Date dari tanggal yang diberikan
        var tanggalObjek1 = new Date(tanggalPecah1[2], tanggalPecah1[1] - 1, tanggalPecah1[0]);
        var tanggalObjek2 = new Date(tanggalPecah2[2], tanggalPecah2[1] - 1, tanggalPecah2[0]);

        // Menghitung selisih bulan antara dua tanggal
        var selisihBulan = (tanggalObjek2.getFullYear() - tanggalObjek1.getFullYear()) * 12 + tanggalObjek2.getMonth() - tanggalObjek1.getMonth();

        $("#usia_saat_ukur").val(selisihBulan);
    }

    $("#btn_cek_pengukuran").click(function() {

        if ($("#usia_saat_ukur").val() == "") {

            let alert = "Usia Ukur Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }


        if ($("#jenis_kelamin").val() == "") {

            let alert = "Jenis Kelamin Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#tinggi").val() == "") {

            let alert = "Tinggi Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        $.ajax({
            url: "<?= base_url('MainApp/PengukuranStunting/Get_hasil_pengukuran_stunting'); ?>",
            type: "POST",
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading ...',
                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                    timerProgressBar: false,
                    showConfirmButton: false
                });
            },
            data: {
                usia_saat_ukur: $("#usia_saat_ukur").val(),
                jenis_kelamin: $("#jenis_kelamin").val(),
                tinggi: $("#tinggi").val().replaceAll(",", ".")
            },
            dataType: "JSON",
            success: function(response) {

                if (response.PengukuranTinggi.length > 0) {
                    $.each(response.PengukuranTinggi, function(i, v) {
                        let hasil = parseFloat(v.hasil).toFixed(2)

                        $("#zs_tb_u").val(hasil);

                        if (hasil >= 0) {
                            $("#kesimpulan").val("Tidak Stunting");
                            $("#rekomendasi").show();

                            var paragraph = document.getElementById("kesimpulan");
                            paragraph.classList.remove("bg-success");
                            paragraph.classList.remove("bg-warning");
                            paragraph.classList.remove("bg-danger");

                            paragraph.classList.add("bg-success");
                            paragraph.style.color = "white";

                        } else if (hasil >= -1.75 && hasil <= 0) {
                            $("#kesimpulan").val("Hampir Stunting");
                            $("#rekomendasi").show();

                            var paragraph = document.getElementById("kesimpulan");
                            paragraph.classList.remove("bg-success");
                            paragraph.classList.remove("bg-warning");
                            paragraph.classList.remove("bg-danger");

                            paragraph.classList.add("bg-warning");
                            paragraph.style.color = "white";
                        } else {
                            $("#kesimpulan").val("Stunting");
                            $("#rekomendasi").show();

                            var paragraph = document.getElementById("kesimpulan");
                            paragraph.classList.remove("bg-success");
                            paragraph.classList.remove("bg-warning");
                            paragraph.classList.remove("bg-danger");

                            paragraph.classList.add("bg-danger");
                            paragraph.style.color = "white";
                        }

                    });

                    var alert = "Nilai Pengukuran Keluar";
                    message_custom("Info", "info", alert);
                } else {
                    var alert = "Data pengukuran tidak ada!";
                    message_custom("Info", "info", alert);

                    $("#zs_tb_u").val('');
                    $("#kesimpulan").val('');
                    $("#rekomendasi").hide();

                    var paragraph = document.getElementById("kesimpulan");
                    paragraph.classList.remove("bg-success");
                    paragraph.classList.remove("bg-warning");
                    paragraph.classList.remove("bg-danger");
                    paragraph.style.color = "";
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var alert = "Error 500 Internal Server Connection Failure";
                message_custom("Error", "error", alert);
            },
            complete: function() {
                // Swal.close();
            }
        });
    });

    $("#btn_simpan_pengukuran").click(function() {

        if ($("#tanggal_lahir").val() == "") {

            let alert = "Tanggal Lahir Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#usia_saat_ukur").val() == "") {

            let alert = "Usia Ukur Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#jenis_kelamin").val() == "") {

            let alert = "Jenis Kelamin Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#tinggi").val() == "") {

            let alert = "Tinggi Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#berat").val() == "") {

            let alert = "Berat Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#cara_pengukuran").val() == "") {

            let alert = "Cara Pengukuran Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#lk").val() == "") {

            let alert = "Lingkar Kepala Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#nama_anak").val() == "") {

            let alert = "Nama Anak Tidak Boleh Kosong";
            message_custom("Error", "error", alert);

            return false;
        }

        if ($("#kesimpulan").val() == "") {

            let alert = "Kesimpulan Tidak Boleh Kosong, Tekan tombol cek terlebih dahulu";
            message_custom("Error", "error", alert);

            return false;
        }

        $.ajax({
            url: "<?= base_url('MainApp/PengukuranStunting/insert_pengukuran_stunting'); ?>",
            type: "POST",
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading ...',
                    html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                    timerProgressBar: false,
                    showConfirmButton: false
                });
            },
            data: {
                nama_anak: $("#nama_anak").val(),
                tanggal_pengukuran: $("#tanggal_pengukuran").val(),
                tanggal_lahir: $("#tanggal_lahir").val(),
                usia_saat_ukur: $("#usia_saat_ukur").val(),
                jenis_kelamin: $("#jenis_kelamin").val(),
                tinggi: $("#tinggi").val().replaceAll(",", "."),
                berat: $("#berat").val().replaceAll(",", "."),
                lk: $("#lk").val().replaceAll(",", "."),
                cara_pengukuran: $("#cara_pengukuran").val(),
                zs_tb_u: $("#zs_tb_u").val(),
                kesimpulan: $("#kesimpulan").val(),
            },
            dataType: "JSON",
            success: function(response) {

                if (response.status == 1) {
                    var alert = "Data Berhasil Disimpan";
                    message_custom("Success", "success", alert);

                    ResetForm();

                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    var alert = "Data Gagal Disimpan";
                    message_custom("Error", "error", alert);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var alert = "Error 500 Internal Server Connection Failure";
                message_custom("Error", "error", alert);
            },
            complete: function() {
                // Swal.close();
            }
        });
    });

    function ResetForm() {

        $("#nama_anak").val('');
        $("#usia_saat_ukur").val('');
        $("#jenis_kelamin").val('');
        $("#tinggi").val('');
        $("#berat").val('');
        $("#lk").val('');
        $("#zs_tb_u").val('');
        $("#kesimpulan").val('');
        $("#rekomendasi").hide();
    }

    var berat = document.getElementById('berat');
    berat.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        berat.value = formatRupiah(this.value);
    });

    var tinggi = document.getElementById('tinggi');
    tinggi.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        tinggi.value = formatRupiah(this.value);
    });
</script>