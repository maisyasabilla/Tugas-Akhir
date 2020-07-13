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
                            <a href="<?php echo base_url('perjalanan_dinas/tambah_karyawan');?>">
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
                                    <th>Tanggal Berangkat</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Golongan Perjalanan</th>
                                    <th>Wilayah Tujuan</th>
                                    <th>Tujuan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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
