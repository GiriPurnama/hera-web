<?php 
  include "auth.php";
?>
<!DOCTYPE html>
<html>
  <?php 
    include "library-css.php";
    $cabang = $_SESSION['branch'];
  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    include "library-header.php";
    include "library-sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
              <form method="post" action="server.php">
                  <div class="form-group">
                    <label>Nama Kandidat</label>
                     <select class="form-control opacity0" name="nama_kandidat" required>
                      <option value="">-</option>
                      <?php 
                        $refrensi = mysqli_query($db, "SELECT * FROM login");
                        while ($row = mysqli_fetch_assoc($refrensi)) {
                        $nama_lengkap = $row['nama_lengkap'];
                      ?> 
                      
                      <option value="<?= $nama_lengkap; ?>"><?= $nama_lengkap; ?></option>                     
                      
                      <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Komentar</label>
                    <textarea class="form-control" name="komentar"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="simpan_voting" value="Simpan">
                  </div>
              </form>
              <div class="link-result">
                <a href="hasil-voting.php">Hasil Voting</a>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="">PT Harda Esa Raksa</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
   $(function () {
   $('#table-user').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'columnDefs': [
          { "searchable": false, "targets": 9 },
          { "searchable": false, "targets": 8 },
          { "searchable": false, "targets": 9 },
          { "searchable": false, "targets": 11 },
          { "searchable": false, "targets": 12 }
        ]
    })
    // $('#example1').DataTable()
   
  })
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
