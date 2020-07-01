<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <div class="card-title">TAMBAH KARYAWAN</div>
                </div>
                <div class="card-body p-30">
                    <form class="w-100" action="<?= base_url() ?>/sistem/tambahkaryawan" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="NIP" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama" required>
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
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="col-sm-4 floatr btn-login no-br" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
