  </div>

  <!-- Jquery JS-->
  <script src="<?=base_url()?>theme/vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="<?=base_url()?>theme/vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="<?=base_url()?>theme/vendor/slick/slick.min.js">
  </script>
  <script src="<?=base_url()?>theme/vendor/wow/wow.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/animsition/animsition.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="<?=base_url()?>theme/vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="<?=base_url()?>theme/vendor/circle-progress/circle-progress.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?=base_url()?>theme/vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="<?=base_url()?>theme/vendor/select2/select2.min.js"></script>
  <!-- <script src="<?=base_url()?>theme/js/sweetalert2.all.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="<?=base_url()?>theme/lib/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>theme/lib/datatables-responsive/dataTables.responsive.js"></script>

  <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true, 
          "paging":   false,
          "info":     false,
          searching: false,
           retrieve: true
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

  <!-- Main JS-->
  <script src="<?=base_url()?>theme/js/main.js"></script>

</body>

</html>
<!-- end document-->


