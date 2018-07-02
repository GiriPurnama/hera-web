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
        $id_admin = $row['id_admin'];
        $branch   = $row['branch'];        
      ?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username_title" value="<?php echo $username ?>" required>
                </div>
                 <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" required>
                </div>
                <div class="form-group">
                  <label for="divisi">Divisi</label>
                  <input type="text" class="form-control" name="divisi" id="divisi_title" value="<?php echo $divisi ?>" required>
                </div>
                <div class="form-group">
                  <label for="Branch">Branch</label>
                   <select class='form-control' name='branch' required>
                      <option value="<?= $branch; ?>"><?= $branch; ?></option>
                      <?php 
                          $lamar = mysqli_query($db, "SELECT * FROM kontak");
                          while ($row = mysqli_fetch_assoc($lamar)) {
                      ?>
      
                      <option value="<?= $row['wilayah'];?>"><?= $row["wilayah"];?></option>
                      
                      <?php    
                          }
                      ?>
                  </select>
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

<?php 
if($_POST['rowpesan']) {
      $idpesan = $_POST['rowpesan'];
      $load_data = mysqli_query($db, "SELECT * FROM pesan WHERE idpesan='$idpesan'");
      $sqlupdate = mysqli_query($db, "UPDATE pesan SET status = '1' WHERE idpesan = '$idpesan'");
      while ($row = mysqli_fetch_assoc($load_data)) {
        $username = $row['nama'];
        $subjek = $row['subjek'];
        $email = $row['email'];
        $isi_pesan = $row['isi_pesan'];
        $id_pesan = $row['idpesan']        
      ?>

      <form role="form" action="server.php" method="POST">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idpesan" value="<?php echo $id_pesan; ?>">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="nama" id="username_title" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-group">
                  <label for="subjek">Subjek</label>
                  <input type="text" class="form-control" name="subjek" id="subject" value="<?php echo $subjek; ?>" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email_title" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Balas Pesan</label>
                  <textarea class="form-control" name="isi_pesan"></textarea>
                </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="kirim_pesan" id="teamSave">Kirim</button>
                <button type="button" class="loadPage btn" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
  if($_POST['rowclient']) {
      $id = $_POST['rowclient'];
      $load_data = mysqli_query($db, "SELECT * FROM menu_client WHERE idclient='$id'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        $title_client = $row['title_client'];
        $desc_client = $row['desc_client'];
        $img_client = $row['img_client'];
        $tgl_join = $row['tgl_join'];
        $idclient = $row['idclient'];
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="idclient" value="<?php echo $idclient; ?>">
              <label for="title">Nama Client</label>
              <input type="text" class="form-control" name="title_client" id="title_image" value="<?php echo $title_client; ?>" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Client</label>
              <input type="text" class="form-control" name="desc_client" id="deskirpsi_client" value="<?php echo $desc_client; ?>" required>
            </div>
            <div class="form-group">
              <label for="upload">Logo Client</label>
              <input type="file" name="img_client" id="upload_image" value="<?php $img_client; ?>">
            </div>
            <div class="form-group">
              <label for="tgl_join">Tanggal Join</label>
              <input type="text" class="form-control tgl_join" name="tgl_join" value="<?php echo $tgl_join; ?>" required>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="update_client" id="clientUpdate">Simpan</button>
            <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowfoto']) {
      $gid = $_POST['rowfoto'];
      $load_data = mysqli_query($db, "SELECT * FROM galeri_foto WHERE gid='$gid'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $nama_foto = $row['nama_foto'];
        $desc_foto = $row['desc_foto'];
        $foto = $row['foto'];
        $gid = $row['gid'];
      
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="gid" value="<?php echo $gid; ?>">
                  <label for="album">Album</label>
                  <?php 
                    echo "<select class='form-control' name='albumid'>";
                      $album_query = mysqli_query($db, "SELECT * FROM album");
                      while ($row = mysqli_fetch_assoc($album_query)) {
                        echo "<option value=$row[albumid]>$row[nama_album]</option>";
                    }
                    echo "</select>";
                  ?>
                </div>
                <div class="form-group">
                  <label for="title">Nama Foto</label>
                  <input type="text" class="form-control" name="nama_foto" id="title_foto" value="<?php echo $nama_foto; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Foto</label>
                  <input type="text" class="form-control" name="desc_foto" id="deskripsi_foto" value="<?php echo $desc_foto; ?>" required>
                </div>
                <div class="form-group">
                  <label for="upload">Upload Foto</label>
                  <input type="file" name="foto" id="upload_image" value="<?php $foto; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_foto" id="fotoUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowalbum']) {
      $albumid = $_POST['rowalbum'];
      $load_data = mysqli_query($db, "SELECT * FROM album WHERE albumid='$albumid'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $nama_album = $row['nama_album'];
        $album_deskripsi = $row['album_deskripsi'];
        $cover_album = $row['image'];
        $albumid = $row['albumid'];
      
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="albumid" value="<?php echo $albumid; ?>">
                  <label for="title">Nama Album</label>
                  <input type="text" class="form-control" name="nama_album" id="title_album" value="<?php echo $nama_album; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Album</label>
                  <input type="text" class="form-control" name="album_deskripsi" id="deskripsi_album" value="<?php echo $album_deskripsi; ?>" required>
                </div>
                <div class="form-group">
                  <label for="upload">Upload Cover</label>
                  <input type="file" name="image" id="upload_image" value="<?php echo $cover_album; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_album" id="fotoUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowvideo']) {
      $videoid = $_POST['rowvideo'];
      $load_data = mysqli_query($db, "SELECT * FROM galeri_video WHERE videoid='$videoid'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $nama_video = $row['nama_video'];
        $video_deskripsi = $row['video_deskripsi'];
        $video = $row['video'];
        $videoid = $row['videoid'];
        $img_video = $row['img_video'];
      
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="videoid" value="<?php echo $videoid; ?>">
                  <label for="title">Nama Video</label>
                  <input type="text" class="form-control" name="nama_video" value="<?php echo $nama_video; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Video</label>
                  <input type="text" class="form-control" name="video_deskripsi" value="<?php echo $video_deskripsi; ?>" required>
                </div>
                <div class="form-group">
                  <label for="upload">Image Video</label>
                  <input type="file" name="img_video" id="imgVideo" value="<?= $img_video; ?>">
                </div>
                <div class="form-group">
                  <label for="upload">Link Video</label>
                  <input type="text" class="form-control" autocomplete="off" name="video" value="<?php echo $video; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_video" id="videoUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowkontak']) {
      $idkontak = $_POST['rowkontak'];
      $load_data = mysqli_query($db, "SELECT * FROM kontak WHERE idkontak='$idkontak'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $wilayah = $row['wilayah'];
        $alamat = $row['alamat'];
        $telepon = $row['telepon'];
        $email = $row['email'];
        $maps = $row['maps'];
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idkontak" value="<?php echo $idkontak; ?>">
                  <label for="title">Wilayah</label>
                  <input type="text" class="form-control" name="wilayah" value="<?php echo $wilayah; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" required>
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control" name="telepon" value="<?php echo $telepon; ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <label for="maps">Maps</label>
                  <input type="text" class="form-control" name="maps" value="<?php echo $maps; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_branch" id="branchUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php 
if($_POST['rowimage']) {
      $id_admin = $_POST['rowimage'];
      $load_data = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_admin'");
      while ($row = mysqli_fetch_assoc($load_data)) {
        $id_admin = $row['id_admin'];
        $img_divisi = $row['img_divisi'];        
      ?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
              <img src="<?= $img_divisi; ?>" class="profile-img">
            </div>
            
            <div class="form-group">
              <label>Ubah Foto</label>
              <input type="file" name="img_divisi" value="<?php echo $img_divisi; ?>">
            </div>
          </div>
            <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="ubah_foto">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
      </form>
<?php }
  }
?>

<?php 
if($_POST['rowpass']) {
      $id_admin = $_POST['rowpass'];
      $load_data = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_admin'");
      while ($row = mysqli_fetch_assoc($load_data)) {
        $id_admin = $row['id_admin'];
        $img_divisi = $row['img_divisi'];        
      ?>

      <form role="form" id="ubahPass" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
              <label>Password</label>
              <input type="password" class="form-control" id="passPrimary" name="password" \>
            </div>
            
            <div class="form-group">
              <label>Ulangi Password</label>
              <input type="password" class="form-control" id="passConf" name="password_conf" \>
            </div>
          </div>
            <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="savePass" name="ubah_pass">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowlowongan']) {
      $idlowongan = $_POST['rowlowongan'];
      $load_data = mysqli_query($db, "SELECT * FROM info_lowongan WHERE idlowongan='$idlowongan'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $nama_lowongan = $row['nama_lowongan'];
        $desc_lowongan = $row['desc_lowongan'];
        $tgl_posting = $row['tgl_posting'];
        $timestamp = strtotime($tgl_posting);
        $new_date = date('j-F-Y', $timestamp);
        $idlowongan = $row['idlowongan'];
        $status = $row['status']; 
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idlowongan" value="<?= $idlowongan; ?>">
                  <label for="title">Nama Lowongan</label>
                  <input type="text" class="form-control" name="nama_lowongan" value="<?= $nama_lowongan; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Lowongan</label>
                  <textarea id="ck_editorEdit" class="form-control" name="desc_lowongan" required><?= $desc_lowongan; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status">
                      <option <?php if ($status == "aktif" ) echo 'selected' ; ?> value="aktif">Aktif</option>
                      <option <?php if ($status == "non-aktif" ) echo 'selected' ; ?> value="non-aktif">Non Aktif</option>
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_lowongan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowgaleri']) {
       $rowgaleri = $_POST['rowgaleri'];
       $fotogaleri = mysqli_query($db, "SELECT * FROM galeri_foto WHERE albumid='$rowgaleri'");
       while ($row = mysqli_fetch_assoc($fotogaleri)) {
         $album = $row['nama_album'];
         $nama_foto = $row['nama_foto'];
         $desc_foto = $row['desc_foto'];
         $foto = $row['foto'];
         $foto_str = str_replace("../", "", $foto);    
?>

 <div class="row">
   <div class="col-md-4">
      <div class="box-gallery">  
        <img src="<?= $foto_str; ?>"> 
        <div class="title-gallery"><h3><?= $nama_foto; ?></h3></div>
        <div class="desc-gallery"><?= $desc_foto; ?></div>
      </div>
    </div>
 </div>

<?php 
    }
  }
?>

<?php
    if($_POST['videogaleri']) {
       $videogaleri = $_POST['videogaleri'];
       $videogaleri = mysqli_query($db, "SELECT * FROM galeri_video WHERE videoid='$videogaleri'");
       while ($row = mysqli_fetch_assoc($videogaleri)) {
         $link_video = $row['video'];
         $nama_video = $row['nama_video'];
         $desc_video = $row['video_deskripsi'];    
?>


 <div class="row">
   <div class="col-md-12">
      <div class="box-gallery">  
        <iframe id="player" width="560" height="315" src="<?= $link_video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
        <div class="title-gallery"><h3><?= $nama_video; ?></h3></div>
        <div class="desc-gallery"><?= $desc_video; ?></div>
      </div>
    </div>
 </div>

<?php 
    }
  }
?>

<?php
    if($_POST['rowartikel']) {
      $idartikel = $_POST['rowartikel'];
      $load_data = mysqli_query($db, "SELECT * FROM artikel WHERE idartikel='$idartikel'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $judul_artikel = $row['judul_artikel'];
        $isi_artikel = $row['isi_artikel'];
        $foto_artikel = $row['foto_artikel'];
        $idartikel = $row['idartikel'];
      
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idartikel" value="<?= $idartikel; ?>">
                  <label for="title">Judul Artikel</label>
                  <input type="text" class="form-control" name="judul_artikel" id="title_artikel" value="<?= $judul_artikel; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Artikel</label>
                <textarea id="ck_editorEdit" class="form-control" name="isi_artikel" required><?= $isi_artikel; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="upload">Foto Artikel</label>
                  <input type="file" name="foto_artikel" id="upload_artikel" value="<?= $foto_artikel; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_artikel" id="fotoUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<?php
    if($_POST['rowtestimonial']) {
      $idtestimonial = $_POST['rowtestimonial'];
      $load_data = mysqli_query($db, "SELECT * FROM testimonial WHERE idtestimonial='$idtestimonial'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        
        $nama_testimonial = $row['nama_testimonial'];
        $isi_testimonial = $row['isi_testimonial'];
        $foto_testimonial = $row['foto_testimonial'];
        $idtestimonial = $row['idtestimonial'];
        $status = $row['status'];
      
?>

      <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
         <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idtestimonial" value="<?= $idtestimonial; ?>">
                  <label for="title">Nama Testimonial</label>
                  <input type="text" class="form-control" name="nama_testimonial" id="title_testimonial" value="<?= $nama_testimonial; ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Testimonial</label>
                  <textarea class="form-control" name="isi_testimonial" required><?= $isi_testimonial; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="upload">Foto Testimonial</label>
                  <input type="file" name="foto_testimonial" id="upload_testimonial" value="<?= $foto_testimonial; ?>">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status">
                      <option <?php if ($status == "Pelamar" ) echo 'selected' ; ?> value="Pelamar">Pelamar</option>
                      <option <?php if ($status == "Client" ) echo 'selected' ; ?> value="Client">Client</option>
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_testimonial" id="fotoUpdate">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
      </form>
<?php }
  }
?>

<script type="text/javascript">
  function password_match() {
    var password = $("#password_title").val();
    var confirmPassword = $("#confpass_title").val();

    if (password != confirmPassword) {
        $("#teamSave").prop('disabled', true);
        $("#confpass_title").css("border", "1px solid red");
    } else {
        $("#teamSave").prop('disabled', false);
        $("#confpass_title").css("border", "1px solid #d2d6de");
    } 
  }

jQuery("#confpass_title").keyup(password_match);

$('.loadPage').click(function() {
    location.reload();
});

$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('ck_editorEdit');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  
function password_match1() {
    var password1 = $("#passPrimary").val();
    var confirmPassword1 = $("#passConf").val();

    if (password1 != confirmPassword1) {
        $("#savePass").prop('disabled', true);
        $("#passConf").css("border", "1px solid red");
    } else {
        $("#savePass").prop('disabled', false);
        $("#passConf").css("border", "1px solid #d2d6de");
    } 
}

jQuery("#passConf").keyup(password_match1);

</script>