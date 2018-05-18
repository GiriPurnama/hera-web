<?php 
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