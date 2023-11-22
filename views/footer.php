 <?php 
    if ( !in_array( $page, $header_blacklist_arr ) )
    {
  ?>
 <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright 
          <?= date('Y') ?>
      <strong><span><?= $website_title ?></span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- Developed by --> 
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php 
    }
  ?>
  <!-- Vendor JS Files -->
  <script src="<?= $server_name ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= $server_name ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $server_name ?>/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?= $server_name ?>/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= $server_name ?>/assets/vendor/quill/quill.min.js"></script>
  <!-- <script src="<?= $server_name ?>/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="<?= $server_name ?>/assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- datatables -->
  <script src="<?= $server_name ?>/assets/vendor/new_datatables/datatables.min.js" ></script>
  <script src="<?= $server_name ?>/assets/vendor/new_datatables/pdfmake.min.js" ></script>
  <script src="<?= $server_name ?>/assets/vendor/new_datatables/vfs_fonts.min.js" ></script>

  <script src="<?= $server_name ?>/assets/vendor/select2/js/select2.min.js" ></script>

  <script type="text/javascript">
		const server_name = <?= json_encode( $server_name ) ?>;
		const app_url = <?= json_encode( $app_url ) ?>;
	</script> 

  <!-- Template Main JS File -->
  <script src="<?= $server_name ?>/assets/js/main.js"></script>
  <script src="<?= $server_name ?>/assets/js/app.js"></script>

  <?php
    /*dynamically loading all js_modules*/
    $js_scripts = '';

    foreach ( $js_modules as $js_mod ) 
    {
      $js_scripts .= "<script src='$server_name/assets/js/$js_mod.js'></script>";
    }

    echo $js_scripts;
  ?>
  
  <script type="text/javascript">
    $( document ).ready( () => {
      $('#my_datatable, #my_datatable_2').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [ 'csv', 'excel', 'pdf' ],
        pageLength: 500,
        bLengthChange: false
      });
    } );
  </script>

</body>

</html>