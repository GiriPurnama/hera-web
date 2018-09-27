<?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include "../config/koneksi.php";
    include "../config/indo_tgl.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[random_int(0, $max)];
	    }
	    return implode('', $pieces);
	}

	if (isset($_POST['simpan'])) {
		$posisi = mysqli_real_escape_string($db, trim(strtoupper($_POST['posisi'])));
		$refrensi = strtoupper($_POST['refrensi']);
		$nama_lengkap = mysqli_real_escape_string($db, trim(strtoupper($_POST['nama_lengkap'])));
		$warga_negara = mysqli_real_escape_string($db, trim(strtoupper($_POST['warga_negara'])));
		$tempat_lahir = mysqli_real_escape_string($db, trim(strtoupper($_POST['tempat_lahir'])));
		
		// $tanggal = $_POST['tanggal_lahir'];
		// $tgl = explode('-',$tanggal);
		// $tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		$tanggal_lahir = strtoupper($_POST['tanggal_lahir']);
		
		$agama = strtoupper($_POST['agama']);
		$jenis_kelamin = strtoupper($_POST['jenis_kelamin']);
		$no_ktp = strtoupper($_POST['no_ktp']);
		$no_sim = strtoupper($_POST['no_sim']);
		$status_sipil = strtoupper($_POST['status_sipil']);
		$alamat_email = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_email'])));
		$alamat_sekarang = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_sekarang'])));
		$alamat_ktp = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_ktp'])));
		$no_handphone = strtoupper($_POST['no_handphone']);
		$no_wa = strtoupper($_POST['no_wa']);
		$telepon = strtoupper($_POST['telepon']);
		$pendidikan_terakhir = strtoupper($_POST['pendidikan_terakhir']);
		$kemampuan_komputer  = mysqli_real_escape_string($db, trim(strtoupper($_POST['kemampuan_komputer'])));
		$bahasa_asing = strtoupper($_POST['bahasa_asing']);
		$riwayat_penyakit = mysqli_real_escape_string($db, trim(strtoupper($_POST['riwayat_penyakit'])));
		$pengalaman_kerja = mysqli_real_escape_string($db, trim(strtoupper($_POST['pengalaman_kerja'])));
		$perusahaan_kerja = mysqli_real_escape_string($db, trim(strtoupper($_POST['perusahaan_kerja'])));
		$tahun_kerja = mysqli_real_escape_string($db, trim(strtoupper($_POST['tahun_kerja'])));
		$lama_pengalaman = strtoupper($_POST['lama_pengalaman']);
		$foto = mysqli_real_escape_string($db, trim($_POST['foto']));
		$ktp = mysqli_real_escape_string($db, trim($_POST['ktp']));
		$ijazah = mysqli_real_escape_string($db, trim($_POST['ijazah']));
		$promosi_diri = mysqli_real_escape_string($db, trim(strtoupper($_POST['promosi_diri'])));
		$tinggi_badan = mysqli_real_escape_string($db, trim(strtoupper($_POST['tinggi_badan'])));
		$berat_badan = mysqli_real_escape_string($db, trim(strtoupper($_POST['berat_badan'])));
		$kuliah = strtoupper($_POST['kuliah']);
		$branch = strtoupper($_POST['branch']);
		$status_hubungan = strtoupper($_POST['status_hubungan']);
		$nama_hubungan = strtoupper($_POST['nama_hubungan']);
		$no_telp = strtoupper($_POST['no_telp']);

		function correctImageOrientationFoto($foto) {
		  if (function_exists('exif_read_data')) {
		    $exif = exif_read_data($foto);
		    if($exif && isset($exif['Orientation'])) {
		      $orientation = $exif['Orientation'];
		      if($orientation != 1){
		        $img = imagecreatefromjpeg($foto);
		        $deg = 0;
		        switch ($orientation) {
		          case 3:
		            $deg = 180;
		            break;
		          case 6:
		            $deg = 270;
		            break;
		          case 8:
		            $deg = 90;
		            break;
		        }
		        if ($deg) {
		          $img = imagerotate($img, $deg, 0);       
		        }
		        imagejpeg($img, $foto, 95);
		      } // if there is some rotation necessary
		    } // if have the exif orientation info
		  } // if function exists     
		}


		$fileinfo=PATHINFO($_FILES["copy_cv"]["name"]);
		$newFilenameCv=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["copy_cv"]["tmp_name"],"../cv/" . $newFilenameCv);
		$cv_up="../cv/" . $newFilenameCv;
	
		$type = $_FILES['foto']['type'];
		$fileinfo=PATHINFO($_FILES["foto"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/" . $newFilename);
		$location="../upload/" . $newFilename;
		correctImageOrientationFoto($location);

		$type1 = $_FILES['ktp']['type'];
		$fileinfo2=PATHINFO($_FILES["ktp"]["name"]);
		$newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];
		move_uploaded_file($_FILES["ktp"]["tmp_name"],"../upload/" . $newFilename2);
		$location2="../upload/" . $newFilename2;

		$type2 = $_FILES['ijazah']['type'];
		$fileinfo3=PATHINFO($_FILES["ijazah"]["name"]);
		$newFilename3=$fileinfo3['filename'] ."_". time() . "." . $fileinfo3['extension'];
		move_uploaded_file($_FILES["ijazah"]["tmp_name"],"../upload/" . $newFilename3);
		$location3="../upload/" . $newFilename3;

		$sortName = substr($refrensi,0,2);
		$token = $sortName."-".random_str(3);
		
		$warga_negara = $warga_negara ?: '-';
      	$no_sim = $no_sim ?: '-';
        $telepon = $telepon ?: '-';
        // $bahasa_asing = ($bahasa_asing == "undefined" ? "-" : $bahasa_asing);
        $riwayat_penyakit = $riwayat_penyakit ?: '-';

		// $jadwal_interview = strtoupper($_POST['jadwal_interview']);

		$query = mysqli_query($db, "INSERT INTO recruitment(posisi,
															refrensi,
															nama_lengkap,
															warga_negara,
															tempat_lahir,
															tanggal_lahir,
															agama,
															jenis_kelamin,
															no_ktp,
															no_sim,
															status_sipil,
															alamat_email,
															alamat_sekarang,
															alamat_ktp,
															no_handphone,
															no_wa,
															telepon,
															pendidikan_terakhir,
															kemampuan_komputer,
															bahasa_asing,
															riwayat_penyakit,
															pengalaman_kerja,
															perusahaan_kerja,
															tahun_kerja,
															lama_pengalaman,
															foto,
															ktp,
															ijazah,
															jadwal_interview,
															promosi_diri,
															tinggi_badan,
															berat_badan,
															token,
															copy_cv,
															branch,
															status_hubungan,
															nama_hubungan,
															no_telp,
															post_date)
															VALUES('$posisi',
																	'$refrensi',
																	'$nama_lengkap',
																	'$warga_negara',
																	'$tempat_lahir',
																	'$tanggal_lahir',
																	'$agama',
																	'$jenis_kelamin',
																	'$no_ktp',
																	'$no_sim',
																	'$status_sipil',
																	'$alamat_email',
																	'$alamat_sekarang',
																	'$alamat_ktp',
																	'$no_handphone',
																	'$no_wa',
																	'$telepon',
																	'$pendidikan_terakhir',
																	'$kemampuan_komputer',
																	'$bahasa_asing',
																	'$riwayat_penyakit',
																	'$pengalaman_kerja',
																	'$perusahaan_kerja',
																	'$tahun_kerja',
																	'$lama_pengalaman',
																	'$location',
																	'$location2',
																	'$location3',
																	'$jadwal_interview',
																	'$promosi_diri',
																	'$tinggi_badan',
																	'$berat_badan',
																	'$token',
																	'$cv_up',
																	'$branch',
																	'$status_hubungan',
																	'$nama_hubungan',
																	'$no_telp',
																	 NOW())");
		if ($query) {
			header('location: info.hera');
			 // $to = "recruiment@pthardaesaraksa.com"; // this is your Email address
		  //    $from = $_POST['alamat_email']; // this is the sender's Email address
		  
		     // $subject = "Undangan Interview";
		     $subject2 = "Undangan Interview PT Harda Esa Raksa";
		     // $message = "Dear, " .$nama_lengkap. "\n\n" ."Terimakasih telah mengirim data diri. Untuk proses lebih lanjut silahkan Walk in Interview Ke Kantor PT Harda Esa Raksa " .$branch."\n\n"."Jadwal Walk in Interview: Senin sampai Jum'at pukul 09.00 - 15.00 WIB"."\n\n"."Nomor Token ID Anda " .$token."\n\n"."Dimohon untuk kedatangannya"."\n\n"."Terimakasih";
		     // $message2 = "Dear, " .$nama_lengkap. "<br><br>Terimakasih telah mengirim data diri.<br>Untuk proses lebih lanjut silahkan Walk in Interview Ke Kantor <b>PT Harda Esa Raksa " .$branch."</b>.<br>Jadwal Walk in Interview: <b>Senin sampai Jum'at pukul 09.00 - 15.00 WIB</b> <br><br>Nomor Token ID Anda <b>" .$token."</b> <br><br>Dimohon untuk kedatangannya <br>Terimakasih";
		      $message2 = "Dear, " .$nama_lengkap. "<br><br>Berdasarkan lamaran yang telah anda kirimkan melalui
							website <b>PT Harda Esa Raksa " .$branch."</b>, maka bersama dengan email
							ini kami mengundang anda untuk mengikuti proses interview pada :<br>Waktu: <b>Senin s/d Jum'at pukul 09.00 s/d 15.00 WIB</b> <br>Tempat : <b>PT HARDA ESA RAKSA " .$branch."<br>Alamat : Gedung ILP Pancoran Lt.3 Ruang 15, Jl. Raya Pasar Minggu No. 39-A Jakarta Selatan.<br>Di harapkan datang menggunakan pakaian Formal dan rapi.<br><br>Demikian yang dapat kami sampaikan, ditunggu kedatangannya.<br>Terimakasih";


		  //    $headers = "From:" . $from;
		  //    $headers2 = "From:" . $to;
		  //    mail($to,$subject,$message,$headers);
		  //    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

			require '../vendor/autoload.php';

		    $mail = new PHPMailer(true);                            
		    try {
		        //Server settings
		        $mail->IsHTML(true);
				$mail->CharSet = "text/html; charset=UTF-8;";
		        $mail->isSMTP();                                     
		        $mail->Host = 'mx1.hostinger.co.id';                      
		        $mail->SMTPAuth = true;                             
		        $mail->Username = 'recruitment@pthardaesaraksa.com';     
		        $mail->Password = 'heraharda123';             
		        $mail->SMTPOptions = array(
		            'ssl' => array(
		            'verify_peer' => false,
		            'verify_peer_name' => false,
		            'allow_self_signed' => true
		            )
		        );                         
		        $mail->SMTPSecure = 'ssl';                           
		        $mail->Port = 465;                                   

		        //Send Email
		        $mail->setFrom('recruitment@pthardaesaraksa.com');
		        
		        //Recipients
		        $mail->addAddress($alamat_email);              
		        $mail->addReplyTo('recruitment@pthardaesaraksa.com');
		        
		        //Content
		        $mail->isHTML(true);                                  
		        $mail->Subject = $subject2;
		        $mail->Body    = $message2;

		        $mail->send();
				
		    } catch (Exception $e) {
			   	echo ("<script LANGUAGE='JavaScript'>window.alert('Maaf tidak bisa kirim email'); window.location.href='recruitment.hera'</script>");
		    }
		     
		    // You can also use header('Location: thank_you.php'); to redirect to another page.
		    // You cannot use header and echo together. It's one or the other.
			// echo ("<script LANGUAGE='JavaScript'>w window.location.href='../info.hera'</script>");
		} else {
			// jika gagal tampilkan pesan kesalahan
			// header('location: index.php?alert=1');
		echo ("<script LANGUAGE='JavaScript'>window.alert('Maaf data gagal diinput'); window.location.href='recruitment.hera'</script>");
			// header('location: ../inforegistrasi.php?alert=1');
		}	
	}
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <title>PT Harda Esa Raksa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta property="og:title" content="PT Harda Esa Raksa Recruitment" />
  <meta property="og:description" content="Harda Esa Raksa berdiri sejak tahun 1987 dimulai dari usaha perdagangan alat-alat telekomunikasi dan barang cetak, hingga berawal pada tahun 2007, Harda Esa Raksa mengembangkan bisnis dalam hal penyaluran dan penempatan tenaga kerja." />
  <meta property="og:url" content="http://pthardaesaraksa.com/" />
  <meta property="og:image" content="img/black.png" />
 <!--  <meta content="" name="keywords">
  <meta content="" name="description">
 -->
  <!-- Favicons -->
  <link href="img/black.png" rel="shortcut icon">
  <link href="img/black.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="lib/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
 <div id="loader">
    <img class="img-responsive" src="image/loading.gif">
  </div>
	<div class="full-modal recruitment">
		<div class="modal-header">
			<a href="/"><h5 class="modal-title">Recruitment</h5></a>
		</div>
		<div class="container">
			<div class="row">
				<div class="stepwizard">
	              <div class="stepwizard-row setup-panel">
	                  <div class="stepwizard-step">
	                      <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
	                      <p>Biodata Diri</p>
	                  </div>
	                  <div class="stepwizard-step">
	                      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
	                      <p>Riwayat Hidup</p>
	                  </div>
	                  <div class="stepwizard-step">
	                      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
	                      <p>Upload Dokumen</p>
	                  </div>
	              </div>
	          </div>
	           <form role="form" id="formPelamar" method="post" action=""  enctype="multipart/form-data">
	              <div class="row setup-content" id="step-1">
	                  
	                  <div class="col-md-12">
	                    <h3>Data Diri</h3>
	                  </div>
	                  
	                  <div class="form-group col-md-12">
	                  <label for="Posisi">Tempat Interview* :</label>
	                    <select  class='form-control' id="branchWilayah" name='branch' required>
	                        <option value="">-</option>
	                        <?php 
	                            $lamar = mysqli_query($db, "SELECT * FROM kontak");
	                            while ($row = mysqli_fetch_assoc($lamar)) {
	                        ?>
	        
	                        <option id="kantor" data-id="<?= $row['idkontak']; ?>" value="<?= $row['wilayah'];?>"><?= $row["wilayah"];?></option>
	                        
	                        <?php    
	                            }
	                        ?>
	                    </select>
	                    <div class="display-text">*Harap Isi Tempat Interview</div>
	                  </div>

	                  <div class="form-group col-md-6 field-position">
	                  <label for="Posisi">Posisi yang Dilamar* :</label>
	                    <select class="form-control" id="posisiPelamar" name="posisi" required>
	                        <option value="">-</option>
	                        <option value="1">Lainnya</option>
	                    </select>
	                    <!-- <input type="text" class="form-control" id="position" name="posisi" required> -->
	                    <div class="display-text">*Harap Isi Posisi yang dilamar</div>
	                  </div>

	                  <div class="form-group col-md-6 ghost-ref">
	                    <label for="Refrensi">Referensi* :</label>
	                    <select class="form-control opacity0" id="refrensi" name="refrensi" required>
	                      <option value="">-</option>
	                      <?php 
	                        $refrensi = mysqli_query($db, "SELECT * FROM login");
	                        while ($row = mysqli_fetch_assoc($refrensi)) {
	                        $nama_lengkap = $row['nama_lengkap'];
	                      ?> 
	                      
	                      <option value="<?= $nama_lengkap; ?>"><?= $nama_lengkap; ?></option>                     
	                      
	                      <?php } ?>
	                      <option value="1">Lainnya</option>
	                    </select>
	                    <div class="display-text">*Harap Isi Referensi</div>
	                  </div>

	                  <div class="col-md-12">
	                    <div class="deskripsi-lowongan"></div>
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="Nama">Nama Lengkap* :</label>
	                    <input type="text" class="form-control" id="fullName" autocomplete="off" name="nama_lengkap" required>
	                    <div class="display-text">*Harap Isi Nama Lengkap</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="wargaNegara">Warga Negara :</label>
	                    <input type="text" class="form-control" id="wargaNegara" name="warga_negara">
	                  </div>

	                  <div class="form-group col-md-12">
	                    <label for="tempat_lahir">Tempat Lahir* :</label>
	                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
	                    <div class="display-text">*Harap Isi Tempat Lahir</div>                
	                  </div>

	                  <div class="form-group col-md-12">
	                    <label for="tanggal_lahir">Tanggal Lahir* :</label>
	                    <!-- <input type="text" class="form-control readonly" name="tanggal_lahir" id="contoh"> -->
	                    <input type="text" class="form-control readonly" autocomplete="off" id="tanggal_lahir" name="tanggal_lahir" required>
	                    <div class="display-text">*Harap Isi Tanggal Lahir</div>
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="Agama">Agama* :</label>
	                    <select class="form-control opacity0" id="agama" name="agama" required>
	                      <option value="">-</option>
	                      <option value="ISLAM">Islam</option>
	                      <option value="KRISTEN PROTESTAN">Kristen Protestan</option>
	                      <option value="KRISTEN KATOLIK">Kristen Katolik</option>
	                      <option value="HINDU">Hindu</option>
	                      <option value="BUDHA">Budha</option>
	                    </select>
	                    <div class="display-text">*Harap Isi Agama</div>
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="idJk">Jenis Kelamin* :</label>
	                    <div class="radio">
	                      <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required>Laki - Laki</label>
	                    </div>
	                    <div class="radio">
	                      <label><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
	                    </div>
	                    <div class="display-text">*Harap Isi Jenis Kelamin</div>
	                  </div>

	                  <div class="form-group col-md-6 error-ktp">
	                    <label for="idCart">No.KTP* :</label>
	                    <input type="text" class="form-control" id="idCard" autocomplete="off" name="no_ktp" onKeyPress="return goodchars(event,'0123456789',this)" required>
	                     <div class="display-text ktpid">*Harap Isi KTP</div>
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="idSim">No.SIM:</label>
	                    <input type="text" class="form-control" name="no_sim" autocomplete="off" id="idSim" onKeyPress="return goodchars(event,'0123456789',this)">
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="status_sipil">Status Sipil* :</label>
	                    <select class="form-control opacity0" id="status_sipil" name="status_sipil" required>
	                      <option value="">-</option>
	                      <option value="Menikah">Menikah</option>
	                      <option value="Lajang">Lajang</option>
	                      <option value="Cerai">Cerai</option>
	                    </select>
	                    <div class="display-text">*Harap Isi Status Sipil</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="alamat_email">Alamat Email* :</label>
	                    <input type="email" class="form-control" autocomplete="off" id="alamat_email" name="alamat_email" required>
	                    <div class="display-text">*Harap Isi Email yang valid</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="berat_badan">Berat Badan* :</label>
	                    <input type="text" name="berat_badan" id="berat_badan" autocomplete="off" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
	                     <div class="display-text">*Harap Isi Berat</div>
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="berat_badan">Tinggi Badan* :</label>
	                    <input type="text" name="tinggi_badan" id="tinggi_badan" autocomplete="off" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
	                    <div class="display-text">*Harap Isi Tinggi</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="alamat_sekarang">Alamat Tinggal Sekarang* :</label>
	                    <textarea name="alamat_sekarang" id="alamat_sekarang" class="form-control textareaSekarang" style="height:110px;" required></textarea>
	                    <div class="display-text">*Harap Isi Alamat Tinggal Sekarang</div>
	                  </div>

	                   <div class="form-group col-md-6">
	                    <label for="alamat_ktp">Alamat KTP* :</label>
	                    <textarea name="alamat_ktp" id="alamat_ktp" class="form-control textareaSekarang" style="height:110px;" required></textarea>
	                    <div class="display-text">*Harap Isi Alamat KTP</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="noHandphone">No Handphone* :</label>
	                    <input type="text" class="form-control" id="idHandphone" name="no_handphone" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" required>
	                    <div class="display-text">*Harap Isi No Handphone</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="noHandphone">No WA :</label>
	                    <input type="text" class="form-control" id="idHandphoneWa" name="no_wa" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)">
	                    <div class="display-text">*Harap Isi No WA</div>
	                  </div>

	                  <div class="form-group col-md-6">
	                    <label for="telepon">Telepon :</label>
	                    <input type="text" class="form-control" id="idTelepon" name="telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)">
	                  </div>
	                  
	                  <div class="form-group col-md-6">
	                    <label for="kemampuan">Kemampuan Dimiliki* :</label>
	                    <input type="text" class="form-control" autocomplete="off" id="skill" name="kemampuan_komputer" required>
	                     <div class="display-text">*Harap Isi Kemampuan/Skill Anda</div>
	                  </div>

	                  <div class="col-md-12">
	                    <button class="btn btn-primary nextBtn" id="btnFirst" type="button">Next</button>
	                  </div>
	              </div>

	              <div class="row setup-content" id="step-2">
	                <div class="col-md-12">
	                  <h3>Riwayat Hidup</h3>
	                </div>

	                <div class="form-group col-md-12">
	                  <label for="bahasa" class="wd100">Bahasa Asing :</label>
	                    <div>
	                      <label class="radio-inline"><input type="radio" name="bahasa_asing" value="INGGRIS">INGGRIS</label>
	                    <label class="radio-inline"><input type="radio" name="bahasa_asing" value="MANDARIN">MANDARIN</label>
	                    <label class="radio-inline"><input type="radio" name="bahasa_asing" value="JEPANG">JEPANG</label>
	                    <label class="radio-inline"><input type="radio" name="bahasa_asing" value="JERMAN">JERMAN</label>
	                    <label class="radio-inline" style="display:none;"><input type="radio" name="bahasa_asing" value="-" checked="checked"></label>
	                    </div>
	                </div>

	                <div class="form-group col-md-6">
	                  <label for="pendidikan_terakhir">Pendidikan Terakhir* :</label>
	                  <select class="form-control opacity0" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
	                    <option value="">-</option>
	                    <option value="SMA">SMA</option>
	                    <option value="D3">D3</option>
	                    <option value="S1">S1</option>
	                    <option value="S2">S2</option>
	                    <option value="S3">S3</option>
	                  </select>
	                  <div class="display-text">*Harap Isi Pendidikan Terakhir</div>
	                </div>
	                
	                <div class="form-group col-md-6">
	                  <label for="riwayat">Riwayat Penyakit :</label>
	                  <input type="text" class="form-control" autocomplete="off" id="riwayat" name="riwayat_penyakit">
	                </div>

	                <div class="form-group col-md-12">
	                  <label for="pengalaman">Pengalaman Pekerjaan* :</label>
	                  <div style="color:purple;">
	                    <label style="width:100%;">Contoh:</label> 
	                    <label style="width:100%;">1. Posisi - Perusahaan - Lama Bekerja,</label> 
	                    <label style="width:100%;">2. Posisi - Perushaan - Lama Bekerja</label>
	                      <label style="width:100%;">dan seterusnya</label>
	                  </div>
	                  <span>Gunakan <b>Koma(,)</b> Sebagai "<b>Enter</b>" untuk lanjutan pengalaman</span>
	                  <div class="noted"><b>Wajib Cantumkan Semua pengalaman kerja anda!!!</b></div>
	                  <textarea name="pengalaman_kerja" id="pengalaman_kerja" class="form-control textareaKerja" required></textarea>
	                  <div class="display-text">*Harap Isi Pengalaman sesuai contoh</div>
	                </div>

	                <div class="form-group col-md-12">
	                  <label for="kemampuan">Promosikan Diri Anda* :</label>
	                  <input type="text" class="form-control" autocomplete="off" id="promosiDiri" name="promosi_diri" required>
	                  <div class="display-text">*Harap Promosikan Diri anda</div>
	                </div>

	                <div class="col-md-12">
	                  <h3>No yang bisa dihubungi</h3>
	                </div>

	                <div class="form-group col-md-6">
	                  <label>Status Hubungan* :</label>
	                  <select class="form-control opacity0" name="status_hubungan" required>
	                    <option value="">-</option>
	                    <option value="Ibu">Ibu</option>
	                    <option value="Bapak">Bapak</option>
	                    <option value="Kakak">Kakak</option>
	                    <option value="Adik">Adik</option>
	                    <option value="Saudara">Saudara</option>
	                  </select>
	                  <div class="display-text">*Harap Isi Status Relasi anda</div>
	                </div>

	                <div class="form-group col-md-6">
	                  <label>Nama* :</label>
	                  <input type="text" class="form-control" name="nama_hubungan" required>
	                  <div class="display-text">*Isi nama relasi yang bisa dihubungi</div>
	                </div>

	                <div class="form-group col-md-6">
	                  <label>No Telepon* :</label>
	                  <input type="text" class="form-control" name="no_telp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" required>
	                  <div class="display-text">*Isi no telepon yang bisa hubungi</div>
	                </div>

	                <div class="col-md-12">
	                  <button class="btn btn-primary nextBtn" type="button" >Next</button>     
	                </div>
	              </div>

	              <div class="row setup-content" id="step-3">
	                  <div class="col-xs-12">
	                      <div class="col-md-12">

	                          <div class="col-md-12">
	                            <h3>Upload Data</h3>
	                          </div>

	                          <div class="form-group col-md-12 error-notif-foto">
	                            <label for="foto">Upload Foto :</label>
	                              <input type="file" class="form-control" id="fotoUpload" name="foto" required>
	                              <span class="small-font">Semua jenis format dokumen atau image*</span>
	                              <div class="display-text">*Harap Upload Foto</div>
	                          </div>

	                          <div class="form-group col-md-12 error-notif-ktp">
	                            <label for="ktp">Upload KTP :</label>
	                            <input type="file" class="form-control" id="ktpUpload" name="ktp" required>
	                            <span class="small-font">Semua jenis format dokumen atau image*</span>
	                            <div class="display-text">*Harap Upload KTP</div>
	                          </div>

	                          <div class="form-group col-md-12 error-notif-ijazah">
	                            <label for="ijazah">Upload Ijazah :</label>
	                            <input type="file" class="form-control" id="ijazahUpload" name="ijazah" required>
	                            <span class="small-font">Semua jenis format dokumen atau image*</span>
	                            <div class="display-text">*Harap Upload Ijazah</div>
	                          </div>

	                          <div class="form-group col-md-12 error-notif-cv">
	                            <label for="cv">Upload CV :</label>
	                            <input type="file" class="form-control" id="copy_cv" name="copy_cv" required>
	                            <span class="small-font">Semua jenis format dokumen atau image*</span>
	                            <div class="display-text">*Harap Upload CV</div>
	                          </div>
	              
	                          <div class="col-md-12">
	                            <button class="btn btn-success" name="simpan" id="finish" type="submit">Finish</button>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	          </form>
			</div>
		</div>
	</div>
</body>
</html>  
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="lib/datemask/jquery.date-dropdowns.min.js"></script>
  <!--<script src="lib/date-picker/js/bootstrap-datepicker.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
<!-- Ajax -->
<script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
            };
        // else return false
        return false;
    }
</script>
<!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> -->
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

$(".pass_conf").keyup(function(){
  var password1 = $(".pass_primary").val();
  var confirmPassword1 = $(".pass_conf").val();

 if (password1 != confirmPassword1) {
      $(".savePass").prop('disabled', true);
      $(".pass_conf").css("border", "1px solid red");
  } else {
      $(".savePass").prop('disabled', false);
      $(".pass_conf").css("border", "1px solid #d2d6de");
  } 
})


$(document).ready(function () {

  $(".deskripsi-lowongan").hide();
  
  $('#branchWilayah').on('change', function() {
   var rowpelamar = $("#branchWilayah").val();
      
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'rowpelamar='+ rowpelamar,
                success:function(data){
                	console.log("sukses");
                    $('#posisiPelamar').html(data); 
                }
            }); 
        
    
  })

  $('#posisiPelamar').on('change', function() {
    var deskripsiLowongan = $("#posisiPelamar").find(':selected').attr('data-val');

    if (deskripsiLowongan != null) {
      $(".deskripsi-lowongan").show();
      $(".deskripsi-lowongan").html("<b>KUALIFIKASI</b><br><br>" + deskripsiLowongan);
    } else {
      console.log("Hello");
      $(".deskripsi-lowongan").hide();
    };
  });
  // Jquery Step Wizard
    var navListItems = $('.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='radio'],input[name='tanggal_lahir'],input[type='file'],input[type='hidden'],select,textarea"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        $(".form-group").removeClass("display");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
                $(curInputs[i]).closest(".form-group").addClass("display");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
  // Jquery Step Wizard


 $(".readonly").on('keydown paste', function(e){
    e.preventDefault();
 });

 $('#modalSuccess').on('hidden.bs.modal', function () {
    location.reload();
 })

  $('#modalVideoGaleri').on('hidden.bs.modal', function () {
    document.getElementById( 'player' ).setAttribute( 'src', '' );
 })


 // $("#tanggal_lahir").datepicker({ 
 //      format: 'yyyy-mm-dd',
 //      startDate: '-40y',
 //      endDate: '-17y',
 //      autoclose: true
 //  });

  $("#formPelamar").submit(function(e) {
    $("#loader").show();
    // e.preventDefault();
  });
 
// AJAX
  // $(document).on('submit', '#formPelamar', function(){

  //   // if (CheckValidasiPeserta() == true ) {
  //     $("#loader").show();
  //     // $("#labelError").hide();
  //     var data = new FormData(this);
  //     data.append('branch', $('#branch').val());
  //     data.append('posisi', $('#posisiPelamar').val());
  //     data.append('refrensi', $('[name="refrensi"]').val());
  //     data.append('nama_lengkap', $('#fullName').val());
  //     data.append('warga_negara', $('#wargaNegara').val());
  //     data.append('tempat_lahir', $('#tempat_lahir').val());
  //     data.append('tanggal_lahir', $('#tanggal_lahir').val());
  //     data.append('agama', $('#agama').val());
  //     data.append('jenis_kelamin', $("input[name='jenis_kelamin']:checked").val());
  //     data.append('no_ktp', $('#idCard').val());
  //     data.append('no_sim', $('#idSim').val());
  //     data.append('status_sipil', $('#status_sipil').val());
  //     data.append('alamat_email', $('#alamat_email').val());
  //     data.append('berat_badan', $('#berat_badan').val());
  //     data.append('tinggi_badan', $('#tinggi_badan').val());
  //     data.append('alamat_sekarang', $('#alamat_sekarang').val());
  //     data.append('alamat_ktp', $('#alamat_ktp').val());
  //     data.append('no_handphone', $('#idHandphone').val());
  //     data.append('no_wa', $('#idHandphoneWa').val());
  //     data.append('telepon', $('#idTelepon').val());
  //     data.append('kemampuan_komputer', $('#skill').val());
  //     data.append('pendidikan_terakhir', $('#pendidikan_terakhir').val());
  //     // data.append('kuliah', $("input[name='kuliah']:checked").val());
  //     data.append('bahasa_asing', $("input[name='bahasa_asing']:checked").val());
  //     data.append('riwayat_penyakit', $('#riwayat').val());
  //     data.append('pengalaman_kerja', $('#pengalaman_kerja').val());
  //     data.append('foto', $('#fotoUpload')[0].files[0]);
  //     data.append('ktp', $('#ktpUpload')[0].files[0]);
  //     data.append('ijazah', $('#ijazahUpload')[0].files[0]);
  //     data.append('copy_cv', $('#copy_cv')[0].files[0]);
  //     data.append('promosi_diri', $('#promosiDiri').val());

  //     $.ajax({
  //        url : "datafiles/insert.php",  
  //        method: 'POST',
  //        cache: false,
  //        contentType: false,
  //        processData: false,
  //        data : data,

  //        success: function(data){
  //           // $("#labelSuccess").show();
  //           // $("#labelSuccess").delay(3000).fadeOut('slow');
  //           $('#formPelamar').trigger("reset");
  //           $("html, body").animate({ scrollTop: 0 }, "slow");
  //           $('#refrensi').attr('name', 'refrensi');
  //           $('#myInput').remove();
  //           $('#modalSuccess').modal('show');
  //           $('#modalPelamar').modal('hide');
  //           $("#loader").hide();
  //        }
  //     });
  //   // } else {

  //   //   console.log("Error Cuy");
  //   // }

  //   return false;

  //   });
// AJAX


// Validation Image
    // $('#fotoUpload').change(function(){
    //    var fuData = document.getElementById('fotoUpload');
    //    var FileUploadPath = fuData.value;

      
    //    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
    //       $("#finish").removeClass("disabled");
    //       $(".error-notif-foto").removeClass("has-error");
    //       $(".error-notif-foto").removeClass("display");
    //    } else {
    //       $('#finish').addClass('disabled');
    //       $(".error-notif-foto").addClass("has-error");
    //       $(".error-notif-foto").addClass("display");
    //    }
    // })

    //  $('#ijazahUpload').change(function(){
    //    var fuData = document.getElementById('ijazahUpload');
    //    var FileUploadPath = fuData.value;

      
    //    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
    //       $("#finish").removeClass("disabled");
    //       $(".error-notif-ijazah").removeClass("has-error");
    //       $(".error-notif-ijazah").removeClass("display");
    //    } else {
    //       $('#finish').addClass('disabled');
    //       $(".error-notif-ijazah").addClass("has-error");
    //       $(".error-notif-ijazah").addClass("display");
    //    }
    // })

    //  $('#ktpUpload').change(function(){
    //    var fuData = document.getElementById('ktpUpload');
    //    var FileUploadPath = fuData.value;

      
    //    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
    //       $("#finish").removeClass("disabled");
    //       $(".error-notif-ktp").removeClass("has-error");
    //       $(".error-notif-ktp").removeClass("display");
    //    } else {
    //       $('#finish').addClass('disabled');
    //       $(".error-notif-ktp").addClass("has-error");
    //       $(".error-notif-ktp").addClass("display");
    //    }
    // })
 // Validation Image

  $('#refrensi').change(function(){
      if( $(this).val() == '1'){
          $('#refrensi').removeAttr('name');
          $('.ghost-ref').append('<input class="form-control" id="myInput" type="text" name="refrensi" required/>');
      }else{
        $('#refrensi').attr('name', 'refrensi');
          $('#myInput').remove();
      }
  });

   $('#posisiPelamar').change(function(){
      if( $(this).val() == '1'){
          $('#posisiPelamar').removeAttr('name');
          $('.field-position').append('<input class="form-control" id="pLamar" type="text" name="posisi" required/>');
      }else{
        $('#posisiPelamar').attr('name', 'posisi');
          $('#pLamar').remove();
      }
  });
$("#loader").hide();
$("#tanggal_lahir").dateDropdowns({
  minAge: 18
});

$('.day, .month, .year').attr('required','').addClass('form-control col-md-3 display-inline');
$('.month').addClass('form-control col-md-4 display-inline');

	$('#idCard').change(function() {
      var idcard = $("#idCard").val();
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'query.php',
          data :  'idcard='+ idcard,
          success : function(data){
          	// // $('.fetched-data').html(data);//menampilkan data ke dalam modal
          	 if(data == "OK"){
          	 	$('#idCard').css("border", "1px solid #ced4da");
          	 	$('#btnFirst').removeClass('disabled');
          	 	$('.error-ktp').removeClass("display");     	
          	 } else {
          	 	alert("No KTP anda sudah digunakan");
          	 	$('#btnFirst').addClass('disabled');
          		$('#idCard').css("border", "1px solid red");
          		$('.error-ktp').addClass("display");
          		$(".display-text.ktpid").text("*No KTP anda sudah terdaftar");
          	 }
          	 console.log(data);	
          }
      });
  });

});
</script>