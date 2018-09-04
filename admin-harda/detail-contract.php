<?php 
  include "auth.php";
?>
<!DOCTYPE html>
<html>
  <?php 
    ob_start();
    include "library-css.php";
  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    include "library-header.php";
    include "library-sidebar.php";
    $session_name = $_SESSION['nama_lengkap']
  ?>

   <?php
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
          // $alamat_domisili = $data['alamat_domisili'];
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
          // $jadwal_disarankan = $data['jadwal_disarankan'];
          $post_date = $data['post_date'];
          $komentar = $data['komentar'];
          $status_pelamar = $data['status_pelamar'];
          $posisi_rekomendasi = $data['posisi_rekomendasi'];
          $rekomendasi = $posisi_rekomendasi ?: $posisi;
          $berat_badan = $data['berat_badan'];
          $tinggi_badan = $data['tinggi_badan'];
          $interview = $data['interview'] ?: '<b>Belum Interview</b>';
          $copy_cv = $data['copy_cv'];
          $nama_pelamar = $data['nama_pelamar'];
          $nama_lowongan_pelamar = $data['nama_lowongan'];
          $client_distributor = $data['client_distributor'];
          $status_join = $data['status_join'];
          $alamat_ktp = $data['alamat_ktp'];
          $no_wa = $data['no_wa'];
          $feedback = $data['feedback'];
          $tanggal_join = $data['tanggal_join'];
          $tanggal_resign = $data['tanggal_resign'];
          $perusahaan = $data['perusahaan'];
          $kontrak_kerja = $row['kontrak_kerja'] ?: '-';
        }
      }

        $noImage = "../image/no-image.jpg";

        $timestamp = strtotime($post_date);
        $newDate = date('j-F-Y', $timestamp);

        $timestamp1 = strtotime($tanggal_lahir);
        $newDate1 = date('j-F-Y', $timestamp1);  

        $no_wa = $no_wa ?: "-";

        $ndata = preg_replace("/\,/", "<br/>", $pengalaman_kerja); 

        $supported_image = array('gif','jpg','jpeg','png'); 
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title info-user">Data Contract</h3>
              <div class="col-md-12">
                  <div class="col-md-6">
                    <img class="img-logo" src="img/hera-black.png">
                  </div>
                  <div class="col-md-6">
                    <?php 
                      $orientation = 1;
                      if (function_exists('exif_read_data')) {
                          $exif = @exif_read_data($foto);
                          if (isset($exif['Orientation']))
                              $orientation = $exif['Orientation'];
                      } else if (preg_match('@\x12\x01\x03\x00\x01\x00\x00\x00(.)\x00\x00\x00@', file_get_contents($foto), $matches)) {
                          $orientation = ord($matches[1]);
                      }
                        $imageFoto = $foto ?: $noImage;  
                    
                        $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
                        if (in_array($ext, $supported_image)){
                    ?>
                      <img class="img-user-height" data-val="<?php echo $imageFoto ?>" id="photo" src="<?php echo $imageFoto; ?>">
                    
                    <?php } else { ?>
                      
                      <img class="img-user-height" data-val="<?php echo $noImage ?>" id="photo" src="<?php echo $noImage; ?>">
                      <div class="caption-img font-bold">File Bukan Image</div>
                    
                    <?php } ?>

                  </div>
              </div>
              <div class="col-md-12 mg-bottom">
                <?php
                  
            
                  if ($status_pelamar == "DISARANKAN") {
                        echo '<span class="label label-success">Disarankan</span>';
                    } elseif ($status_pelamar == "REJECTED"){
                        echo '<span class="label label-danger">Rejected</span>';
                    } else {
                        echo '<span class="label label-info">Belum disarankan</span>';
                    }
                ?>
              </div>
              
                <div class="col-md-6 pad-label">
                    <span class="label-user">Posisi</span>
                    <span class="field-user"><?php echo $posisi; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Referensi</span>
                    <span class="field-user"><?php echo $refrensi; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Nama Lengkap</span>
                    <span class="field-user"><?php echo $nama_lengkap ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Warga Negara</span>
                    <span class="field-user"><?php echo $warga_negara; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Tempat Lahir</span>
                    <span class="field-user"><?php echo $tempat_lahir; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Tanggal Lahir</span>
                    <span class="field-user"><?php echo $newDate1; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Agama</span>
                    <span class="field-user"><?php echo $agama; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Jenis Kelamin</span>
                    <span class="field-user"><?php echo $jenis_kelamin; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">No KTP</span>
                    <span class="field-user"><?php echo $no_ktp; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">No SIM</span>
                    <span class="field-user"><?php echo $no_sim; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Status Sipil</span>
                    <span class="field-user"><?php echo $status_sipil; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Alamat Email</span>
                    <span class="field-user"><?php echo $alamat_email; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Alamat Sekarang</span>
                    <span class="field-user"><?php echo $alamat_sekarang; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Alamat KTP</span>
                    <span class="field-user"><?php echo $alamat_ktp; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Tinggi/Berat</span>
                    <span class="field-user"><?php echo $tinggi_badan; ?>/<?php echo $berat_badan; ?></span>
                </div>
                <div class="col-md-6">
                    <span class="label-user">No Handphone</span>
                    <span class="field-user"><?php echo $no_handphone; ?></span>
                </div>
                <div class="col-md-6">
                    <span class="label-user">No Wa</span>
                    <span class="field-user"><?php echo $no_wa; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">No Telepon</span>
                    <span class="field-user"><?php echo $telepon; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Pendidikan Terakhir</span>
                    <span class="field-user"><?php echo $pendidikan_terakhir; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Kemampuan Dimiliki</span>
                    <span class="field-user"><?php echo $kemampuan_komputer; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Bahasa Asing</span>
                    <span class="field-user"><?php echo $bahasa_asing; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Riwayat Penyakit</span>
                    <span class="field-user"><?php echo $riwayat_penyakit; ?></span>
                </div>
                <div class="col-md-6 pad-label">
                    <span class="label-user">Pengalaman Kerja</span>
                    <span class="field-user"><?php echo $ndata; ?></span>
                </div>
              
             
            </div>
            <div class="col-md-12 text-center">
              <div class="col-md-6">
                  <?php 
                    $orientation2 = 1;
                    if (function_exists('exif_read_data')) {
                        $exif = @exif_read_data($foto);
                        if (isset($exif['Orientation']))
                            $orientation2 = $exif['Orientation'];
                    } else if (preg_match('@\x12\x01\x03\x00\x01\x00\x00\x00(.)\x00\x00\x00@', file_get_contents($ktp), $matches)) {
                        $orientation2 = ord($matches[1]);
                    }
                    $imageKtp = $ktp ?: $noImage;

                    // $supported_image = array('gif','jpg','jpeg','png');
                    $extKtp = strtolower(pathinfo($ktp, PATHINFO_EXTENSION));
                    if (in_array($extKtp, $supported_image)){  
                  
                  ?>
                  
                  <img class="img-user-width" id="ktp" data-val="<?php echo $imageKtp; ?>" src="<?php echo $imageKtp; ?>">
                  
                  <?php } else { ?>

                  <img class="img-user-width" id="ktp" data-val="<?php echo $noImage; ?>" src="<?php echo $noImage; ?>">
                  <div class="font-bold">File Bukan Image</div>
                  
                  <?php } ?>
              </div>
              <div class="col-md-6">
                  <?php 
                    $orientation3 = 1;
                    if (function_exists('exif_read_data')) {
                        $exif = @exif_read_data($foto);
                        if (isset($exif['Orientation']))
                            $orientation3 = $exif['Orientation'];
                    } else if (preg_match('@\x12\x01\x03\x00\x01\x00\x00\x00(.)\x00\x00\x00@', file_get_contents($ijazah), $matches)) {
                        $orientation3 = ord($matches[1]);
                    }
                    $imageIjazah = $ijazah ?: $noImage;

                    $extIjazah = strtolower(pathinfo($ijazah, PATHINFO_EXTENSION));
                    if (in_array($extIjazah, $supported_image)){ 
                  ?>

                  <img class="img-user-width" id="ijazah" data-val="<?php echo $imageIjazah; ?>" src="<?php echo $imageIjazah; ?>">
                  
                  <?php } else { ?>

                  <img class="img-user-width" id="ijazah" data-val="<?php echo $noImage; ?>" src="<?php echo $noImage; ?>">
                  <div class="font-bold">File Bukan Image</div>

                  <?php } ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form method="POST" action="" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  
                  <div class="col-md-6 form-group">
                      <label>Kontrak Kerja</label>
                      <input type="text" class="form-control" value="<?= $kontrak_kerja; ?>">  
                  </div>

                  <div class="col-md-6 form-group mg20">
                      <input type="submit" class="btn btn-primary" value="Simpan Kontrak"> 
                  </div>

              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="">PT Harda Esa Raksa</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<?php
  include "library-js.php";
?>

<script>
 
  if ($("#photo").attr('data-val') == 8) {
    $('#photo').css({'transform': 'rotate(-90deg)'});
  } else if($("#photo").attr('data-val') == 3){
    $('#photo').css({'transform': 'rotate(-180deg)'});
  }

  if($("#ktp").attr('data-val') == 3){
    $('#ktp').css({'transform': 'rotate(-180deg)'});
  } else if ($("#ktp").attr('data-val') == 6) {
    $('#ktp').css({'transform': 'rotate(-180deg)'});
  }

  if($("#ijazah").attr('data-val') == 3){
    $('#ijazah').css({'transform': 'rotate(-180deg)'});
  } else if ($("#ijazah").attr('data-val') == 6) {
    $('#ijazah').css({'transform': 'rotate(-180deg)'});
  }

  $("#dateContract").datepicker({ 
    format: 'yyyy-mm-dd',
    autoclose: true
  });

</script>


</body>
</html>
<?php 

// ============================= Function Rotate Image ====================================
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




if (isset($_POST['simpan_foto'])) {
  if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $type = $_FILES['foto']['type'];
    $fileinfo=PATHINFO($_FILES["foto"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    if (!$foto==""){  
      unlink($foto);
      move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/" . $newFilename);
      $location="../upload/" . $newFilename;
      correctImageOrientationFoto($location);
    }

    $query = mysqli_query($db, "UPDATE recruitment SET foto = '$location' WHERE id = '$id'");   

    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    }


  }
}


if (isset($_POST['simpan_ktp'])) {
  if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $type = $_FILES['ktp']['type'];
    $fileinfo=PATHINFO($_FILES["ktp"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    if (!$ktp==""){  
      unlink($ktp);
      move_uploaded_file($_FILES["ktp"]["tmp_name"],"../upload/" . $newFilename);
      $location="../upload/" . $newFilename;
    }

    $query = mysqli_query($db, "UPDATE recruitment SET ktp = '$location' WHERE id = '$id'");   

    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    }


  }
}


if (isset($_POST['simpan_ijazah'])) {
  if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $type = $_FILES['ijazah']['type'];
    $fileinfo=PATHINFO($_FILES["ijazah"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    if (!$ijazah==""){  
      unlink($ijazah);
      move_uploaded_file($_FILES["ijazah"]["tmp_name"],"../upload/" . $newFilename);
      $location="../upload/" . $newFilename;
    }

    $query = mysqli_query($db, "UPDATE recruitment SET ijazah = '$location' WHERE id = '$id'");   

    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    }


  }
}


if (isset($_POST['simpan'])) {
  if (isset($_POST['id'])) {
    $id             = $_POST['id'];
    $komentar       = $_POST['komentar'];
    $status_pelamar = $_POST['status_pelamar'];
    $posisi_rekomendasi = strtoupper($_POST['posisi_rekomendasi']);
    $refrensi = strtoupper($_POST['refrensi']);
    $interview = strtoupper($_POST['interview']);

    // perintah query untuk mengubah data 
    $query = mysqli_query($db, "UPDATE recruitment SET komentar = '$komentar',
                            status_pelamar  = '$status_pelamar',
                            posisi_rekomendasi = '$posisi_rekomendasi',
                            refrensi = '$refrensi',
                            interview = '$interview'
                            WHERE id        = '$id'");   

    // cek query
    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    } 
  }
} 


if (isset($_POST['update_tgl'])) {
   if (isset($_POST['id'])) {
    $id             = $_POST['id'];
    $komentar       = $_POST['komentar'];
    $status_pelamar = $_POST['status_pelamar'];
    $posisi_rekomendasi = strtoupper($_POST['posisi_rekomendasi']);
    $refrensi = strtoupper($_POST['refrensi']);
    $interview = strtoupper($_POST['interview']);

    // perintah query untuk mengubah data 
    $query = mysqli_query($db, "UPDATE recruitment SET komentar = '$komentar',
                            status_pelamar  = '$status_pelamar',
                            posisi_rekomendasi = '$posisi_rekomendasi',
                            refrensi = '$refrensi',
                            interview = '$interview',
                            post_date = NOW()
                            WHERE id        = '$id'");   

    // cek query
    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    } 
  }
}


if (isset($_POST['update_join'])) {
   if (isset($_POST['id'])) {
    $id             = $_POST['id'];
    $tanggal_join   = $_POST['tanggal_join'];
    $feedback = $_POST['feedback'];
    $perusahaan = $_POST['perusahaan'];
  
    // perintah query untuk mengubah data 
    $query = mysqli_query($db, "UPDATE recruitment SET tanggal_join = '$tanggal_join', feedback = '$feedback', perusahaan = '$perusahaan' WHERE id = '$id'");   

    // cek query
    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    } 
  }
}


if (isset($_POST['update_resign'])) {
   if (isset($_POST['id'])) {
    $id             = $_POST['id'];
    $tanggal_resign = $_POST['tanggal_resign'];
    $feedback = $_POST['feedback'];
    $perusahaan = $_POST['perusahaan'];
  
    // perintah query untuk mengubah data 
    $query = mysqli_query($db, "UPDATE recruitment SET tanggal_resign = '$tanggal_resign', feedback = '$feedback', perusahaan = '$perusahaan' WHERE id = '$id'");   

    // cek query
    if ($query) {
      // jika berhasil tampilkan pesan berhasil update data
      header('Location: '.$_SERVER['REQUEST_URI']);
      // echo "Berhasil";
    } else {
      // jika gagal tampilkan pesan kesalahan
      // header('location: index.php?alert=1');
      echo "Gagal";
    } 
  }
}

?>