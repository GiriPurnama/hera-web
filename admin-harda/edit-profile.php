
<!DOCTYPE html>
<html>
  <?php 
    ob_start();
    include "library-css.php";
  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    include "library-header.php";
    include "library-sidebar.php";
  ?>

   <?php
      if (isset($_GET['id_admin'])) {
        $id_admin   = $_GET['id_admin'];
        $query = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_admin'") or die('Query Error : '.mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $id_admin   = $data['id_admin'];
          $username   = $data['username'];
          $email_admin   = $data['email_admin'];
          $password = $data['password'];
          $nama_lengkap = $data['nama_lengkap'];
          $divisi = $data['divisi'];
          $branch = $data['branch'];
          $img_divisi = $data['img_divisi'];
          $facebook = $data['facebook'];
          $twitter = $data['twitter'];
          $linkedin = $data['linkedin'];
          $motto =$data['motto'];
          $no_emergency = $data['no_emergency'];
          $hubungan = $data['hubungan'];
        }
      }

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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title info-user">Data Profile</h3>
              <form method="POST" action="server.php">
                 
                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Username</label>
                      <input type="hidden" class="form-control" name="id_admin" value="<?= $id_admin; ?>" Readonly>
                      <input type="text" class="form-control" name="username" value="<?= $username; ?>" Readonly>
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email_admin" value="<?= $email_admin; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" value="<?= $nama_lengkap; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Divisi</label>
                      <input type="text" class="form-control" name="divisi" value="<?= $divisi; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Branch</label>
                      <input type="text" class="form-control" name="branch" value="<?= $branch; ?>" readonly>
                   </div>
                 </div>

                <div class="col-md-6">
                   <div class="form-group">
                      <label>Facebook</label>
                      <input type="text" class="form-control" name="facebook" value="<?= $facebook; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Linkedin</label>
                      <input type="text" class="form-control" name="linkedin" value="<?= $linkedin; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label>Twitter</label>
                      <input type="text" class="form-control" name="twitter" value="<?= $twitter; ?>">
                   </div>
                 </div>

                <div class="col-md-6">
                   <div class="form-group">
                      <label>Motto Hidup</label>
                      <input type="text" class="form-control" name="motto" value="<?= $motto; ?>">
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <div class="col-md-6">
                        <label>No Emergency</label>
                        <input type="text" class="form-control" name="no_emergency" value="<?= $no_emergency; ?>">
                      </div>
                      <div class="col-md-6">
                        <label>Hubungan</label>
                        <input type="text" class="form-control" name="hubungan" value="<?= $hubungan; ?>">
                      </div>
                   </div>
                 </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <a href='#modalHomeEdit' class="btn btn-warning" id="imageProfile" data-toggle='modal' data-id="<?= $id_admin; ?>"><i class="fa fa-file-image-o"></i> Ubah Foto </a>
                      <a href='#modalEdit2' class="btn btn-warning" id="passwordProfile" data-toggle='modal' data-id="<?= $id_admin; ?>"><i class="fa fa-lock"></i> Ubah Password</a>
                    </div>
                  </div>

                 <div class="col-md-12">
                   <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                   </div>
                 </div>

              </form>
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
<script type="text/javascript">

  $('#modalHomeEdit').on('show.bs.modal', function (e) {
      var rowimage = $("#imageProfile").data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowimage='+ rowimage,
          success : function(data){
          $('.fetched-data').html(data);//menampilkan data ke dalam modal
          }
      });
  });


  $('#modalEdit2').on('show.bs.modal', function (e) {
      var rowpass = $("#passwordProfile").data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowpass='+ rowpass,
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