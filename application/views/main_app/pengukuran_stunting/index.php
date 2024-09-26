<main id="main">

    <!-- ======= pengguna Section ======= -->
    <section id="pengguna" class="pengguna" style="margin-top: 20px;">
        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <h4>Form Pengkuran Stunting</h4>
                    <hr>
                    <div class="php-email-form">
                        <div class="form-group mt-3">
                            <label>Nama Orang Tua :</label>
                            <input type="text" name="nama_orang_tua" class="form-control rounded-0" id="nama_orang_tua" placeholder="Nama Anak" value="<?= $this->session->userdata('pengguna_nama') ?>" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label>Nama Anak :</label>
                            <input type="text" name="nama_anak" class="form-control rounded-0" id="nama_anak" placeholder="Nama Anak" onkeyup="validateOnKeyUp(event,'nama_anak')" required>
                            <p id="feedback-nama_anak"></p>
                        </div>
                        <div class="form-group mt-3">
                            <label>Jenis Kelamin :</label>
                            <select class="form-control rounded-0" name="jenis_kelamin" id="jenis_kelamin" style="height:48px;" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tanggal Pengukuran (Bulan/Tanggal/Tahun):</label>
                            <input type="text" class="form-control rounded-0 datepicker" name="tanggal_pengukuran" id="tanggal_pengukuran" placeholder="Tanggal Lahir" value="<?= date('d/m/Y') ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tanggal Lahir (Bulan/Tanggal/Tahun):</label>
                            <input type="text" class="form-control rounded-0 datepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= date('d/m/Y') ?>" onchange="hitungUmurBulan()" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Usia Saat Ukur (Bulan) :</label>
                            <input type="text" class="form-control rounded-0" name="usia_saat_ukur" id="usia_saat_ukur" placeholder="Usia Saat Ukur (Bulan)" value="0" onkeyup="validateOnKeyUp(event,'usia_saat_ukur')" disabled>
                            <p id="feedback-usia_saat_ukur"></p>
                        </div>
                        <div class="form-group mt-3">
                            <label>Berat Badan (Kg) :</label>
                            <input type="text" class="form-control rounded-0" name="berat" id="berat" placeholder="Berat Badan (Kg)" onkeyup="validateOnKeyUp(event,'berat')" required>
                            <p id="feedback-berat"></p>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tinggi Badan (Cm) :</label>
                            <input type="text" class="form-control rounded-0" name="tinggi" id="tinggi" placeholder="Tinggi Badan (Cm)" onkeyup="validateOnKeyUp(event,'tinggi')" required>
                            <p id="feedback-tinggi"></p>
                        </div>
                        <div class="form-group mt-3">
                            <label>Cara Pengukuran :</label>
                            <select class="form-control rounded-0" name="cara_pengukuran" id="cara_pengukuran" style="height:48px;" required>
                                <option value="">-- Pilih Cara Pengukuran --</option>
                                <option value="Berdiri">Berdiri</option>
                                <option value="Telentang">Telentang</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Lingkar Kepala :</label>
                            <input type="text" class="form-control rounded-0" name="lk" id="lk" placeholder="Lingkar Kepala" onkeyup="validateOnKeyUp(event,'lk')" required>
                            <p id="feedback-lk"></p>
                        </div>
                        <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control rounded-0" name="zs_bb_u" id="zs_bb_u" placeholder="ZZ BB U" disabled>
                        </div> -->
                        <div class="form-group mt-3">
                            <label>ZS TB U :</label>
                            <input type="text" class="form-control rounded-0" name="zs_tb_u" id="zs_tb_u" placeholder="ZZ TB U" onkeyup="validateOnKeyUp(event,'zs_tb_u')" disabled>
                            <p id="feedback-zs_tb_u"></p>
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
                            <input type="text" class="form-control rounded-0" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan" onkeyup="validateOnKeyUp(event,'kesimpulan')" disabled>
                            <p id="feedback-kesimpulan"></p>
                        </div>
                        <div class="form-group mt-3" id="rekomendasi" style="display: none;">
                            <label>Rekomendasi :</label>
                            <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                            <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi1.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi1.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                            <a href="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi2.jpg" target="_blank"><img src="<?= base_url() ?>/assets/upload/rekomendasi/rekomendasi2.jpg" class="img-thumbnail" alt="Rekomendasi Gizi"></a>
                        </div>
                        <div class="clear-fix"></div><br>
                        <div class="text-left">
                            <button class="btn btn-warning" id="btn_cek_pengukuran" style="color:white"><i class="bi bi-arrow-repeat"></i> Cek</button>
                            <button class="btn btn-success" id="btn_simpan_pengukuran"><i class="bi bi-floppy"></i> Submit</button>
                            <a href="<?= base_url() ?>/MainApp/MainMenu" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div><!-- End pengguna Form -->

            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->