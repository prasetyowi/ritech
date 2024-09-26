<main id="main">

    <!-- ======= pengguna Section ======= -->
    <section id="pengguna" class="pengguna" style="margin-top: 20px;">
        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <h4>Form Pengkuran Stunting</h4>
                    <hr>
                    <div class="php-email-form">
                        <?php foreach ($Pengukuran as $header) : ?>
                            <div class="form-group mt-3">
                                <label>Nama Orang Tua :</label>
                                <input type="text" name="nama_orang_tua" class="form-control rounded-0" id="nama_orang_tua" placeholder="Nama Anak" value="<?= $header['nama_orang_tua']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Nama Anak :</label>
                                <input type="text" name="nama_anak" class="form-control rounded-0" id="nama_anak" placeholder="Nama Anak" value="<?= $header['nama_anak']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control rounded-0" name="jenis_kelamin" id="jenis_kelamin" style="height:48px;" disabled>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" <?= $header['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= $header['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Tanggal Lahir :</label>
                                <input type="text" class="form-control rounded-0 datepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" onchange="hitungUmurBulan()" value="<?= $header['tanggal_lahir']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Usia Saat Ukur (Bulan) :</label>
                                <input type="text" class="form-control rounded-0" name="usia_saat_ukur" id="usia_saat_ukur" placeholder="Usia Saat Ukur (Bulan)" value="<?= $header['usia_saat_ukur']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Berat Badan (Kg) :</label>
                                <input type="text" class="form-control rounded-0" name="berat" id="berat" placeholder="Berat Badan (Kg)" value="<?= $header['berat']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Tinggi Badan (Cm) :</label>
                                <input type="text" class="form-control rounded-0" name="tinggi" id="tinggi" placeholder="Tinggi Badan (Cm)" value="<?= $header['tinggi']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Cara Pengukuran :</label>
                                <input type="text" class="form-control rounded-0" name="cara_pengukuran" id="cara_pengukuran" placeholder="Cara Pengukuran" value="<?= $header['cara_pengukuran']; ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Lingkar Kepala :</label>
                                <input type="text" class="form-control rounded-0" name="lk" id="lk" placeholder="Lingkar Kepala" value="<?= $header['lk']; ?>" disabled>
                            </div>
                            <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="zs_bb_u" id="zs_bb_u" placeholder="ZZ BB U" disabled>
                        </div> -->
                            <div class="form-group mt-3">
                                <label>ZS TB U :</label>
                                <input type="text" class="form-control rounded-0" name="zs_tb_u" id="zs_tb_u" placeholder="ZZ TB U" value="<?= $header['zs_tb_u']; ?>" disabled>
                            </div>
                            <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="zs_bb_tb" id="zs_bb_tb" placeholder="ZS BB TB" disabled>
                        </div> -->
                            <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="zs_lk_u" id="zs_lk_u" placeholder="ZS LK U" disabled>
                        </div> -->
                            <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="umur_bb" id="umur_bb" placeholder="Umur BB" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="umur_tb" id="umur_tb" placeholder="Umur TB" disabled>
                        </div> -->
                            <div class="form-group mt-3">
                                <label>Kesimpulan :</label>
                                <?php if ($header['kesimpulan'] == 'Tidak Stunting') { ?>
                                    <input type="text" class="form-control rounded-0 bg-success" style="color: white;" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan" value="<?= $header['kesimpulan']; ?>" disabled>
                                <?php } else if ($header['kesimpulan'] == 'Hampir Stunting') { ?>
                                    <input type="text" class="form-control rounded-0 bg-warning" style="color: white;" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan" value="<?= $header['kesimpulan']; ?>" disabled>
                                <?php } else { ?>
                                    <input type="text" class="form-control rounded-0 bg-danger" style="color: white;" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan" value="<?= $header['kesimpulan']; ?>" disabled>
                                <?php } ?>
                            </div>
                            <div class="form-group mt-3" id="rekomendasi">
                                <label>Rekomendasi :</label>
                                <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                                <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi1.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi1.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                                <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi2.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi2.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                            </div>
                            <br>
                            <div class="text-left">
                                <a href="<?= base_url() ?>/MainApp/Laporan" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                    </div>
                <?php endforeach; ?>
                </div><!-- End pengguna Form -->

            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->