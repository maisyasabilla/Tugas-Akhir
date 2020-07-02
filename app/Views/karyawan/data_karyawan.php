    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-30">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 p-0">
                            <h3 class="card-title upper fw-300 montserrat">Data Karyawan</h3>
                            <hr style="border-top: 3px solid #f16923; width: 15%">
                        </div>
                        <div class="col-sm-12 col-md-9 p-0">
                        <a href="<?php echo base_url('perjalanan_dinas/tambah_karyawan');?>"><button class="col-sm-4 floatr fs-12 ls-3 bg-hijau btn-login no-br" style="height: 35px; width: 300px"><i class="fa fa-plus"></i> Tambah Karyawan</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body pl-0 pr-0">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100 fw-400 alignc">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jenjang</th>
                                    <th>Golongan</th>
                                    <th>Jabatan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pegawai as $item): ?>
                                <tr>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->jenjang ?></td>
                                    <td><?= $item->golongan ?></td>
                                    <td><?= $item->jabatan ?></td>
                                    <td style="width: 90px">
                                    <a href="<?php echo base_url('perjalanan_dinas/edit_karyawan');?>">
                                            <button class="bg-hijau floatl mr-5 text-putih p-5 pl-10 pr-10 br-5 noborder">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="">
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
