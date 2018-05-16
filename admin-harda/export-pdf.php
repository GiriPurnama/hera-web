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
          $no_handphone = $data['no_handphone'];
          $telepon     = $data['telepon'];
          $pendidikan_terakhir = $data['pendidikan_terakhir'];
          $kemampuan_komputer = $data['kemampuan_komputer'];
          $bahasa_asing = $data['bahasa_asing'];
          $riwayat_penyakit = $data['riwayat_penyakit'];
          $pengalaman_kerja = $data['pengalaman_kerja'];
          $perusahaan_kerja = $data['perusahaan_kerja'];
          $tahun_kerja = $data['tahun_kerja'];
          $lama_pengalaman = $data['lama_pengalaman'];
          $foto = $data['foto'];
          $ktp = $data['ktp'];
          $ijazah = $data['ijazah'];
          $jadwal_interview = $data['jadwal_interview'];
          $post_date = $data['post_date'];
          $komentar = $data['komentar'];
          $status_pelamar = $data['status_pelamar'];
          $tinggi_badan = $data['tinggi_badan'];
          $berat_badan = $data['berat_badan'];
          $posisi_rekomendasi = $data['posisi_rekomendasi'];
          $promosi_diri = $data['promosi_diri'];
        }
      }

      $ndata = preg_replace("/\,/", "<br/>", $pengalaman_kerja);  

      $warga_negara = $warga_negara ?: '-';
      $no_sim = $no_sim ?: '-';
      $telepon = $telepon ?: '-';
      $bahasa_asing = $bahasa_asing ?: '-';
      $riwayat_penyakit = $riwayat_penyakit ?: '-';
      $posisi_rekomendasi = $posisi_rekomendasi ?: $posisi;  

$html = '
<div style="background-image:url(img/hera-black-op5.png); background-image-resize: 15; background-position: center center; background-repeat: no-repeat;">
	<div>
		<img width="100" height="130" style="margin-left:80%;padding-top:100px" src="'.$foto.'">
	</div>
	<table width="60%" style="padding-top:-130px;" cellspacing="0">
		<tbody>
			<tr>
	    		<td style="width:50%";>Posisi</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$posisi_rekomendasi.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Nama Lengkap</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$nama_lengkap.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Warga Negara</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$warga_negara.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Tempat Lahir</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$tempat_lahir.'</td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Tanggal Lahir</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$tanggal_lahir.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Agama</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$agama.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Jenis Kelamin</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$jenis_kelamin.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Tinggi/Berat</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$tinggi_badan.'/'.$berat_badan.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>No KTP</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$no_ktp.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>No SIM</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$no_sim.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Status Sipil</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$status_sipil.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Alamat Email</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$alamat_email.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Alamat Sekarang</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$alamat_sekarang.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>No Handphone</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$no_handphone.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Telepon</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$telepon.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Pendidikan Terakhir</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$pendidikan_terakhir.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Kemampuan Dimiliki</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$kemampuan_komputer.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Bahasa Asing</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$bahasa_asing.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Riwayat Penyakit</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$riwayat_penyakit.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%";>Promosi Diri</td>
	    		<td style="width:5%";>:</td>
	    		<td style="width:100%";>'.$promosi_diri.'</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td style="width:50%; font-weight:bold;">PENGALAMAN KERJA</td>
	    	</tr>
	    	<tr>
	    		<td style="width:100%";>'.$ndata.'</td>
	    	</tr>
	    	
		</tbody>
	</table>
	<div style="padding-top:100px;">
		<img width="300" height="150" src="'.$ktp.'">
	</div>
	
</div>
<img style="padding-top:100px;" src="'.$ijazah.'">      
';

$header = '<img src="../image/logoPng_harda.png" style="height:120px; margin-right:50%;" >';
$footer = '<div>
				Gedung ILP Lantai 3 Ruang 15 Jalan Raya Pasar Minggu No. 39a Pancoran, Jakarta Selatan 12780
		   </div>
		   <div>
		   		Telepon: (021) 7988154  Fax: (021) 79170718  Email: info@pthardaesaraksa.com 
		   </div>
		   ';


require_once('plugins/mpdf/mpdf.php');

$mpdf = new mPDF();
$mpdf->SetHeader($header);
$mpdf->SetFooter($footer);
$mpdf->WriteHTML($html);
 
//call watermark content aand image
// $mpdf->SetWatermarkText('PT Harda Esa Raksa');
// $mpdf->showWatermarkText = true;
// $mpdf->watermarkTextAlpha = 0.1;
// $mpdf->SetWatermarkImage('img/hera-black2.png');
// $mpdf->showWatermarkImage = true;
 
 
//save the file put which location you need folder/filname
$mpdf->Output("pelamar-".$nama_lengkap."-".$posisi."-ID:".$id.".pdf", 'D');
 
 
//out put in browser below output function
$mpdf->Output();

?>