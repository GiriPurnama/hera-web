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
              <h3 class="box-title">Relationship And Development</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Status</th>
                  <th>Nama Lengkap</th>
                  <th>Posisi</th>
                  <th>Perusahaan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1;
                    $pelamar = mysqli_query($db, "SELECT * FROM recruitment WHERE branch = '$cabang' AND status_pelamar = 'DISARANKAN' AND feedback = 'pending-rnd' AND nama_pelamar IS NOT NULL ORDER BY client_distributor DESC");

                    while ($row = mysqli_fetch_assoc($pelamar)) {

                    $posisi = $row['posisi'];

                    $rekomendasi = $row['posisi_rekomendasi'] ? : "-";

                    $rekomendasi_ro =  $rekomendasi ?: $posisi; 

                    $status_pelamar = $row['status_pelamar'];
                    
                    $pengalaman_kerja = $row['komentar'];

                    $oldDate = $row['post_date'];
                    $timestamp = strtotime($oldDate);
                    $newDate = date('j F Y', $timestamp); 

                    $cek_interview = $row['interview'] ? : "Belum Diinterview";

                    $ndata = preg_replace("/\,/", "<br/>", $pengalaman_kerja);

                    $review = $ndata ? : "-";

                    $tgl_lahir = $row['tanggal_lahir'];
                    $timestamplahir = strtotime($tgl_lahir);
                    $newDateLahir = date('j F Y', $timestamplahir);

                    $feedback = $row['feedback'];
                    $nama_lowongan_pelamar = $row['nama_lowongan'];
                    $client_distributor = $row['client_distributor'];
                    $status_join = $row['status_join'];
                    $nama_lengkap = $row['nama_lengkap'];

                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td>
                      <?php 
                        if ($feedback == "pending-rnd") {
                            echo '<span class="label label-info wd-100">Menunggu Konfirmasi RND</span>';
                        }
                      ?>
                  </td>
                  <td><?php echo $nama_lengkap; ?></td>
                  <td>

                    <?php
                     $array_lowongan = explode(",",$nama_lowongan_pelamar);     
                     foreach ($array_lowongan as $key_lowongan => $value_lowongan) { ?>

                      <div><?= $value_lowongan; ?></div>

                    <?php } ?>

                  </td>

                  <td>

                    <?php
                       $array_client = explode(",",$client_distributor);     
                       foreach ($array_client as $key_client => $value_client) { ?>

                        <div><?= $value_client; ?></div>

                    <?php } ?>
                  </td>

                  <td>   
                      <?php
                       $array_status = explode(",",$status_join);
                       foreach ($array_status as $key => $value) { 
                      ?>
                        
                        <?php if ($value == "Ditolak") { ?>
                            <div class="label label-danger wd-100">Pelamar Ditolak</div>
                        <?php } else if ($value == "Dikirim") { ?>
                            <div class="label label-info  wd-100">Masih Menunggu</div>
                        <?PHP } else if($value == "Diterima") { ?>
                            <div class="label label-success  wd-100">Pelamar Diterima</div>
                        <?php } ?>
                      
                      <?php } ?>
                  </td>

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
