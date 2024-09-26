<main id="main">

    <!-- ======= contact Section ======= -->
    <section id="pengguna" class="pengguna" style="margin-top: 20px;">
        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <h4>Form Pengguna</h4>
                    <hr>
                    <?php foreach ($OrangTua as $orang_tua) : ?>
                        <div class="php-email-form">
                            <div class="form-group mt-3">
                                <label>Nomor Induk Kependudukan :</label>
                                <input type="text" name="orang_tua_id" class="form-control rounded-0" id="orang_tua_id" placeholder="Nama Anak" value="<?= $this->session->userdata('pengguna_reff_id') ?>" disabled>
                                <input type="hidden" name="pengguna_id" class="form-control rounded-0" id="pengguna_id" placeholder="Nama Anak" value="<?= $this->session->userdata('pengguna_id') ?>" disabled>
                                <input type="hidden" name="pengguna_username" class="form-control rounded-0" id="pengguna_username" placeholder="Nama Anak" value="<?= $this->session->userdata('pengguna_username') ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label>Nama :</label>
                                <input type="text" name="orang_tua_nama" class="form-control rounded-0" id="orang_tua_nama" value="<?= $orang_tua['orang_tua_nama'] ?>" placeholder="Nama Anak" onkeyup="validateOnKeyUp(event,'orang_tua_nama')" required>
                                <p id="feedback-orang_tua_nama"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control rounded-0" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $orang_tua['tgl_lahir'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control rounded-0" name="jenis_kelamin" id="jenis_kelamin" style="height:48px;" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" <?= $orang_tua['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= $orang_tua['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Alamat :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_alamat" id="orang_tua_alamat" placeholder="Alamat" value="<?= $orang_tua['orang_tua_alamat'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_alamat')" required>
                                <p id="feedback-orang_tua_alamat"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Kelurahan :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_kelurahan" id="orang_tua_kelurahan" placeholder="Kelurahan" value="<?= $orang_tua['orang_tua_kelurahan'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_kelurahan')" required>
                                <p id="feedback-orang_tua_kelurahan"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Kecamatan :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_kecamatan" id="orang_tua_kecamatan" placeholder="Kecamatan" value="<?= $orang_tua['orang_tua_kecamatan'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_kecamatan')" required>
                                <p id="feedback-orang_tua_kecamatan"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Kota :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_kota" id="orang_tua_kota" placeholder="Kota" value="<?= $orang_tua['orang_tua_kota'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_kota')" required>
                                <p id="feedback-orang_tua_kota"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Provinsi :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_provinsi" id="orang_tua_provinsi" placeholder="Provinsi" value="<?= $orang_tua['orang_tua_provinsi'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_provinsi')" required>
                                <p id="feedback-orang_tua_provinsi"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Negara :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_negara" id="orang_tua_negara" placeholder="Negara" value="<?= $orang_tua['orang_tua_negara'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_negara')" required>
                                <p id="feedback-orang_tua_negara"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Kode Pos :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_kode_pos" id="orang_tua_kode_pos" placeholder="Kode Pos" value="<?= $orang_tua['orang_tua_kode_pos'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_kode_pos')" required>
                                <p id="feedback-orang_tua_kode_pos"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>No Telp :</label>
                                <input type="text" class="form-control rounded-0" name="orang_tua_telp" id="orang_tua_telp" placeholder="No Telp" value="<?= $orang_tua['orang_tua_telp'] ?>" onkeyup="validateOnKeyUp(event,'orang_tua_telp')" required>
                                <p id="feedback-orang_tua_telp"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Email :</label>
                                <input type="email" class="form-control rounded-0" name="pengguna_email" id="pengguna_email" value="<?= $this->session->userdata('pengguna_email') ?>" placeholder="Email" onkeyup="validateOnKeyUp(event,'pengguna_email')" required>
                                <p id="feedback-pengguna_email"></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Password :</label>
                                <input type="password" class="form-control rounded-0" name="pengguna_password" id="pengguna_password" value="" placeholder="Password" onkeyup="validateOnKeyUp(event,'pengguna_password')" required>
                                <p id="feedback-pengguna_password"></p>
                            </div>
                            <div class="clear-fix"></div><br>
                            <div class="text-left">
                                <button class="btn btn-success" id="btn_update_pengguna"><i class="bi bi-floppy"></i> Simpan</button>
                                <a href="<?= base_url() ?>/MainApp/MainMenu" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->