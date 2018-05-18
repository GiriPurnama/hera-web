<?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
	include "../config/koneksi.php"; 
	
	if($_POST['rowid']) {
        $id = $_POST['rowid'];
    	$load_data = mysqli_query($db, "SELECT * FROM menu_home WHERE idhome='$id'");
    	while ($row = mysqli_fetch_assoc($load_data)) { 
    		$title_image = $row['title_img'];
            $deksripsi_image = $row['desc_img'];
            $image_home = $row['image_home'];
            $idhome = $row['idhome'];
    	?>

    	<form role="form" action="server.php" method="POST" enctype="multipart/form-data">
    		 <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idhome" value="<?php echo $idhome; ?>">
                  <label for="title">Judul Image</label>
                  <input type="text" class="form-control" name="title_img" id="title_image" value="<?php echo $title_image ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="desc_img" id="deskripsi_image" value="<?php echo $row['desc_img']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="upload">Upload Image</label>
                  <input type="file" name="image_home" id="upload_image" value="<?php $image_home ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_home" id="homeUpdate">Simpan</button>
                <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
    	</form>
<?php }
	}
?>

<?php 
if($_POST['rowteam']) {
      $id_team = $_POST['rowteam'];
      $load_data = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_team'");
      while ($row = mysqli_fetch_assoc($load_data)) {
        $img_team = $row['img_divisi'];
        $username = $row['username'];
        $email_admin = $row['email_admin'];
        $password = $row['password'];
        $nama_lengkap = $row['nama_lengkap'];
        $divisi = $row['divisi'];
        $status = $row['status'];
        $id_admin = $row['id_admin']        
      ?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username_title" value="<?php echo $username ?>" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email_admin" id="email_title" value="<?php echo $email_admin ?>" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password_title" value="<?php echo $password; ?>" required>
                </div>
               <!--  <div class="form-group">
                  <label for="deskripsi">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="password" id="confpass_title" placeholder="Konfirmasi Password">
                </div> -->
                 <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" required>
                </div>
                <div class="form-group">
                  <label for="divisi">Divisi</label>
                  <input type="text" class="form-control" name="divisi" id="divisi_title" value="<?php echo $divisi ?>" required>
                </div>
                <div class="form-group">
                  <label for="upload">Upload Image</label>
                  <input type="file" name="img_divisi" id="img_divisi" value="<?php echo $img_team; ?>">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status_title">
                      <option value="">-</option>
                      <option <?php if ($status == "ADMIN" ) echo 'selected' ; ?> value="ADMIN">Admin</option>
                      <option <?php if ($status == "RECRUITMENT" ) echo 'selected' ; ?> value="RECRUITMENT">Recruitment</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_team" id="teamSave">Simpan</button>
                <button type="button" class="btn" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>