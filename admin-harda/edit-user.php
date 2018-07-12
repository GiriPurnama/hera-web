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
          $interview = $data['interview'];
          $copy_cv = $data['copy_cv'];
          $nama_pelamar = $data['nama_pelamar'];
          $nama_lowongan_pelamar = $data['nama_lowongan'];
          $client_distributor = $data['client_distributor'];
          $status_join = $data['status_join'];
        }
      }

        $noImage = "../image/no-image.jpg";

        $timestamp = strtotime($post_date);
        $newDate = date('j-F-Y', $timestamp);

        $timestamp1 = strtotime($tanggal_lahir);
        $newDate1 = date('j-F-Y', $timestamp1);  

        $ndata = preg_replace("/\,/", "<br/>", $pengalaman_kerja);  
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
              <h3 class="box-title info-user">Data Pelamar</h3>
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
                    ?>
                    <img class="img-user-height" data-val="<?php echo $imageFoto ?>" id="photo" src="<?php echo $imageFoto; ?>">
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
                    <span class="label-user">Tinggi/Berat</span>
                    <span class="field-user"><?php echo $tinggi_badan; ?>/<?php echo $berat_badan; ?></span>
                </div>
                <div class="col-md-6">
                    <span class="label-user">No Handphone</span>
                    <span class="field-user"><?php echo $no_handphone; ?></span>
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
                <div class="col-md-6 pad-label">
                    <span class="label-user">Tanggal Post</span>
                    <span class="field-user"><?php echo $newDate; ?></span>
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
                  ?>
                  <img class="img-user-width" id="ktp" data-val="<?php echo $imageKtp; ?>" src="<?php echo $imageKtp; ?>">
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
                  ?>
                  <img class="img-user-width" id="ijazah" data-val="<?php echo $imageIjazah; ?>" src="<?php echo $imageIjazah; ?>">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-header">
               <h3 class="box-title">Komentar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-12">
                      <textarea id="editor1" name="komentar" rows="10" cols="80" placeholder="Komentar Anda">
                        <?php echo $komentar; ?>
                      </textarea>
                    </div>
                    <div class="col-md-6 form-group mg20">
                      <label>Status</label>
                      <select class="form-control" name="status_pelamar">
                        <option value="">-</option>
                        <option <?php if ($status_pelamar == "DISARANKAN" ) echo 'selected' ; ?> value="DISARANKAN">Disarankan</option>
                        <option <?php if ($status_pelamar == "REJECTED" ) echo 'selected' ; ?> value="REJECTED">Rejected</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-group mg20">
                      <label>Posisi Disarankan</label>
                      <select class="form-control" name="posisi_rekomendasi" required>
                        <option <?php if ($posisi_rekomendasi == "" ) echo 'selected' ; ?> value="">-</option>

                        <?PHP 
                          if ($posisi_rekomendasi != "") { ?>
                           
                            <option selected value="<?= $posisi_rekomendasi; ?>"><?= $posisi_rekomendasi; ?></option>
                         
                          <?php } ?>

                        <?php 
                            $lowongan = mysqli_query($db, "SELECT * FROM info_lowongan where status='aktif'");
                            while ($row = mysqli_fetch_assoc($lowongan)) {
                            $nama_lowongan = $row['nama_lowongan'];
                        ?>
                        
                        <option value="<?= $nama_lowongan; ?>" > <?= $nama_lowongan; ?> </option>

                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-md-6 form-group mg20">
                      <label>Interviewer</label>
                      <input type="text" class="form-control" name="interview" value="<?= $session_name; ?>" readonly>
                    </div>
                <div class="form-group col-md-12">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" id="send" value="Simpan">
                  <input type="submit" class="btn btn-warning btn-submit" name="export-pdf" id="pdf" value="Export PDF" href="javascript:void(0);" onclick="window.open('export-pdf.php?id=<?php echo $id; ?>')">
                  <?PHP if ($copy_cv != "") 
                        {  
                  ?>
                    <a href="<?= $copy_cv; ?>" class="btn btn-success">Download</a>
                  <?PHP } ?>
                </div>
              </form>

              <div class="box-upload">
                <h3>UPLOAD DOKUMEN</h3>
                <span class="noted">*<b>CATATAN ISI</b> Jika pelamar salah upload atau belum upload image silahkan upload disni</span>
                <div class="col-md-6">
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group mg20">
                      <label for="foto">Upload Foto</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="file" accept="image/*" class="form-control" id="foto" name="foto" required>
                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary btn-submit" name="simpan_foto"  value="Upload Foto">
                    </div>
                  </form>
                </div>

                <div class="col-md-6">
                   <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group mg20">
                      <label for="ktp">Upload KTP</label>
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="file" accept="image/*" class="form-control" id="ktp" name="ktp" required>
                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary btn-submit" name="simpan_ktp" value="Upload KTP">
                    </div>
                  </form>
                </div>

                <div class="col-md-6">
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group mg20">
                      <label for="ijazah">Upload Ijazah</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="file" accept="image/*" class="form-control" id="ijazah" name="ijazah" required>
                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary btn-submit" name="simpan_ijazah"  value="Upload Ijazah">
                    </div>
                  </form>
                </div>
              </div>

              <div class="box-distribution">
                <h3 class="font-bold">DISTRIBUSIKAN PELAMAR</h3>
                <div class="row">
                  <form method="POST" action="server.php" enctype="multipart/form-data" >
                   <div class="col-md-2">
                        <div class="form-group">
                          <label>Nama Pelamar</label>
                          <input type="hidden" name="id" value="<?= $id; ?>">
                          <input type="text" class="form-control add-pelamar" name="nama_pelamar[]" value="<?= $nama_lengkap; ?>" readonly>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Lowongan</label>
                          <input type="text" class="form-control add-lowongan" name="nama_lowongan[]" value="<?= $rekomendasi; ?>" readonly>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Client</label>
                          <select id="template-client" class="form-control add-client" name="client_distributor[]" required>
                            <?php 
                                 $info_client = mysqli_query($db, "SELECT * FROM menu_client");
                                  while ($row = mysqli_fetch_assoc($info_client)) {
                                  $nama_client = $row['title_client'];
                            ?>
                            
                            <option value="<?= $nama_client; ?>"><?= $nama_client; ?></option>
                            
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Status Pelamar</label>
                          <input type="text" value="Dikirim" class="form-control add-status" name="status_join[]" readonly>
                        </div>
                      </div>

                     <div class="col-md-2">
                        <div class="btn-pelamar">
                          <div class="form-group">
                           <button class="btn btn-default add-btn"><i class="fa fa-plus"></i> Tambah</button>    
                          </div>
                        </div>
                     </div>

                    <div class="wrapper-input">
                      <div class="col-md-2 form-group append-nama"></div>
                      <div class="col-md-3 form-group append-lowongan"></div>
                      <div class="col-md-3 form-group append-client"></div>
                      <div class="col-md-2 form-group append-status"></div>
                    </div> 
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Kirim Pelamar" name="kirim_pelamar">    
                      </div>
                    </div>

                  </form>

                  <?php 
                    $data_nama = preg_replace("/\,/", "<br/>", $nama_pelamar);
                    $data_lowongan = preg_replace("/\,/", "<br/>", $nama_lowongan_pelamar);
                    $data_client = preg_replace("/\,/", "<br/>", $client_distributor);
                    $data_status = preg_replace("/\,/", "<br/>", $status_join);
                  ?>

              <!-- ============= Khusus RO ===============================================================================-->

                  <?php
                  if ($status == "RO" || $status == "InternalHRD" || $status == "Chief" || $status == "Master") {
                  
                    if ($nama_pelamar != "" && $nama_lowongan_pelamar != "" && $client_distributor != "" && $status_join != "") { ?>
                    
                  <div class="display-data">
                      <h3 class="font-bold" style="width: 100%; display: -webkit-box; padding: 10px 15px;">Data Terkirim</h3>
                        <div class="col-md-3">
                          <?php
                           $array_nama = explode(",",$nama_pelamar);     
                           foreach ($array_nama as $key_nama => $value_nama) { ?>

                            <div><?= $value_nama; ?></div>

                          <?php } ?>
                        </div>


                        <div class="col-md-3">
                          <?php
                           $array_lowongan = explode(",",$nama_lowongan_pelamar);     
                           foreach ($array_lowongan as $key_lowongan => $value_lowongan) { ?>

                            <div><?= $value_lowongan; ?></div>

                          <?php } ?>
                        </div>
                       

                        <div class="col-md-3">
                          <?php
                           $array_client = explode(",",$client_distributor);     
                           foreach ($array_client as $key_client => $value_client) { ?>

                            <div><?= $value_client; ?></div>

                          <?php } ?>
                        </div>
                        

                        <?php
                         $array_status = explode(",",$status_join);
                         foreach ($array_status as $key => $value) { ?>

                          <div class="col-md-3">
                              <div><?= $value; ?></div>
                          </div>

                         <?php } ?>
                  </div>

                    <?php }} ?>
              <!-- ============= Khusus RO ===============================================================================-->

                </div>
              </div>

          <!--======================= Khusus RND ============================================================-->

             <?php if ($status == "RnD" || $status == "EksternalHRD" || $status == "Chief" || $status == "Master") { 
                      if ($nama_pelamar != "" && $nama_lowongan_pelamar != "" && $client_distributor != "" && $status_join != "") { 
              ?>
             
              <div class="box-reference">
                <h3 class="font-bold">Data Pelamar Referensi</h3>
                 <div class="col-md-3">

                    <?php
                     $array_nama = explode(",",$nama_pelamar);     
                     foreach ($array_nama as $key_nama => $value_nama) { ?>

                      <div><?= $value_nama; ?></div>

                    <?php } ?>
                  </div>


                  <div class="col-md-3">
                    <?php
                     $array_lowongan = explode(",",$nama_lowongan_pelamar);     
                     foreach ($array_lowongan as $key_lowongan => $value_lowongan) { ?>

                      <div><?= $value_lowongan; ?></div>

                    <?php } ?>
                  </div>
                 

                  <div class="col-md-3">
                    <?php
                     $array_client = explode(",",$client_distributor);     
                     foreach ($array_client as $key_client => $value_client) { ?>

                      <div><?= $value_client; ?></div>

                    <?php } ?>
                  </div>
                  
                  <form method="POST" action="server.php" enctype="multipart/form-data">
                  <?php
                   $array_status = explode(",",$status_join);
                   $numItems =  count($array_status);
                   $i = 0;

                   foreach ($array_status as $key => $value) { 
                      if(++$i === $numItems) {
                   ?>

                    <div class="col-md-3 end-select">
                        <select class="hide" data-val="<?= $key; ?>" name="status_join[]">
                          <option value="<?= $value; ?>"><?= $value; ?></option>
                        </select>
                    </div>
                   
                    <?php } else { ?>
                    
                    <div class="col-md-3 end-select">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <select   data-val="<?= $key; ?>" name="status_join[]">
                          <option value="<?= $value; ?>"><?= $value; ?></option>
                          <option value="Ditolak">Ditolak</option>
                          <option value="Diterima">Diterima</option>
                        </select>
                      
                    </div>

                   <?php  }} ?>

                   <div class="col-md-12">
                      <input type="submit" class="btn btn-primary" name="update_pelamar" value="Kirim Data">
                   </div>

                  </form>
              </div>
             <?php }} ?>
          <!--======================= Khusus RND ============================================================-->

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

<script>
  $(document).ready(function() {
      var max_fields      = 10; //maximum input boxes allowed
      var add_pelamar     = $(".add-pelamar"); //Fields wrapper
      var add_lowongan    = $(".add-lowongan");
      var add_client      = $(".add-client");
      var add_status      = $(".add-status");  
      var add_button      = $(".add-btn"); //Add button ID
      var wrapper         = $(".wrapper-input");
      
      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              // $(wrapper).append('<div class="col-md-2"><div class="form-group"><input type="text" class="form-control" name="nama_pelamar" value="<?= $nama_lengkap; ?>" readonly></div></div>');
              // $(wrapper).append('<div class="col-md-3"><div class="form-group"><input type="text" class="form-control" name="nama_lowongan" value="<?= $rekomendasi; ?>" readonly></div></div>'); //add input box
              $(add_pelamar).clone().appendTo(".append-nama").addClass("remove-field");
              $(add_lowongan).clone().appendTo(".append-lowongan").addClass("remove-field");
              // $(add_)
              $(add_client).clone().appendTo(".append-client").addClass("remove-field");
              $(add_status).clone().appendTo(".append-status").addClass("remove-field");
              // $(wrapper).append('<div class="col-md-4"><div class="form-group"><select class="form-control add-status" name="status_join"><option value="">-</option><option value="Dikirim">Dikirim</option><option value="Ditolak">Ditolak</option><option value="Diterima">Diterima</option></select></div></div>'); //add input box
              // $(add_status).clone().insertAfter('.clone-after-status');
          }
      });
      
      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  })

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

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

</script>

<?php
  include "library-js.php";
?>
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
    $interview = strtoupper($_POST['interview']);

    // perintah query untuk mengubah data pada tabel is_siswa
    $query = mysqli_query($db, "UPDATE recruitment SET komentar = '$komentar',
                            status_pelamar  = '$status_pelamar',
                            posisi_rekomendasi = '$posisi_rekomendasi',
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
?>