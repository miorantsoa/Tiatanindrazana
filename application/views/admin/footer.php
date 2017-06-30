<!-- footer content -->
        <div class="clearfix"></div>
        <footer>
          <div class="pull-right">
            &copy Tia Tanindrazana <?= date('Y')?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
            });
            $('#datetimepicker2').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
            });
        })
        function redirect(url){
            window.location.href = url;
        }
    </script>
    <script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/admin/js/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/admin/js/nprogress.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('assets/admin/js/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('assets/admin/js/bootstrap-progressbar.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/admin/js/icheck.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/moment.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/daterangepicker.js')?>"></script>
    <!--Datatables-->
    <script src="<?= base_url('assets/admin/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/buttons.flash.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/buttons.html5.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/buttons.print.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/responsive.bootstrap.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/vfs_fonts.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/admin/js/custom.min.js')?>"></script>
    <!--File upload-->
    <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
         This must be loaded before fileinput.min.js -->
    <script src="<?= base_url('assets/admin/js/plugins/canvas-to-blob.min.js')?>" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
         This must be loaded before fileinput.min.js -->
    <script src="<?= base_url('assets/admin/js/plugins/sortable.min.js')?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/admin/js/fileinput.min.js')?>"></script>
    <!-- the main fileinput plugin file -->
    <!-- optionally if you need a theme like font awesome theme you can include
         it as mentioned below -->
    <script src="<?= base_url('assets/admin/themes/explorer/theme.js')?>"></script>
  </body>	
</html>