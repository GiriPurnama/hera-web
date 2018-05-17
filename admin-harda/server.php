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
  	if (isset($_POST['home'])) {
  		  $title_img = mysqli_real_escape_string($db, trim($_POST['title_img']));
  		  $desc_img = mysqli_real_escape_string($db, trim($_POST['desc_img']));
  		  
  		  $type = $_FILES['image_home']['type'];
		  $fileinfo=PATHINFO($_FILES["image_home"]["name"]);
		  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		  move_uploaded_file($_FILES["image_home"]["tmp_name"],"../upload/page-home/" . $newFilename);
		  $image_home="../upload/page-home/" . $newFilename;
		
  		  $query = mysqli_query($db, "INSERT INTO menu_home(title_img, desc_img, image_home) values ('$title_img','$desc_img','$image_home')");
  		  if ($query) {
  		  		echo "Sukses Simpan";
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
?>