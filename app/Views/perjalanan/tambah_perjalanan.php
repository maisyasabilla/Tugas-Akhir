<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-30">
                <div class="card-header pl-0">
                    <h3 class="card-title upper fw-400 montserrat">Tambah Perjalanan</h3>
                    <hr style="border-top: 3px solid #f16923; width: 3%">
                </div>
                <div class="card-body pl-0 pr-0 fs-15">
                    <form class="w-100" action="<?= base_url() ?>/pegawaicontrol/tambah" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="nama" required>
                                <?php foreach($pegawai as $item): ?>
                                <option
                                    value="<?= $item->nip ?>"
                                >
                                    <?= $item->nip ?> - <?= $item->nama ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                            <div class="col-sm-9">
                            <input type="date" name="tgl_berangkat" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_kembali" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Wilayah Asal</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="wilayah_asal" required>
                                <?php foreach($wilayah as $item): ?>
                                <option
                                    value="<?= $item->id_wilayah ?>"
                                >
                                    <?= $item->wilayah ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Wilayah Tujuan</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="wilayah_tujuan" required>
                                <?php foreach($wilayah as $item): ?>
                                <option
                                    value="<?= $item->id_wilayah ?>"
                                >
                                    <?= $item->wilayah ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alat Angkut</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="alat_angku" required>
                                <option value="Umum">Umum</option>
                                <option value="Dinas">Dinas</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Transportasi</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="transportasi" required>
                                <?php foreach($transportasi as $item): ?>
                                <option
                                    value="<?= $item->id_transportasi ?>"
                                >
                                    <?= $item->transportasi ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Harga Tiket</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="harga_tiket"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Komando</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" name="komando" required>
                                <option value="General Manager KBM Ecotourism">General Manager KBM Ecotourism</option>
                                <option value="Kepala Divre Jabar">Kepala Divre Jabar</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <textarea name="tujuan" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                        </div>
                        <button class="col-sm-4 floatr fs-12 ls-3 fw-600 bg-hijau btn-login no-br" style="height: 35px; width: 220px" value="simpan"><i class="fa fa-check"></i> Simpan</button>
                    </form>
                    <a href="<?php echo base_url('perjalanan_dinas/data_karyawan');?>"><button class="col-sm-4 floatr mr-10 fs-12 ls-3 fw-600 bg-oranye btn-login no-br" style="height: 35px; width: 220px"><i class="fa fa-times"></i> Batal</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
