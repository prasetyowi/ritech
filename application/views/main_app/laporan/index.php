<main id="main">

    <!-- ======= contact Section ======= -->
    <section id="pengguna" class="pengguna" style="margin-top: 20px;">
        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <div class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" name="filter_tahun" class="form-control rounded-0" id="filter_tahun" placeholder="Tahun Pengukuran" value="<?= date('Y') ?>" onkeypress="Get_pengukuran_stunting_by_filter()">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <select class="form-control rounded-0" name="filter_bulan" id="filter_bulan" style="height:48px;" onchange="Get_pengukuran_stunting_by_filter()">
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!-- End Contact Form -->

            </div>

        </div><br>

        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <table class="table" id="table_pengukuran_stunting">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Anak</th>
                                <th>Tanggal Pengukuran</th>
                                <th>Kesimpulan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table><br>
                    <a href="<?= base_url() ?>/MainApp/MainMenu" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->