<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	require_once "../config/koneksi.php";


	function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[random_int(0, $max)];
	    }
	    return implode('', $pieces);
	}

	//if (isset($_POST['simpan'])) {
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
		$no_handphone = strtoupper($_POST['no_handphone']);
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

		$type = $_FILES['foto']['type'];
		$fileinfo=PATHINFO($_FILES["foto"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/" . $newFilename);
		$location="../upload/" . $newFilename;

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
															no_handphone,
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
															kuliah,
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
																	'$no_handphone',
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
																	'$kuliah',
																	 NOW())");
		if ($query) {
			// jika berhasil tampilkan pesan berhasil insert data
			// header('location: index.php?alert=2');
			// echo "berhasil";
			header('location: ../inforegistrasi.php?alert=2');
		} else {
			// jika gagal tampilkan pesan kesalahan
			// header('location: index.php?alert=1');
			// echo "gagal";
			header('location: ../inforegistrasi.php?alert=1');
		}	
	//}
?>