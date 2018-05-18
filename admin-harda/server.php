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

  	// Page Home
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
?>