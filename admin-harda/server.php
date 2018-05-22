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
?>