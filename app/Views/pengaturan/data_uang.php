<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-30">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-12 col-md-3 p-0">
                        <h3 class="card-title upper">Data Uang Harian</h3>
                        <hr class="border-title">
                    </div>
                    <div class="col-sm-12 col-md-9 p-0">
                        <button class="col-sm-12 col-md-5 col-lg-5 btn-login custom-btn" data-toggle="modal" data-target="#modalTambah"><i class="icon-plus"></i> Tambah Uang Harian</button>
                    </div>
                </div>
            </div>
            <div class="card-body pl-0 pr-0">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-100 alignc">
                        <thead>
                            <tr>
                                <th>Wilayah</th>
                                <th>Biaya</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($uang as $item): ?>
                            <tr>
                                <td><?= $item->wilayah->wilayah ?></td>
                                <td>Rp. <?= $item->biaya ?></td>
                                <td style="width: 90px">
                                    <button class="btn-action bg-hijau" data-toggle="modal" data-target="#modaledit-id-<?= $item->id_uang ?>">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <button class="btn-action bg-oranye" data-toggle="modal" data-target="#modalhapus-id-<?= $item->id_uang ?>">
                                        <i class="icon-trash"></i>
                                    </button>
                                </td>
                                 <!-- Modal Edit -->
                                 <div class="modal fade" id="modaledit-id-<?= $item->id_uang ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header bg-oranye p-20">
                                                <h3 class="modal-title text-putih upper"><i class="icon-pencil"></i> Edit <b>Uang</b> Harian</h3>
                                            <button type="button" class="close" data-dismiss="modal" data-target="#modal-id-<?= $item->id_uang ?>">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body p-30 pt-40 alignl">
                                            <form class="w-100" action="<?= base_url() ?>/uangcontrol/edit" method="post">
                                            <div class="form-group row">
                                                <input type="hidden" name="id_uang" value="<?= $item->id_uang ?>" required>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Wilayah</label>
                                                <div class="col-sm-7">
                                                <select class="custom-select mr-sm-2" name="wilayah" required>
                                                    <?php foreach($wilayah as $item3): ?>
                                                        <option
                                                            value="<?= $item3->id_wilayah ?>"
                                                            <?= $item->wilayah->id_wilayah == $item3->id_wilayah ? 'selected' : '' ?>
                                                        >
                                                            <?= $item3->wilayah ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Biaya</label>
                                                <div class="col-sm-7">
                                                <input type="number" name="biaya" class="form-control" value="<?= $item->biaya ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <div class="row w-100">
                                                <div class="col-sm-6 pr-0">
                                                    <button class="btn-login btn-modal" value="simpan" ><i class="fa fa-check"></i> Simpan</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-login btn-modal bg-oranye" data-dismiss="modal" style="height: 35px;"><i class="fa fa-times"></i> Batal</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalhapus-id-<?= $item->id_uang ?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header bg-oranye p-20">
                                                <h3 class="modal-title text-putih upper"><i class="icon-trash"></i> Hapus <b>Uang</b> Harian</h3>
                                            <button type="button" class="close" data-dismiss="modal" data-target="#modal-id-<?= $item->id_uang ?>">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body p-30 alignc">
                                            Anda yakin akan menghapus data?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <div class="row w-100">
                                                <div class="col-sm-6 pr-0">
                                                    <a href="<?= base_url("uangcontrol/hapus/$item->id_uang") ?>">
                                                        <button class="btn-login btn-modal" value="simpan" ><i class="fa fa-check"></i> Hapus</button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-login btn-modal bg-oranye" data-dismiss="modal" ><i class="fa fa-times"></i> Batal</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>
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
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-oranye p-20">
            <h3 class="modal-title text-putih upper"><i class="icon-plus"></i> Tambah <b>Uang</b> Harian</h3>
            <button type="button" class="close" data-dismiss="modal" data-target="#modalTambah">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body p-30 pt-40">
            <form class="w-100" action="<?= base_url() ?>/uangcontrol/tambah" method="post">
            <div class="form-group row">
                <label class="col-sm-5 col-form-label">Wilayah</label>
                <div class="col-sm-7">
                <select class="custom-select mr-sm-2" name="wilayah" required>
                    <?php foreach($wilayah as $item4): ?>
                        <option
                            value="<?= $item4->id_wilayah ?>"
                            <?= $item4->id_wilayah ?>
                        >
                            <?= $item4->wilayah ?>
                        </option>
                    <?php endforeach ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label">Biaya</label>
                <div class="col-sm-7">
                <input type="number" name="biaya" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <div class="row w-100">
                <div class="col-sm-5 pr-0">
                    <button class="btn-login btn-modal" value="simpan" ><i class="fa fa-check"></i> Simpan</button>
                    </form>
                </div>
                <div class="col-sm-7">
                    <button class="btn-login btn-modal bg-oranye" data-dismiss="modal" style="height: 35px;"><i class="fa fa-times"></i> Batal</button>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').dataTable({
            "dom": '<"col-sm-12 col-md-4 p-0 mb-10"<"top"f>>rt<"floatr bottom"p><"clear">',
            "aLengthMenu": [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, 'All']],
            "lengthChange": false,
            "language": {
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "_MENU_ per halaman",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",
                "sInfoEmpty":    "",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "",
                "searchPlaceholder": "Pencarian",
                "sUrl":          "",
                "oPaginate": {
                "sFirst":    "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext":     "Selanjutnya",
                "sLast":     "Terakhir"
                }
            }

        });
    } );

</script>
