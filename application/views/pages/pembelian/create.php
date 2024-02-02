<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pembelian</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-horizontal form-label-left">

                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nomor Pembelian</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_kode" name="Pembelian[pembelian_kode]" value="" required>
                                    <input type="hidden" class="form-control col-md-10" id="Pembelian-pembelian_id" name="Pembelian[pembelian_id]" value="<?= $pembelian_id; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tanggal Pembelian</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control col-md-10" id="Pembelian-pembelian_tanggal" name="Pembelian[pembelian_tanggal]" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nomor Purchase Order</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_no_po" name="Pembelian[pembelian_no_po]" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_nama" name="Pembelian[customer_nama]" value="" required />
                                    <input type="hidden" class="form-control col-md-10" id="Pembelian-customer_id" name="Pembelian[customer_id]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kelurahan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_kelurahan" name="Pembelian[customer_kelurahan]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kecamatan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_kecamatan" name="Pembelian[customer_kecamatan]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kota</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_kota" name="Pembelian[customer_kota]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Provinsi</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_provinsi" name="Pembelian[customer_provinsi]" value="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Kodepos</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-customer_kode_pos" name="Pembelian[customer_kode_pos]" value="" disabled />
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Jumlah Material</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-jumlah" name="Pembelian[jumlah]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Waktu Pengiriman (Hari)</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_waktu_pengiriman" name="Pembelian[pembelian_waktu_pengiriman]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Waktu Pengerjaan (Hari)</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_waktu_pengerjaan" name="Pembelian[pembelian_waktu_pengerjaan]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Jumlah Termin Pembayaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_termin_pembayaran" name="Pembelian[pembelian_termin_pembayaran]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Periode Penawaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-periode_penawaran" name="Pembelian[periode_penawaran]" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Garansi</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-garansi" name="Pembelian[garansi]" value="" required />
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Catatan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="resizable_textarea form-control col-md-10" id="Pembelian-pembelian_keterangan" name="Pembelian[pembelian_keterangan]" style="height:200px">
1. Harga belum termasuk PPn 11% dan franco Driyorejo (pabrik customer) dan berlaku sampai 31 Juli 2023.
2. Customer menyediakan kebutuhan utilitas (listrik dan sumber air) disediakan oleh customer.</textarea>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control col-md-10" id="Pembelian-pembelian_status" name="Pembelian[pembelian_status]" value="Draft" disabled />
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12  ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>File Uploader</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <p>Drag files ke dalam box untuk upload atau click select files.</p>
                                            <div class="dropzone"></div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row ">
                                <button class="btn btn-primary" id="btn_tambah_termin"><i class="fa fa-plus"></i> Tambah Termin</button>
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table" id="table-pembelian-termin" style="width:70%">
                                        <thead>
                                            <tr class=" headings">
                                                <th>#</th>
                                                <th class="column-title">Keterangan </th>
                                                <th class="column-title">Termin Pembayaran (%) </th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row ">
                                <button class="btn btn-primary" id="btn_modal_pilih_barang"><i class="fa fa-search"></i> Pilih Barang</button>
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table" id="table-pembelian-detail" style="width:100%">
                                        <thead>
                                            <tr class=" headings">
                                                <th>#</th>
                                                <th class="column-title">Nama Barang </th>
                                                <th class="column-title">Qty </th>
                                                <th class="column-title">Unit </th>
                                                <th class="column-title">Remarks </th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <a href="<?= base_url() ?>pembelian" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                                <button class="btn btn-success" id="btn_simpan_pembelian"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->

<div class="modal fade bs-example-modal-xl" id="modal-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped jambo_table" id="table-list-barang" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th><input type="checkbox" id="check-all-barang"> </th>
                            <th class="column-title">Kode Barang </th>
                            <th class="column-title">Nama Barang </th>
                            <th class="column-title">Unit </th>
                            <th class="column-title">Harga Satuan </th>
                            <th class="column-title">Deskripsi </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_choose_multi_barang"><i class="fa fa-save"></i> Pilih</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal" id="btnbackpallet"><i class="fa fa-times"></i> Tutup</button>
            </div>

        </div>
    </div>
</div>