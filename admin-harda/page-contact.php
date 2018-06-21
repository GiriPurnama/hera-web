
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
        <li><a href="#"><i class="fa fa-user"></i>Beranda</a></li>
        <li class="active">Page Contact</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Kontak</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Subjek</th>
                  <th>Email</th>
                  <th>Pesan</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                    $no = 1;
                    $pesan = mysqli_query($db, "SELECT * FROM pesan");
                    while ($row = mysqli_fetch_assoc($pesan)) {
                    $post_date = $row['tgl_kirim'];
                    $status = $row['status'];
                    $timestamp = strtotime($post_date);
                    $newDate = date('j-F-Y', $timestamp); 
                  
                  if ($status == "") {                    
                  ?>

                <tr class="font-bold">
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['subjek']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['isi_pesan']; ?></td>
                  <td><?php echo $newDate; ?></td>
                  <td>

                    <?php echo "<a href='#modalHomeEdit' id='custId' data-toggle='modal' data-id=".$row['idpesan']."><span class='action-icon'><i class='fa fa-mail-reply-all'></i></span></a>" ?>
                    
                    <a href='server.php?idpesan=<?php echo $row['idpesan']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                 
                  </td>
                </tr>

                <?php } else { ?>
                
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['subjek']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['isi_pesan']; ?></td>
                  <td><?php echo $newDate; ?></td>
                  <td>

                    <?php echo "<a href='#modalHomeEdit' id='custId' data-toggle='modal' data-id=".$row['idpesan']."><span class='action-icon'><i class='fa fa-mail-reply-all'></i></span></a>" ?>
                    
                    <a href='server.php?idpesan=<?php echo $row['idpesan']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                 
                  </td>
                </tr>                
                
                <?php  } $no++;}?>
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
      var rowpesan = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowpesan='+ rowpesan,
          success : function(data){
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
          }
      });
  });

$('#modalHomeEdit').on('hidden.bs.modal', function () {
    location.reload();
 })
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
