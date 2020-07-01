    <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
            <div class="row">
                <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                    document.write(new Date().getFullYear())
                    </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                </span>
                </div>
            </div>
        </div>
    </footer>
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
    <!--   Core JS Files   -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script> 
    <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/js/plugins/chartjs.min.js');?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url('assets/js/paper-dashboard.min.js');?>" type="text/javascript"></script>
</body>
</html>