<div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-30">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 p-0">
                            <h3 class="card-title upper">Data Perjalanan</h3>
                            <hr class="border-title">
                        </div>
                        <div class="col-sm-12 col-md-9 p-0">
                            <a href="<?php echo base_url('perjalanan_dinas/tambah_perjalanan');?>">
                                <button class="col-sm-12 col-md-6 col-lg-5 btn-login custom-btn"><i class="icon-plus"></i> Tambah Perjalanan</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pl-0 pr-0">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100 alignc">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal SPPD</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Wilayah Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Kendaraan</th>
                                    <th>Tujuan</th>
                                    <th>Biaya</th>
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
                                    <td>
                                        <a href="<?= base_url("perjalanan_dinas/detail_karyawan/$item->nip") ?>">
                                        <?= $item->pegawai->nama ?>
                                        </a>
                                    </td>
                                    <td><?= $item->jabatan->jabatan ?></td>
                                    <td><?= $item->wilayah->wilayah ?></td>
                                    <td><?= $item->perjalanan_tanggal->tgl_berangkat ?></td>
                                    <td><?= $item->perjalanan_tanggal->tgl_pulang ?></td>
                                    <td><?= $item->alat_angkut ?></td>
                                    <td><?= $item->tujuan ?></td>
                                    <td>Rp. <?= $item->perjalanan_biaya->total_biaya ?></td>
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
