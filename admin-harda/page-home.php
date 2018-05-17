
<!DOCTYPE html>
<html>
  <?php 
    include "library-css.php";
    include "../modal.php";
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
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Tabel Pelamar</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
              <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalHome">Tambah Baru <i class="fa fa-plus-square"></i></button>
              </a>
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Deskripsi</th>
                  <th>Image</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1;
                    $home = mysqli_query($db, "SELECT * FROM menu_home");
                    while ($row = mysqli_fetch_assoc($home)) {
                    $title_image = $row['title_img'];
                    $deksripsi_image = $row['desc_img'];
                    $image_home = $row['image_home'];
                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $title_image ?></td>
                  <td><?php echo $deksripsi_image ?></td>
                  <td><img class="img-home" src="<?php echo $image_home ?>"></td>
                  <td>
                    <a href='javascript:void(0)'><span class='action-icon'><i class='fa fa-cogs'></i></span></a>
                    
                    <a href='server.php?idhome=<?php echo $row['idhome']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                    <!-- <a href=""><span class="action-icon"><i class="fa fa-eye"></i></span></a> -->
                  </td>
                </tr>

                <?php $no++; } ?>
              </tbody>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
      'autoWidth'   : false
    })
    // $('#example1').DataTable()
   
  })
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
