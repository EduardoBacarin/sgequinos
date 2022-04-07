
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets')?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets')?>/js/adminlte.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/plugins/formValidation/formValidation.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/formValidation/framework/bootstrap.min.js') ?>"></script>

<?php
if (!empty($js_link)) {
    foreach ($js_link as $cada) {
        echo '<script src="' . $cada . '" ></script>';
    }
}

if (!empty($js)) {
    foreach ($js as $cada) {
        echo '<script src="' . base_url($cada) . '" ></script>';
    }
}
?>
</body>
</html>