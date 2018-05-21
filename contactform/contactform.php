<?php 
	include "../config/koneksi.php"; 
	$nama = mysqli_real_escape_string($db, trim($_POST['nama']));
	$subjek = mysqli_real_escape_string($db, trim($_POST['subjek']));
	$email = mysqli_real_escape_string($db, trim($_POST['email']));
	$isi_pesan = mysqli_real_escape_string($db, trim($_POST['isi_pesan']));

	$query = mysqli_query($db, "INSERT INTO pesan(nama, subjek, email, isi_pesan, tgl_kirim) values ('$nama','$subjek','$email','$isi_pesan',NOW())");
	  if ($query) {
	  		echo "Terima Kasih Masukan anda sudah dikirim";
	  		
	  } else {
	  		echo "Gagal Kirim";
	  }
?>