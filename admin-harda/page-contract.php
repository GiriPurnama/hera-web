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
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Page Contract</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Posisi</th>
                  <th>Perusahaan</th>
                  <th>Tanggal Join</th>
                  <th>Kontrak Kerja</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1;
                    $join_table = mysqli_query($db, "SELECT * FROM recruitment WHERE branch = '$cabang' AND feedback = 'Join' ORDER BY id DESC");

                    while ($row = mysqli_fetch_assoc($join_table)) {

                    $posisi = $row['posisi'];

                    $rekomendasi = $row['posisi_rekomendasi'];

                    $rekomendasi_ro =  $rekomendasi ?: $posisi; 

                    $oldDate = $row['tanggal_join'];
                    $timestamp = strtotime($oldDate);
                    $newDate = date('j F Y', $timestamp); 

                    $feedback = $row['feedback'];
                    $nama_lowongan_pelamar = $row['nama_lowongan'];
                    $client_distributor = $row['client_distributor'];
                    $status_join = $row['status_join'];
                    $nama_lengkap = $row['nama_lengkap'];
                    $perusahaan = $row['perusahaan'];
                    $kontrak_kerja = $row['kontrak_kerja'] ?: '-';


                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $nama_lengkap; ?></td>
                  <td><?= $rekomendasi_ro; ?></td>
                  <td><?= $perusahaan; ?></td>
                  <td><?= $newDate; ?></td>
                  <td><?= $kontrak_kerja; ?></td>

                  <td>
                    
                    <?php if ($status == "RnD" || $status == "EksternalHRD" || $status == "Chief" || $status == "Master") { ?>
                  
                      <?php echo "<a href='detail-contract.php?id=$row[id]'><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                      <!-- <a href='server.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a> -->
                    
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
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
