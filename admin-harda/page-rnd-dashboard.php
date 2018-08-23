<?php
  include "auth.php"; 
  include "../config/koneksi.php"
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
        Dashboard RND <b><?= $cabang; ?></b>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard RND</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <?php  
            $join_date = mysqli_query($db, "SELECT * FROM recruitment WHERE feedback = 'Join' AND branch = '$cabang'");
            $jum_join = mysqli_num_rows($join_date);
          ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jum_join; ?></h3>

              <p>Jumlah Karyawan Join</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <?php  
            $resign_date = mysqli_query($db, "SELECT * FROM recruitment WHERE feedback = 'Resign' AND branch = '$cabang'");
            $jum_resign = mysqli_num_rows($resign_date);
          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jum_resign; ?></h3>

              <p>Jumlah Karyawan Resign</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <!-- ./col -->


        <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Karyawan Hera Eksternal</h3>
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


                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $nama_lengkap; ?></td>
                  <td><?= $rekomendasi_ro; ?></td>
                  <td><?= $perusahaan; ?></td>
                  <td><?= $newDate; ?></td>

                  <td>
                    
                    <?php if ($status == "RnD" || $status == "EksternalHRD" || $status == "Chief" || $status == "Master" || $status == "RO") { ?>
                  
                      <?php echo "<a href='edit-user.php?id=$row[id]'><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                      <a href='server.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                    
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
      </div>
      <!-- /.row -->
      <!-- Main row -->
    
      <!-- /.row (main row) -->

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
