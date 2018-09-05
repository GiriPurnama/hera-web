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
        Dashboard <b><?= $cabang; ?></b>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($status == "EksternalHRD" || $status == "InternalHRD" || $status == "Master") { ?>
      
      <div class="col-md-12">
        <h3>Pemilihan Best Employe</h3>
        <form method="POST" action="server.php">
          <div class="form-group">
            <label>Nama Kandidat</label>
            <select class="form-control" name="id_admin" required>
              <option value="">-</option>
              <?php 
                  $refrensi_ganti = mysqli_query($db, "SELECT * FROM login");
                  while ($row = mysqli_fetch_assoc($refrensi_ganti)) {
                    $refrensi = $row['nama_lengkap'];
                    $id_admin = $row['id_admin'];
              ?>
                  <option value="<?= $id_admin; ?>"><?= $refrensi; ?></option>             
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Bulan</label>
            <select class="form-control" name="bulan" required>
              <option value="">-</option>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
            </select>
          </div>

          <div class="form-group">
            <label>Sambutan</label>
            <textarea class="form-control" name="short_quote" required></textarea>
          </div>

          <div class="form-group">
            <input type="hidden" name="status_employe" value="best">
            <input type="submit" class="btn btn-primary" name="simpan_employee" value="Simpan">
          </div>
        </form>
      </div>

    <?php } ?> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <?php  
              $pendaftar_baru = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = '' AND branch = '$cabang'");
              $jum_pendaftar = mysqli_num_rows($pendaftar_baru);
          ?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jum_pendaftar; ?></h3>

              <p>Jumlah Pendaftar Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-email-unread"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <?php  
            $pendaftar_interview = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = 'DISARANKAN' AND branch = '$cabang'");
            $jum_interview = mysqli_num_rows($pendaftar_interview);
          ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jum_interview ?></h3>

              <p>Jumlah Disarankan</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <?php
            // $startdate = $jadwal_interview;
            $expire = strtotime('+1 days');  
            $pendaftar_ditolak = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = 'REJECTED' AND branch = '$cabang'");
            $jum_ditolak = mysqli_num_rows($pendaftar_ditolak);
          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jum_ditolak ?></h3>

              <p>Jumlah Rejected</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
          <div class="col-md-12">
            <h1>Laporan Hari Ini</h1>
          </div>
          <div class="col-md-6 table-report">
            <div class="box-body table-responsive">
              <?php  
                $refrensiPelamar = mysqli_query($db, "SELECT refrensi, DAYNAME(post_date) AS hari,  COUNT(*) AS jumlah FROM recruitment WHERE date(post_date)=date(now()) AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') AND branch = '$cabang' Group By refrensi ");  
              ?>
              <h3>Perolehan Referensi Kandidat </h3>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Referensi</th>
                    <th>Total</th>
                  </tr>
                  <?php  
                    while($rowpelamar = mysqli_fetch_assoc($refrensiPelamar)){ 
                    if ($rowpelamar != null) { 
                  ?>  
                    <tr>
                      <td><?php echo $rowpelamar['refrensi']; ?></td>
                      <td><?php echo $rowpelamar['jumlah']; ?></td>
                    </tr>
                  <?php  } else { ?>
                      <tr>
                        <td colspan="2">Data Belum Tersedia</td>
                      </tr>
                  <?php } } ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-6 table-report">
            <div class="box-body table-responsive">
              <?php  
                $interviewPelamar = mysqli_query($db, "SELECT interview, DAYNAME(post_date) AS hari,  COUNT(*) AS jumlah FROM recruitment WHERE date(post_date)=date(now()) AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') AND branch = '$cabang' Group By interview ");  
              ?>
              <h3>Perolehan Interview Kandidat </h3>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Interview</th>
                    <th>Total</th>
                  </tr>
                  <?php  
                  while($rowpelamar = mysqli_fetch_assoc($interviewPelamar)){ 
                    if ($rowpelamar != null) { 
                      $cek_interview = $rowpelamar['interview'] ? : "Belum Diinterview";
                  ?>    
                  <tr>
                    <td><?= $cek_interview; ?></td>
                    <td><?php echo $rowpelamar['jumlah']; ?></td>
                  </tr>
                  <?php } else { ?>
                    <tr>
                      <td colspan="2">Data Belum Tersedia</td>
                    </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>

           <div class="col-md-12 table-report">
            <div class="box-body table-responsive">
              <?php  
                $interviewPelamar = mysqli_query($db, "SELECT posisi, interview, DAYNAME(post_date) AS hari,  COUNT(*) AS jumlah FROM recruitment WHERE date(post_date)=date(now()) AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') AND branch = '$cabang' Group By interview, posisi ");  
              ?>
              <h3>Perolehan Posisi Kandidat</h3>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Interview</th>
                    <th>Posisi</th>
                    <th>Total</th>
                  </tr>
                  <?php 
                    while($rowpelamar = mysqli_fetch_assoc($interviewPelamar)){ 
                    if ($rowpelamar != null) { 
                    $cek_interview = $rowpelamar['interview'] ? : "Belum Diinterview";
                  ?>  
                      <tr>
                        <td><?= $cek_interview; ?></td>
                        <td><?php echo $rowpelamar['posisi']; ?></td>
                        <td><?php echo $rowpelamar['jumlah']; ?></td>
                      </tr>
                    <?php } else { ?>
                    <tr>
                      <td colspan="3">Data Belum Tersedia</td>
                    </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>

           <div class="col-lg-12 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php 
                      $totalDay = mysqli_query($db, "SELECT DAYNAME(post_date) AS hari,  COUNT(*) AS jumlah FROM recruitment WHERE date(post_date)=date(now()) AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') AND branch = '$cabang' ");
                       while($rowday = mysqli_fetch_assoc($totalDay)){      
                  ?>
                  <h3><?php echo $rowday['jumlah']; ?></h3>
                  <?PHP } ?>

                  <p>Total Pelamar Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-information-circled"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
          </div>           
         </div>
        <!-- ./col -->
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
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
