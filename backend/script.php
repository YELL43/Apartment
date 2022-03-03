 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <!-- <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script> -->
 <!-- Bootstrap 4 -->
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="plugins/moment/moment.min.js"></script>
 <script src="plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="dist/js/pages/dashboard.js"></script>

 <!-- DataTables  & Plugins -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="plugins/jszip/jszip.min.js"></script>
 <script src="plugins/pdfmake/pdfmake.min.js"></script>
 <script src="plugins/pdfmake/vfs_fonts.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- sweetalert star -->
 <script src="plugins/toastr/toastr.min.js"></script>
 <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- sweetalert end -->

 <!-- Ekko Lightbox -->
 <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
 <!-- Filterizr-->
 <script src="plugins/filterizr/jquery.filterizr.min.js"></script>



 <!-- date time -->
 <script>
     $(function() {
         $('input[name="datepicker"]').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 1901,
             maxYear: parseInt(moment().format('YYYY'), 10)
         }, );
     });
 </script>

 <!-- Page specific script -->
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["excel", "pdf", "print"],
             "oLanguage": {
                 "sLengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                 "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                 "sInfo": "รายการที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                 "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 รายการ",
                 "sInfoFiltered": "(จากรายการทั้งหมด _MAX_ รายการ)",
                 "sSearch": "ค้นหา :",
                 "aaSorting": [
                     [0, 'desc']
                 ],
                 "oPaginate": {
                     "sFirst": "หน้าแรก",
                     "sPrevious": "ก่อนหน้า",
                     "sNext": "ถัดไป",
                     "sLast": "หน้าสุดท้าย"
                 },
             }
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
             "paging": true,
             //  "lengthChange": false,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
             "oLanguage": {
                 "sLengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                 "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                 "sInfo": "รายการที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                 "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 รายการ",
                 "sInfoFiltered": "(จากรายการทั้งหมด _MAX_ รายการ)",
                 "sSearch": "ค้นหา :",
                 "aaSorting": [
                     [0, 'desc']
                 ],
                 "oPaginate": {
                     "sFirst": "หน้าแรก",
                     "sPrevious": "ก่อนหน้า",
                     "sNext": "ถัดไป",
                     "sLast": "หน้าสุดท้าย"
                 },
             }
         });
     });
 </script>

 <!-- Page specific script
 <script>
     $(function() {
         var Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000
         });

         (function() {
             Toast.fire({
                 icon: 'success',
                 title: 'บันทึกข้อมูลสำเร็จ'
             })
         });
         $('.swalDefaultInfo').click(function() {
             Toast.fire({
                 icon: 'info',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         function error() {
             Toast.fire({
                 icon: 'error',
                 title: 'ชื่อผู้ใช้หรือ รหัสผ่านไม่ถูกต้อง'
             })
         }
         $('.swalDefaultWarning').click(function() {
             Toast.fire({
                 icon: 'warning',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.swalDefaultQuestion').click(function() {
             Toast.fire({
                 icon: 'question',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });

         $('.toastrDefaultSuccess').click(function() {
             toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
         });
         $('.toastrDefaultInfo').click(function() {
             toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
         });
         $('.toastrDefaultError').click(function() {
             toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
         });
         $('.toastrDefaultWarning').click(function() {
             toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
         });

         $('.toastsDefaultDefault').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultTopLeft').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 position: 'topLeft',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultBottomRight').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 position: 'bottomRight',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultBottomLeft').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 position: 'bottomLeft',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultAutohide').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 autohide: true,
                 delay: 750,
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultNotFixed').click(function() {
             $(document).Toasts('create', {
                 title: 'Toast Title',
                 fixed: false,
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultFull').click(function() {
             $(document).Toasts('create', {
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 icon: 'fas fa-envelope fa-lg',
             })
         });
         $('.toastsDefaultFullImage').click(function() {
             $(document).Toasts('create', {
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 image: '../../dist/img/user3-128x128.jpg',
                 imageAlt: 'User Picture',
             })
         });
         $('.toastsDefaultSuccess').click(function() {
             $(document).Toasts('create', {
                 class: 'bg-success',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultInfo').click(function() {
             $(document).Toasts('create', {
                 class: 'bg-info',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultWarning').click(function() {
             $(document).Toasts('create', {
                 class: 'bg-warning',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultDanger').click(function() {
             $(document).Toasts('create', {
                 class: 'bg-danger',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.toastsDefaultMaroon').click(function() {
             $(document).Toasts('create', {
                 class: 'bg-maroon',
                 title: 'Toast Title',
                 subtitle: 'Subtitle',
                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
     });
 </script> -->

 <script>
     $(function() {
         $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox({
                 alwaysShowClose: true
             });
         });

         $('.filter-container').filterizr({
             gutterPixels: 3
         });


         $('.btn[data-filter]').on('click', function() {
             $('.btn[data-filter]').removeClass('active');
             $(this).addClass('active');
         });
     })
 </script>


 <style>
     @import 'https://fonts.googleapis.com/css?family=Sriracha|Prompt';

     * {
         font-family: 'Sriracha', sans-serif;
     }
 </style>

 