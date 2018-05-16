<?php 
  include "../config/koneksi.php"
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
        <li><a href="dashboard.php"><i class="fa fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <?php  
              $pendaftar_baru = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = ''");
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
            $pendaftar_interview = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = 'interview'");
            $jum_interview = mysqli_num_rows($pendaftar_interview);
          ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jum_interview ?></h3>

              <p>Jumlah Interview</p>
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
            $pendaftar_ditolak = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = 'tidak interview'");
            $jum_ditolak = mysqli_num_rows($pendaftar_ditolak);
          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jum_ditolak ?></h3>

              <p>Jumlah Tidak Interview</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <?php 
          $sql = "SELECT alamat_email FROM recruitment";
          $result = mysqli_query($db, $sql) or die('Error, retrieving User Email list failed. ' . mysqli_error());
           
          $emailUsers = array();
            while ($useremails = mysqli_fetch_assoc($result )) {
              $emailUsers [] = $useremails ['alamat_email'];
            }
           
          //Pisahkan email user
          $allusers = implode(',',$emailUsers );
        ?>
        <?php
          if (isset($_POST['submit']) && $_POST['submit'] == 'SendEmail') {
             
            // Validasi Form
            if($_POST['emailSubject'] == "") {
              echo "<script language='javascript'>alert('Please enter the Subject of your Email.');
                window.location = ''</script>";
            } else if($_POST['emailText'] == "") {
              echo "<script language='javascript'>alert('Please enter the text of the Email.');
                window.location = ''</script>";
            } else {
           
              // Kirim Email dalam format HTML
              $emailSubject = $_POST['emailSubject'];
              $emailText = $_POST['emailText'];
              $AppName = 'JagoCoding.com';
              $SenderEmail = 'giri.purnama78@gmail.com';
           
              $subject = $emailSubject;
           
              $content = '<html><body>';
              $content .= '<h3>'.$subject.'</h3>';
              $content .= '<hr>';
              $content .= '<p>'.$emailText.'</p>';
              $content .= '<hr>';
              $content .= '<p>Thank you,<br>';
              $content .= '</body></html>';
           
              $headers = "From: ".$AppName." <".$SenderEmail.">\r\n";
              $headers .= "Reply-To: ".$SenderEmail."\r\n";
              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
           
              if (mail($allusers, $subject, $content, $headers)) {
                echo "<script language='javascript'>alert('The Email has been sent to all Users.');
                  window.location = ''</script>";
                $_POST['emailSubject'] = $_POST['emailText'] = '';
              }
           
            }
          }
          ?>
           
          <h3>Send an Email to All Active Users</h3>
          <hr />
          <form action="" method="post">
            <div class="form-group">
              <label for="emailSubject">Subject</label>
              <input type="text" class="form-control" name="emailSubject" id="emailSubject" value="<?php echo isset($_POST['emailSubject']) ? $_POST['emailSubject'] : ''; ?>" />
            </div>
            <div class="form-group">
              <label for="emailText">Email Text</label>
              <textarea class="form-control" name="emailText" id="emailText" rows="8"><?php echo isset($_POST['emailText']) ? $_POST['emailText'] : ''; ?></textarea>
            </div>
            <button type="input" name="submit" value="SendEmail" class="btn"><i class="icon-check"></i> Send Email</button>
          </form>
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
