<?php 
	include "../config/koneksi.php"; 
	if (isset($_GET['id'])) {
	  	$id = $_GET['id'];
	  	
	  	$load_data = mysqli_query($db, "SELECT * FROM recruitment WHERE id='$id'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		if (is_file("upload/".$row['foto']) || ("upload/".$row['ktp']) || ("upload/".$row['ijazah']) ) {
	  			unlink($row['foto']);
	  			unlink($row['ktp']);
	  			unlink($row['ijazah']);
			  	$query_delete = mysqli_query($db, "DELETE FROM recruitment WHERE id='$id'");
			  	if ($query_delete) {
			  		header('location: data-user.php');
			  	} else{
			  		echo "gagal";
			  	}
	  		}
	  	}
  	}

//===================== Page Home ================================================
  	// Insert
  	if (isset($_POST['save'])) {
  		  $title_img = mysqli_real_escape_string($db, trim($_POST['title_img']));
  		  $desc_img = mysqli_real_escape_string($db, trim($_POST['desc_img']));
  		  
  		  $type = $_FILES['image_home']['type'];
		  $fileinfo=PATHINFO($_FILES["image_home"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["image_home"]["tmp_name"],"../upload/page-home/" . $newFilename);
		  $image_home="../upload/page-home/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO menu_home(title_img, desc_img, image_home) values ('$title_img','$desc_img','$image_home')");
  		  if ($query) {
  		  		header('location: page-home.php');
  		  } else {
  		  		echo "Gagal Simpan";
  		  }
  	}

  	// Delete
  	if (isset($_GET['idhome'])) {
	  	$idhome = $_GET['idhome'];
	  	$load_data = mysqli_query($db, "SELECT * FROM menu_home WHERE idhome='$idhome'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		$test = $row['title_img'];
	  		if (is_file($row['image_home'])) {
	  			unlink($row['image_home']);
			  	$query_delete = mysqli_query($db, "DELETE FROM menu_home WHERE idhome='$idhome'");
			  	if ($query_delete) {
			  		header('location: page-home.php');
			  	} else{
			  		echo "gagal";
			  	}
	  		} else { 
	  			echo "File Tidak Ditemukan";
	  		}
	  	}
  	}

  	// Update
  	if (isset($_POST['update_home'])) {
	  if (isset($_POST['idhome'])) {

	    $idhome = $_POST['idhome'];

	  	$query = mysqli_query($db, "SELECT * FROM menu_home WHERE idhome='$idhome'") or die('Query Error : '.mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
        	$image_home = $data['image_home'];
        		
        }

	    $title_image = $_POST['title_img'];
        $deksripsi_image = $_POST['desc_img'];

        $type = $_FILES['image_home']['type'];
	    $fileinfo=PATHINFO($_FILES["image_home"]["name"]);
	    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	    if (!$image_home==""){  
		    unlink($image_home);
		    move_uploaded_file($_FILES["image_home"]["tmp_name"],"../upload/page-home/" . $newFilename);
		    $location="../upload/page-home/" . $newFilename;
		} 

	    // perintah query untuk mengubah data pada tabel is_siswa
	    $query = mysqli_query($db, "UPDATE menu_home SET title_img = '$title_image',
	                            desc_img  = '$deksripsi_image',
	                            image_home = '$location'
	                            WHERE idhome   = '$idhome'");   

	    // cek query
	    if ($query) {
	      // jika berhasil tampilkan pesan berhasil update data
	      header('location: page-home.php');
	      // echo "Berhasil";
	    } else {
	      // jika gagal tampilkan pesan kesalahan
	      // header('location: index.php?alert=1');
	      echo "Gagal";
	    } 

	  }
	} 
//===================== Page Home ================================================



//===================== Page Team ================================================
	// Insert
  	if (isset($_POST['team'])) {
  		  $username = mysqli_real_escape_string($db, trim($_POST['username']));
  		  $email_admin = mysqli_real_escape_string($db, trim($_POST['email_admin']));
  		  $password = mysqli_real_escape_string($db, trim(md5($_POST['password'])));
  		  $nama_lengkap = mysqli_real_escape_string($db, trim($_POST['nama_lengkap']));
  		  $divisi = mysqli_real_escape_string($db, trim($_POST['divisi']));
  		  $status = $_POST['status'];

  		  $type = $_FILES['img_divisi']['type'];
		  $fileinfo=PATHINFO($_FILES["img_divisi"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["img_divisi"]["tmp_name"],"../upload/page-team/" . $newFilename);
		  $img_divisi="../upload/page-team/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO login(username, email_admin, password, nama_lengkap, divisi, img_divisi, status) values ('$username','$email_admin','$password','$nama_lengkap','$divisi','$img_divisi','$status')");
  		  if ($query) {
  		  		 header('location: page-team.php');
  		  } else {
  		  		echo "Gagal Simpan";
  		  }
  	}

  	// Delete
  	if (isset($_GET['id_admin'])) {
	  	$id_admin = $_GET['id_admin'];
	  	$load_data = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_admin'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		if (is_file($row['img_divisi'])) {
	  			unlink($row['img_divisi']);
			  	$query_delete = mysqli_query($db, "DELETE FROM login WHERE id_admin='$id_admin'");
			  	if ($query_delete) {
			  		header('location: page-team.php');
			  	} else{
			  		echo "gagal";
			  	}
	  		} else { 
	  			echo "File Tidak Ditemukan";
	  		}
	  	}
  	}

  	// Update
  	if (isset($_POST['update_team'])) {

	  if (isset($_POST['id_admin'])) {

		    $id_admin = $_POST['id_admin'];

		  	$query = mysqli_query($db, "SELECT * FROM login WHERE id_admin='$id_admin'") or die('Query Error : '.mysqli_error($db));
	        while ($data  = mysqli_fetch_assoc($query)) {
	        	$img_divisi = $data['img_divisi'];
	        }

		    $username = $_POST['username'];
	  		$email_admin = $_POST['email_admin'];
	  		$password = md5($_POST['password']);
	  		$nama_lengkap = $_POST['nama_lengkap'];
	  		$divisi = $_POST['divisi'];
	  		$status = $_POST['status'];

	        $type = $_FILES['img_divisi']['type'];
		    $fileinfo=PATHINFO($_FILES["img_divisi"]["name"]);
		    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		    if (!$img_divisi==""){  
			    unlink($img_divisi);
			    move_uploaded_file($_FILES["img_divisi"]["tmp_name"],"../upload/page-team/" . $newFilename);
			    $location="../upload/page-team/" . $newFilename;
			}

		    // perintah query untuk mengubah data pada tabel is_siswa
		    $query = mysqli_query($db, "UPDATE login SET username = '$username',
		                            email_admin  = '$email_admin',
		                            password = '$password',
		                            nama_lengkap = '$nama_lengkap',
		                            divisi = '$divisi',
		                            img_divisi = '$location',
		                            status = '$status'
		                            WHERE id_admin   = '$id_admin'");   

		    // cek query
		    if ($query) {
		      // jika berhasil tampilkan pesan berhasil update data
		      header('location: page-team.php');
		      // echo "Berhasil";
		    } else {
		      // jika gagal tampilkan pesan kesalahan
		      // header('location: index.php?alert=1');
		      echo "Gagal";
		    } 

	  }
	} 
//===================== Page Team ================================================

//===================== Page Contact ================================================
	if (isset($_GET['idpesan'])) {
	  	$idpesan = $_GET['idpesan'];	
	  	$query_delete = mysqli_query($db, "DELETE FROM pesan WHERE idpesan='$idpesan'");
	  	if ($query_delete) {
	  		header('location: page-contact.php');
	  	} else{
	  		echo "gagal";
	  	}
  	}

  	if (isset($_POST['kirim_pesan'])) {
  		$to = "giri.purnama78@gmail.com"; // this is your Email address
	    $from = $_POST['email']; // this is the sender's Email address
	    $username = $_POST['nama'];
	    $subject = $_POST['subjek'];
	    $message = $username. "\n\n" . $_POST['isi_pesan'];
	    $headers = "From:" . $from;
	    
	    mail($to,$subject,$message,$headers);
	    
	  	header('location: page-contact.php');
	
	}
//===================== Page Contact ================================================



//===================== Page Client ================================================
	// Insert
  	if (isset($_POST['save_client'])) {
  		  $nama_client = mysqli_real_escape_string($db, trim($_POST['title_client']));
  		  $desc_client = mysqli_real_escape_string($db, trim($_POST['desc_client']));
  		  $tgl_join = $_POST['tgl_join'];

  		  $type = $_FILES['img_client']['type'];
		  $fileinfo=PATHINFO($_FILES["img_client"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["img_client"]["tmp_name"],"../upload/page-client/" . $newFilename);
		  $img_client="../upload/page-client/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO menu_client(title_client, desc_client, img_client, tgl_join) values ('$nama_client','$desc_client','$img_client','$tgl_join')");
  		  if ($query) {
  		  		 header('location: page-client.php');
  		  } else {
  		  		echo "Gagal Simpan";
  		  }
  	}

  	// Delete
  	if (isset($_GET['idclient'])) {
	  	$idclient = $_GET['idclient'];
	  	$load_data = mysqli_query($db, "SELECT * FROM menu_client WHERE idclient='$idclient'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		if (is_file($row['img_client'])) {
	  			unlink($row['img_client']);
			  	$query_delete = mysqli_query($db, "DELETE FROM menu_client WHERE idclient='$idclient'");
			  	if ($query_delete) {
			  		header('location: page-client.php');
			  	} else{
			  		echo "gagal";
			  	}
	  		} else { 
	  			echo "File Tidak Ditemukan";
	  		}
	  	}
  	}

  	// Update
  	if (isset($_POST['update_client'])) {

	  if (isset($_POST['idclient'])) {

		    $idclient = $_POST['idclient'];

		  	$query = mysqli_query($db, "SELECT * FROM menu_client WHERE idclient='$idclient'") or die('Query Error : '.mysqli_error($db));
	        while ($data  = mysqli_fetch_assoc($query)) {
	        	$img_client = $data['img_client'];
	        }

		    $nama_client = $_POST['title_client'];
	  		$desc_client = $_POST['desc_client'];
	  		$tgl_join = $_POST['tgl_join'];

	        $type = $_FILES['img_client']['type'];
		    $fileinfo=PATHINFO($_FILES["img_client"]["name"]);
		    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		    if (!$img_client==""){  
			    unlink($img_client);
			    move_uploaded_file($_FILES["img_client"]["tmp_name"],"../upload/page-client/" . $newFilename);
			    $location="../upload/page-client/" . $newFilename;
			}

		    // perintah query untuk mengubah data pada tabel is_siswa
		    $query = mysqli_query($db, "UPDATE menu_client SET title_client = '$nama_client',
		                            desc_client  = '$desc_client',
		                            img_client = '$location',
		                            tgl_join = '$tgl_join'
		                            WHERE idclient   = '$idclient'");   

		    // cek query
		    if ($query) {
		      // jika berhasil tampilkan pesan berhasil update data
		      header('location: page-client.php');
		      // echo "Berhasil";
		    } else {
		      // jika gagal tampilkan pesan kesalahan
		      // header('location: index.php?alert=1');
		      echo "Gagal";
		    } 

	  }
	} 
//===================== Page Client ================================================


//===================== Page Album ================================================
	if (isset($_POST['album_save'])) {
  		  $nama_album = mysqli_real_escape_string($db, trim($_POST['nama_album']));
  		  $desc_album = mysqli_real_escape_string($db, trim($_POST['album_deskripsi']));

  		  $type = $_FILES['image']['type'];
		  $fileinfo=PATHINFO($_FILES["image"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/page-album/" . $newFilename);
		  $img_album="../upload/page-album/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO album(nama_album, album_deskripsi, image, album_date) values ('$nama_album','$desc_album','$img_album',NOW())");
  		  if ($query) {
  		  		 header('location: page-album.php');
  		  } else {
  		  		echo "Gagal Simpan";
  		  }
  	}


//===================== Page Album ================================================



//===================== Page Foto ================================================
  	// Insert
  	if (isset($_POST['galeri_save'])) {

  		  $albumid = mysqli_real_escape_string($db, trim($_POST['albumid']));	
  		  $nama_foto = mysqli_real_escape_string($db, trim($_POST['nama_foto']));
  		  $desc_foto = mysqli_real_escape_string($db, trim($_POST['desc_foto']));

  		  $type = $_FILES['foto']['type'];
		  $fileinfo=PATHINFO($_FILES["foto"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/page-foto/" . $newFilename);
		  $img_foto="../upload/page-foto/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO galeri_foto(albumid, nama_foto, desc_foto, foto, date_foto) values ('$albumid','$nama_foto','$desc_foto','$img_foto',NOW())");
  		  if ($query) {
  		  		 header('location: page-foto.php');
  		  } else {
  		  		echo "Gagal Simpan";
  		  }
  	}

  	// Delete
  	if (isset($_GET['gid'])) {
	  	$gid = $_GET['gid'];
	  	$load_data = mysqli_query($db, "SELECT * FROM galeri_foto WHERE gid='$gid'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		if (is_file($row['foto'])) {
	  			unlink($row['foto']);
			  	$query_delete = mysqli_query($db, "DELETE FROM galeri_foto WHERE gid='$gid'");
			  	if ($query_delete) {
			  		header('location: page-foto.php');
			  	} else{
			  		echo "gagal";
			  	}
	  		} else { 
	  			echo "File Tidak Ditemukan";
	  		}
	  	}
  	}


  	// Update
  	if (isset($_POST['update_foto'])) {

	  if (isset($_POST['gid'])) {

		    $gid = $_POST['gid'];

		  	$query = mysqli_query($db, "SELECT * FROM galeri_foto WHERE gid='$gid'") or die('Query Error : '.mysqli_error($db));
	        while ($data  = mysqli_fetch_assoc($query)) {
	        	$foto = $data['foto'];
	        }

		    $nama_foto = $_POST['nama_foto'];
	  		$desc_foto = $_POST['desc_foto'];

	        $type = $_FILES['foto']['type'];
		    $fileinfo=PATHINFO($_FILES["foto"]["name"]);
		    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		    if (!$foto==""){  
			    unlink($foto);
			    move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/page-foto/" . $newFilename);
			    $location="../upload/page-foto/" . $newFilename;
			}

		    // perintah query untuk mengubah data pada tabel is_siswa
		    $query = mysqli_query($db, "UPDATE galeri_foto SET nama_foto = '$nama_foto',
		                            desc_foto  = '$desc_foto',
		                            foto = '$location'
		                            WHERE gid = '$gid'");   

		    // cek query
		    if ($query) {
		      // jika berhasil tampilkan pesan berhasil update data
		      header('location: page-foto.php');
		      // echo "Berhasil";
		    } else {
		      // jika gagal tampilkan pesan kesalahan
		      // header('location: index.php?alert=1');
		      echo "Gagal";
		    } 

	  }
	} 


//===================== Page Foto ================================================
?>