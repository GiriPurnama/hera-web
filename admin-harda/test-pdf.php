<?php
	include "../config/koneksi.php";
	if (isset($_GET['id'])) {
        $id   = $_GET['id'];
        $query = mysqli_query($db, "SELECT * FROM recruitment WHERE id='$id'") or die('Query Error : '.mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $id         = $data['id'];
          $posisi     = $data['posisi'];
          $refrensi   = $data['refrensi'];
          $nama_lengkap = $data['nama_lengkap'];
          $warga_negara = $data['warga_negara'];
          $tempat_lahir = $data['tempat_lahir'];
          $tanggal_lahir = $data['tanggal_lahir'];
          $agama      = $data['agama'];
          $jenis_kelamin = $data['jenis_kelamin'];
          $no_ktp     = $data['no_ktp'];
          $no_sim     = $data['no_sim'];
          $status_sipil = $data['status_sipil'];
          $alamat_email = $data['alamat_email'];
          $alamat_sekarang = $data['alamat_sekarang'];
          $alamat_domisili = $data['alamat_domisili'];
          $no_handphone = $data['no_handphone'];
          $telepon     = $data['telepon'];
          $pendidikan_terakhir = $data['pendidikan_terakhir'];
          $kemampuan_komputer = $data['kemampuan_komputer'];
          $bahasa_asing = $data['bahasa_asing'];
          $riwayat_penyakit = $data['riwayat_penyakit'];
          $pengalaman_kerja = $data['pengalaman_kerja'];
          $lama_pengalaman = $data['lama_pengalaman'];
          $foto = $data['foto'];
          $ktp = $data['ktp'];
          $ijazah = $data['ijazah'];
          $jadwal_interview = $data['jadwal_interview'];
          $post_date = $data['post_date'];
          $komentar = $data['komentar'];
          $status_pelamar = $data['status_pelamar'];
        }
      }

	$content = '
	<style>
		.mag-top{
			margin-top:50px;
			margin-left:50px;
		}
		.wid{
			width:100%;
		}
		.img{
			margin-top: 0px;
			margin-left: 0px;
        	background-image: url("img/hera-black.png");
 		}
	</style>
	<page backimg="img/hera-black.png">
		<div >
			<div class="img-logo">
				<img width="500" height="120" src="../image/logoPng_harda.png">
			</div>
			<div class="img-pelamar">
		    	<img width="100" height="130" style="position:absolute;right:0px;top:10%;" src="'.$foto.'">
			</div>
		    <table style="width:40%; position:relative;top:-20%;" class="wid">
		    	<tr>
		    		<td style="width:50%";>Posisi</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:20%";>'.$posisi.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Refrensi</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$refrensi.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Nama Lengkap</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$nama_lengkap.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Warga Negara</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$warga_negara.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Tempat Lahir</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$tempat_lahir.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Tanggal Lahir</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$tanggal_lahir.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Agama</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$agama.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Jenis Kelamin</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$jenis_kelamin.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>No KTP</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$no_ktp.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>No SIM</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$no_sim.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Status Sipil</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$status_sipil.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Alamat Email</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$alamat_email.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Alamat Sekarang</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$alamat_sekarang.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Alamat Domisili</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$alamat_domisili.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>No Handphone</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$no_handphone.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Telepon</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$telepon.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Pendidikan Terakhir</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$pendidikan_terakhir.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Kemampuan Komputer</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$kemampuan_komputer.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Bahasa Asing</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$bahasa_asing.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Riwayat Penyakit</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$riwayat_penyakit.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Pengalaman Kerja</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$pengalaman_kerja.'</td>
		    	</tr>
		    	<tr>
		    		<td style="width:50%";>Lama Pengalaman</td>
		    		<td style="width:50%";>:</td>
		    		<td style="width:50%";>'.$lama_pengalaman.'</td>
		    	</tr>
		    </table>
		    <div class="mag-top">
			     <img width="300" height="150" src="'.$ktp.'">
			     <img style="margin-left:50px;" width="300" height="150" src="'.$ijazah.'">              
		    </div>
		    <div style="position:relative;top:15%;">
		    	<hr>
			    <p style="text-align:center;">
			    	ILP Building 3rd Floor Suite 15 Pasar Minggu Raya No. 39a Pancoran, South Jakarta 12780
			    </p>
		    
		    	<p style="text-align:center;">
		    		Telephone: (021) 7988154  Fax: (021) 79170718  Email: info@pthardaesaraksa.com 
		    	</p>
		    </div>
		</div>
	</page>';

	require_once('plugins/html2pdf/html2pdf.class.php');
	$html2pdf =  new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('pelamar-'.$nama_lengkap.'-'.$posisi.'.pdf');
?>