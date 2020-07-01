<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-30">
                <div class="card-header pl-0">
                    <h3 class="card-title upper fw-400 montserrat">Edit Karyawan</h3>
                    <hr style="border-top: 3px solid #f16923; width: 3%">   
                </div>
                <div class="card-body pl-0 pr-0 fs-15">
                    <form class="w-100" action="<?= base_url() ?>/sistem/tambahkaryawan" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Golongan</label>
                            <div class="col-sm-10">
                            <select class="custom-select mr-sm-2" name="golongan" required>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                            <select class="custom-select mr-sm-2" name="jabatan" required>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
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
