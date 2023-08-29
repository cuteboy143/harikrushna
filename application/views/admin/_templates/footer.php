<script type="text/javascript">
$(document).ready(function() {
 $('.table').dataTable({
});
});
</script>
</div>
    </div>
    <div class="modal fade in" id="customModel" tabindex="-1" role="dialog" aria-labelledby="customModel" aria-hidden="true" style="overflow: auto;"></div>

    <div class="modal fade in" id="lightbox" tabindex="-1" role="dialog" aria-labelledby="customModel" aria-hidden="true">
        <div class="modal-dialog modal-top">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="lightbox-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <img src="" class="popup-image">
                </div>
            </div>
          </div>
    </div>

    <!-- Dynamic variable for JS -->
    <script type="text/javascript">
        var site_url = '<?= base_url(); ?>';
    </script>

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- Jquery-scripts -->
    <script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Moment js-->
    <script src="<?= base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <!-- Bootstrap-scripts js -->
    <script src="<?= base_url('assets/js/vendors/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js');?>"></script>
     <!-- Bootstrap-datepicker js -->
    <script src="<?=base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js');?>"></script>
    <!-- Custom scroll bar Js-->
    <script src="<?= base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <!-- Sidemenu js  -->
    <script src="<?= base_url('assets/plugins/sidemenu/icon-sidemenu.js'); ?>"></script>
    <!-- Sidemenu-responsive-tabs js -->
    <script src="<?= base_url('assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js'); ?>"></script>

    <script src="<?=base_url('assets/plugins/datatable/js/jquery.dataTables.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/js/dataTables.bootstrap4.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/dataTables.responsive.min.js');?>"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    
    <!-- Bootstrap-datepicker js-->
    <script src="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>
     <!-- Datepicker js  -->
    <script src="<?=base_url('assets/plugins/date-picker/date-picker.js');?>"></script>
    <script src="<?=base_url('assets/plugins/date-picker/jquery-ui.js');?>"></script>
    <script src="<?=base_url('assets/plugins/input-mask/jquery.maskedinput.js');?>"></script>

    <!-- Rightsidebar js -->
    <script src="<?= base_url('assets/plugins/sidebar/sidebar.js'); ?>"></script>

    <!-- Select2 js -->
    <script src="<?= base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>

    <script src="<?= base_url('assets/plugins/sweet-alert/sweetalert.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.2.5/js/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <!-- Custom JS-->
    <script src="<?= base_url('assets/js/theme.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.js?v='.time()); ?>"></script>

</body>
</html>
