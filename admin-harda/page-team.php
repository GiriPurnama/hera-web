<?php 
  include "auth.php";
?>
<!DOCTYPE html>
<html>
  <?php 
    include "library-css.php";
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
        <li><a href="#"><i class="fa fa-user"></i>Beranda</a></li>
        <li class="active">Page Team</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Team Harda Esa Raksa</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
            
            <?php if ($status == "InternalHRD" || $status == "Master") { ?>
              
              <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalTeam">Tambah Baru <i class="fa fa-plus-square"></i></button>
              </a>

            <?php } ?>
              
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Nama Lengkap</th>
                  <th>Divisi</th>
                  <th>Image</th>
                  <th>Branch</th>
                  <th>No Emergency</th>
                  <th>Hubungan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                    $no = 1;
                    $team = mysqli_query($db, "SELECT * FROM login");
                    while ($row = mysqli_fetch_assoc($team)) {
                    $img_team = $row['img_divisi'];
                ?>

                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email_admin']; ?></td>
                  <td><?php echo $row['nama_lengkap']; ?></td>
                  <td><?php echo $row['divisi']; ?></td>
                  <td><img class="img-home" src="<?php echo $img_team; ?>"></td>
                  <td><?php echo $row['branch']; ?></td>
                  <td><?php echo $row['no_emergency']; ?></td>
                  <td><?php echo $row['hubungan']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>

                    <?php if ($status == "InternalHRD" || $status == "Master") { ?>
                      <?php echo "<a href='#modalHomeEdit' id='custId' data-toggle='modal' data-id=".$row['id_admin']."><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?> 
                      <a href='server.php?id_admin=<?php echo $row['id_admin']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                    <?php } ?>
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
  $('#modalHomeEdit').on('show.bs.modal', function (e) {
      var rowteam = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowteam='+ rowteam,
          success : function(data){
          $('.fetched-data').html(data);//menampilkan data ke dalam modal
          }
      });
  });

</script>
<?php
  include "library-js.php";
?>
</body>
</html>
