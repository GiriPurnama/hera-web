
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
        <li><a href="#"><i class="fa fa-user"></i>Video</a></li>
        <li class="active">Page Video</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Video</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
              <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalVideo">Tambah Video<i class="fa fa-video-camera"></i></button>
              </a>
               <!-- <a class="btn-export-excel" href="javascript:void(0);" target="_BLANK">
                <button class="btn btn-warning btn-submit" data-toggle="modal" data-target="#modalGaleri">Tambah Foto<i class="fa fa-file-image-o"></i></button>
              </a> -->
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Video</th>
                  <th>Deskripsi Video</th>
                  <th>Image Video</th>
                  <th>Video</th>
                  <th>Tanggal Video</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                    $no = 1;
                    $video_link = mysqli_query($db, "SELECT * FROM galeri_video");
                    while ($row = mysqli_fetch_assoc($video_link)) {
                      $nama_video = $row['nama_video'];
                      $video_deskripsi = $row['video_deskripsi'];
                      $video_date = $row['date_video'];
                      $img_video = $row['img_video'];
                      $video = $row['video'];
                      $timestamp = strtotime($video_date);
                      $newDate = date('j-F-Y', $timestamp);  
                ?>

                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $nama_video; ?></td>
                  <td><?= $video_deskripsi; ?></td>
                  <td><img class="img-home" src="<?= $img_video; ?>"></td>
                  <td><iframe height="auto" width="200px" src="<?= $video; ?>"></iframe></td>
                  <td><?= $newDate; ?></td>
                  <td>

                    <?php echo "<a href='#modalHomeEdit' id='custId' data-toggle='modal' data-id=".$row['videoid']."><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                    
                    <a href='server.php?videoid=<?php echo $row['videoid']; ?>' onclick="return confirm('Apakah yakin video ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                 
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
      var rowvideo = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowvideo='+ rowvideo,
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
