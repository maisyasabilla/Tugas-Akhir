<div class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image bg-hijau"></div>
          <div class="card-body" style="min-height: 180px">
            <div class="author mb-20">
              <a href="#">
                <div class="avatar" style="float:none; margin:auto">
                <img src="<?php echo base_url('assets/img/iconuser.png');?>">
                </div>
              </a>
            </div>
            <p class="description text-center text-hitam fs-13">
              <span class="fw-600 fs-15"><?= $pegawai->nama ?></span><br>
              <span class="fw-600"><?= $jabatan->jabatan ?> 
              (<?= $jenjang->jenjang_jabatan ?>)<span><br>
              <?= $pegawai->nip ?><br>
            </p>
          </div>
          <div class="card-footer">
            <hr>
            <div class="button-container">
              <div class="row  text-hitam">
                <div class="col-lg-7 col-md-6 col-6 ml-auto ">
                  <h5><?= $golongan->id_golongan ?> - <?= $golongan->golongan ?>
                    <br>
                    <small>Golongan</small>
                  </h5>
                </div>
                <div class="col-lg-5 col-md-6 col-6 ml-auto mr-auto">
                  <h5><?= $golonganper->golongan_perjalanan ?>
                    <br>
                    <small>Gol. Perjalanan</small>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-user p-30">
          <div class="card-header">
            <h3 class="card-title upper">History Perjalanan</h3>
          </div>
          <div class="card-body">
            <hr class="border-title ml-0 mt-20">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100 alignc">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal SPPD</th>
                            <th>Wilayah Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Pulang</th>
                            <th>Tujuan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($perjalanan as $item): ?>
                        <tr>
                            <td><?= $item->id_perjalanan ?></td>
                            <td>
                                <a href="<?= base_url("perjalanan_dinas/detail_perjalanan/$item->id_perjalanan") ?>">
                                <?= $item->perjalanan_tanggal->tgl_sppd ?>
                                </a>
                            </td>
                            <td><?= $item->wilayah->wilayah ?></td>
                            <td><?= $item->perjalanan_tanggal->tgl_berangkat ?></td>
                            <td><?= $item->perjalanan_tanggal->tgl_pulang ?></td>
                            <td><?= $item->tujuan ?></td>
                            <td style="width: 50px">
                                <button class="btn-action bg-oranye" data-toggle="modal" data-target="#modalhapus-id-<?= $item->id_perjalanan ?>">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalhapus-id-<?= $item->id_perjalanan ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header bg-oranye p-20">
                                                <h3 class="modal-title text-putih upper"><i class="icon-pencil"></i> Hapus <b>Perjalanan</b></h3>
                                                <button type="button" class="close" data-dismiss="modal" data-target="#modal-id-<?= $item->id_perjalanan ?>">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body p-30 alignc">
                                                Anda yakin akan menghapus data?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <div class="row w-100">
                                                    <div class="col-sm-6 pr-0">
                                                        <a href="<?= base_url("perjalanancontrol/hapus/$item->id_perjalanan") ?>">
                                                            <button class="btn-login btn-modal" value="simpan" ><i class="fa fa-check"></i> Hapus</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="btn-login btn-modal bg-oranye" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</div>

<script>
    $(document).ready(function() {
        $('#example').dataTable({
            "dom": '<"col-sm-12 col-md-4 p-0 mb-10"<"top"f>>rt<"floatr bottom"p><"clear">',
            "aLengthMenu": [[5, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, 'All']],
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