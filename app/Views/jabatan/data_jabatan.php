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
                                    <button class="bg-hijau floatl mr-5 text-putih p-5 pl-10 pr-10 br-5 noborder" data-toggle="modal" data-target="#myModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url("pegawaicontrol/hapus/$item->nip") ?>">
                                        <button class="bg-oranye floatl text-putih p-5 pl-10 pr-10 br-5 noborder">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header bg-oranye p-20 alignc">
                                                 <h4 class="modal-title text-putih alignc upper">Edit Jabatan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form class="w-100" action="<?= base_url() ?>/jabatancontrol/edit" method="post">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Jabatan</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" name="nip" class="form-control" value="<?= $item->jabatan ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Jenjang Jabatan</label>
                                                        <div class="col-sm-8">
                                                        <select class="custom-select mr-sm-2" name="golongan" required>
                                                            <?php foreach($jenjang as $item2): ?>
                                                                <option
                                                                    value="<?= $item2->jenjang_jabatan ?>"
                                                                    <?= $item->jenjang_jabatan->jenjang_jabatan == $item2->jenjang_jabatan ? 'selected' : '' ?>
                                                                >
                                                                    <?= $item2->jenjang_jabatan ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Golongan</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $item->golongan_perjalanan->golongan_perjalanan ?>" disabled>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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