<?php 
  include "auth.php";
?>
<!DOCTYPE html>
<html>
  <?php 
    include "library-css.php";
    // include "../modal.php";
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
        <li><a href="#"><i class="fa fa-user"></i>Branch</a></li>
        <li class="active">Page Branch</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Branch</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
              <?php if ($status == "InternalHRD" || $status == "Master") { ?>
              <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalBranch">Tambah Branch<i class="fa fa-users"></i></button>
              </a>
              <?php } ?>
               <!-- <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalGaleri">Tambah Foto<i class="fa fa-file-image-o"></i></button>
              </a> -->
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Branch</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>No Whatsapp</th>
                  <th>Email</th>
                  <th>Maps</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                    $no = 1;
                    $branch = mysqli_query($db, "SELECT * FROM kontak");
                    while ($row = mysqli_fetch_assoc($branch)) {
                      $wilayah = $row['wilayah'];
                      $alamat = $row['alamat'];
                      $telepon = $row['telepon'];
                      $no_wa = $row['no_wa'] ?: '-';
                      $email = $row['email'];
                      $maps = $row['maps']; 
                ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $wilayah; ?></td>
                  <td><?php echo $alamat; ?></td>
                  <td><?= $telepon; ?></td>
                  <td><?= $no_wa; ?></td>
                  <td><?= $email; ?></td>
                  <td><iframe height="auto" width="200px" src="<?= $maps; ?>" style="border:0;" allowfullscreen></iframe></td>
                  <td>
                    <?php if ($status == "InternalHRD" || $status == "Master" || $status == "Chief" || $status == "RO" || $status == "EksternalHRD" ) { ?>
                      <?php echo "<a href='#modalHomeEdit' id='custId' data-toggle='modal' data-id=".$row['idkontak']."><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                      <a href='server.php?idkontak=<?php echo $row['idkontak']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
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
      var rowkontak = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowkontak='+ rowkontak,
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
