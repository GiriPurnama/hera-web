<?php 
   include "config/koneksi.php";
   include "config/indo_tgl.php";

   if (isset($_POST['rowpelamar'])) {
   	   $branch = $_POST['rowpelamar'];
	   $lowongan = mysqli_query($db, "SELECT * FROM info_lowongan where wilayah = '$branch' AND status='aktif'");
	   while ($row = mysqli_fetch_assoc($lowongan)) {
	        $nama_lowongan = $row['nama_lowongan'];
	        $desc_lowongan = $row['desc_lowongan'];

	        echo '<option value="'.$nama_lowongan.'" data-val="'.$desc_lowongan.'">'.$nama_lowongan.'</option>';
		}
		echo '<option value="1">Lainnya</option>';
   }

?>

