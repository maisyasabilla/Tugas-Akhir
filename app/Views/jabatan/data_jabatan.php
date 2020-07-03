<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-30">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-12 col-md-3 p-0">
                        <h3 class="card-title upper fw-300 montserrat">Data Jabatan</h3>
                        <hr style="border-top: 3px solid #f16923; width: 15%">
                    </div>
                    <div class="col-sm-12 col-md-9 p-0">
                    <a href="<?php echo base_url('perjalanan_dinas/tambah_karyawan');?>"><button class="col-sm-4 floatr fs-12 ls-3 bg-hijau btn-login no-br" style="height: 35px; width: 300px"><i class="fa fa-plus"></i> Tambah Jabatan</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body pl-0 pr-0">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-100 fw-400 alignc">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jabatan</th>
                                <th>Jenjang Jabatan</th>
                                <th>Golongan Perjalanan</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($jabatan as $item): ?>
                            <tr>
                                <td><?= $item->id_jabatan ?></td>
                                <td><?= $item->jabatan ?></td>
                                <td><?= $item->jenjang_jabatan->jenjang_jabatan ?></td>
                                <td><?= $item->golongan_perjalanan->golongan_perjalanan ?></td>
                                <td style="width: 90px">
                                    <button class="bg-hijau floatl mr-5 text-putih p-5 pl-10 pr-10 br-5 noborder">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url("pegawaicontrol/hapus/$item->nip") ?>">
                                        <button class="bg-oranye floatl text-putih p-5 pl-10 pr-10 br-5 noborder">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>