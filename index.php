<?php 
   include "config/koneksi.php";
   include "config/indo_tgl.php";
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <title>PT Harda Esa Raksa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta property="og:title" content="PT Harda Esa Raksa" />
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

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">PT Harda Esa Raksa</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Beranda</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#career">Karir</a></li>
          <li><a href="#client">Klien</a></li>
          <li><a href="#testimonial">Testimoni</a></li>
          <li><a href="#team">Tim</a></li>
          <li><a href="#service">Servis</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <!-- <li class="menu-has-children"><a href="">Gallery</a>
            <ul>
              <li><a href="#">Foto</a></li>
              <li><a href="#">Video</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <?php
            $no = 1;
            $mini_id = mysqli_query($db, "SELECT min(idhome) as idkecil FROM menu_home");
            while ($rowmenu = mysqli_fetch_assoc($mini_id)) {
              $min_id = $rowmenu['idkecil'];
            }

            $home = mysqli_query($db, "SELECT * FROM menu_home");
            // $home = mysqli_query($db, "SELECT min(idhome) as idkecil FROM menu_home");
            while ($row = mysqli_fetch_assoc($home)) {
            // $idhome = $row['idhome'];
            $title_image = $row['title_img'];
            $deksripsi_image = $row['desc_img'];
            $image_home = $row['image_home'];
            $item_class = ($no == 1) ? 'active' : '';
            $str_home = str_replace("../", "", $image_home);   
          ?>
          <div class="carousel-item <?= $item_class; ?> ">
            <div class="carousel-background"><img src="<?= $str_home; ?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?= $title_image; ?></h2>
                <p><?= $deksripsi_image; ?></p>
                <!-- <a href="#featured-services" class="btn-get-started scrollto">Get Started</a> -->
              </div>
            </div>
          </div>
          <?php $no++; } ?>        

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <section id="featured-services">
      <div class="container">
       <header class="section-header">
         <h3 style="color:#FFF;padding-top:20px;">Artikel</h3>
       </header>
        <div class="row">
          <div id="artikel" class="owl-carousel owl-theme artikel">
            <?php 
              $artikel_row = mysqli_query($db, "SELECT * FROM artikel ORDER BY idartikel DESC");
               while ($row = mysqli_fetch_assoc($artikel_row)) {
                  $judul_artikel = $row['judul_artikel'];
                  $idartikel = $row['idartikel'];
                  $isi_artikel = strip_tags($row['isi_artikel'], '<p><a><li><ol>');
                  $foto_artikel = $row['foto_artikel'];
                  $str_artikel = str_replace("../", "", $foto_artikel);
                  $cut_str = substr($isi_artikel,0,300). '...';
                  $artikel_date = $row['post_date'];
                  $timestamp = strtotime($artikel_date);
                  $newDate = tgl_indo(date('Y-m-d', $timestamp));   
               ?>
                <div class="box">
                  <span class="date-text pull-right"><?= $newDate; ?></span>
                  <div class="box-img">
                    <img class="size-box-img" src="<?= $str_artikel; ?>">
                  </div>
                  <h4 class="title"><a href='artikel-<?php echo $row['idartikel']; ?>-<?php echo $row['permalink_artikel']; ?>.html' data-val="<?php echo $row['idartikel']; ?>" ><?= $judul_artikel; ?></a></h4>
                  <p class="description"><?= $cut_str; ?></p>
                </div>
               <?php } ?>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Tentang Kami</h3>
          <p>Harda Esa Raksa berdiri sejak tahun 1987 dimulai dari usaha perdagangan alat-alat telekomunikasi dan barang cetak, hingga berawal pada tahun 2007, Harda Esa Raksa mengembangkan bisnis dalam hal penyaluran dan penempatan tenaga kerja.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-3 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/tangan.jpg" alt="" class="img-fluid size-box-img">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#" data-toggle="modal" data-target="#modalVisi">Visi Misi</a></h2>
             <br>
            </div>
          </div>

          <div class="col-md-3 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/biografi.jpg" alt="" class="img-fluid size-box-img">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#" data-toggle="modal" data-target="#modalBiografi">Biografi</a></h2>
              <br>
            </div>
          </div>

          <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/landscape.jpg" alt="" class="img-fluid size-box-img">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#" data-toggle="modal" data-target="#modalStruktur">Struktur Organisasi</a></h2>
              <br>
            </div>
          </div>

          <div class="col-md-3 wow fadeInUp" data-wow-delay="0.3s">
            <div class="about-col">
              <div class="img">
                <img src="img/sambutan.jpg" alt="" class="img-fluid size-box-img">
                <div class="icon"><i class="ion-ios-bookmarks"></i></div>
              </div>
              <h2 class="title"><a href="#" data-toggle="modal" data-target="#modalSambutan">Sambutan Direktur</a></h2>
              <br>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="career">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Info Lowongan</h3>
        </header>

         <div id="info-jobs" class="row owl-carousel owl-theme">
            <?php 
              $loker = mysqli_query($db, "SELECT * FROM info_lowongan WHERE status='aktif'");
              while ($row = mysqli_fetch_assoc($loker)) {
                $kota = $row['wilayah'];
                $nama_lowongan = $row['nama_lowongan'];
                $desc_lowongan = strip_tags($row['desc_lowongan'], '<p><a><li><ol>');
                $cut_lowongan = substr($desc_lowongan,0,200). '...';
                $idlowongan = $row['idlowongan']
            ?>

            <div class="item">
              <div class="box-info">
                <div class="info-text">
                  <h3 class="font-bold"><?= $nama_lowongan; ?></h3>
                  <h4><?= $kota; ?></h4>
                  <p><?= $cut_lowongan; ?></p>
                </div>
                <div class="text-center">
                  <a href='#modalInfoLowongan' data-toggle='modal' data-id="<?= $idlowongan; ?>" class="btn-get-started">Selengkapnya</a>  
                </div>
              </div>
            </div>

            <?php } ?>
        </div>

        <header class="section-header wow fadeInUp">
          <p>Pilih Karir sesuai dengan minat dan keterampilan anda.</p>
        </header>

        <div class="row">

          <div class="col-lg-12 col-md-12 box wow bounceInUp" data-wow-duration="1.4s">
            <img class="img-responsive" src="img/flow.png">
             <a href="recruitment.hera" class="btn-get-started scrollto">Lamar Pekerjaan</a>  
          </div>
          

        </div>

      </div>
    </section>
    <!-- #services -->

    <!--==========================
      Portfolio Section
      ============================-->
    <!-- #portfolio -->

    <section id="client" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Klien Kami</h3>
        </header>

        <div class="owl-carousel  owl-theme clients-carousel">
          <?php 
              $client = mysqli_query($db, "SELECT * FROM menu_client");
              while ($row = mysqli_fetch_assoc($client)) {
                $nama_client = $row['title_client'];
                $img_client = $row['img_client'];
                $str_client = str_replace("../", "", $img_client);   
          ?>
          <div class="item text-center pad-10">
            <img src="<?= $str_client; ?>" alt="">
            <!-- <div class="title-client"><h5><?= $nama_client; ?></h5></div> -->
          </div>

          <?php } ?>
        </div>

      </div>
    </section>

    <!-- #clients -->

     <!--==========================
      Portfolio Section
      ============================-->
    <!-- #portfolio -->

    <section id="testimonial" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimoni</h3>
        </header>

        <div id="testimonial-service" class="owl-carousel owl-theme">
          <?php 
              $testimonial = mysqli_query($db, "SELECT * FROM testimonial");
              while ($row = mysqli_fetch_assoc($testimonial)) {
                $nama_testimonial = $row['nama_testimonial'];
                $isi_testimonial = $row['isi_testimonial'];
                $status = $row['status'];
                $foto_testimonial = $row['foto_testimonial'];
                $str_testimonial = str_replace("../", "", $foto_testimonial);

                if($status == "Pelamar"){
                  $status = "Karyawan Eksternal";
                }
                   
          ?>
              <div class="item text-center pad-10">
                <img class="size-img" src="<?= $str_testimonial; ?>" alt="">
                <div class="title-text"><h4><?= $nama_testimonial; ?></h4></div>
                <div class="status-text"><h5><?= $status; ?></h5></div>
                <div class="content-text"><p>"<?= $isi_testimonial; ?>"</p></div>
              </div>

          <?php } ?>
        </div>

      </div>
    </section> <!-- #clients -->


    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>TIM</h3>
          <p>PT Harda Esa Raksa</p>
        </div>

        <div class="row">
          <div id="team-carousel" class="owl-carousel owl-theme">
            <?php 
               $team = mysqli_query($db, "SELECT * FROM login ORDER BY tanggal_join ASC");
               while ($row = mysqli_fetch_assoc($team)) {
               $img_divisi = $row['img_divisi'];
               $nama_lengkap = $row['nama_lengkap'];
               $divisi = $row['divisi'];
               $url_facebook = $row['facebook'];
               $url_linkedin = $row['linkedin'];
               $url_twitter = $row['twitter'];
               $biografi = $row['biografi'];
               $izin_bio = $row['izin_bio'];
               $id_admin = $row['id_admin'];
               $str_divisi = str_replace("../", "", $img_divisi);   
               
            ?>
            <div class="item wow fadeInUp" data-wow-delay="0.1s">
              <div class="member">
                <img src="<?= $str_divisi; ?>" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4><?= $nama_lengkap; ?></h4>
                    <span><?= $divisi; ?></span>
                    <div class="social">
                       <?php
                        if ($biografi != "" && $izin_bio == "Ya" ) { ?>  
                            <a href='#modalBiografiDiri' data-toggle='modal' data-id="<?= $id_admin; ?>"><i class="fa fa-eye"></i></a>
                        <?php } ?>

                        <?php 
                        if ($url_twitter != "") { ?>  
                            <a href="<?= $url_twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <?php } ?>
                        
                        <?php if ($url_facebook != "") { ?> 
                            <a href="<?= $url_facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php } ?>

                        <?php if ($url_linkedin != "") { ?>
                          <a href="<?= $url_linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>

        </div>

      </div>
    </section><!-- #team -->


    <section class="service" id="service">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Konsep Kerja Sama</h3>
        </header>

        <div class="row">

          <div class="col-lg-12 col-md-12 box wow bounceInUp" data-wow-duration="1.4s">
            <!-- <div id="service-carousel" class="owl-carousel owl-theme"> -->
                <!-- <div class="item" data-dot="<div class='btn-owl'>Jenis Kerjasama</div>">
                  <div class="col-md-6 inline-block mg-top">
                    <ol type="A">
                      <li>Recruitment Office</li>
                      <ul type="square">
                        <li>Management Level</li>
                        <li>Back Office All Position</li>
                        <li>Spg /Spb</li>
                        <li>Sales</li>
                      </ul>
                      <li>Jasa  Penyedia dan Penempatan Tenaga Kerja </li>
                        <ul type="square">
                          <li>Back Office All Position</li>
                          <li>Sales</li>
                        </ul>
                    </ol>
                  </div>
                  <div class="col-md-6 float-right mg-top">
                    <img src="img/jabat.jpg">
                  </div>
                </div> -->

                <div class="margin-service-center">
                  <div class="col-md-12 text-center">
                    <img src="img/pat.jpg" class="img-size">
                  </div>
                  <div class="col-md-12 text-center">
                    <ul class="inline-ul">
                      <li>
                        <h3>Paying Agent</h3>
                        <div><label>(Jasa Payroll)</label></div> 
                      </li>
                      <li>
                        <h3>Recruitment Service</h3>
                        <div><label>(Rekrut, Maintenance & Payroll)</label></div>  
                      </li>
                      <li>
                        <h3>Head Hunter</h3> 
                        <div><label>(Jasa Rekrut)</label></div>
                      </li>
                    </ul>
                  </div>

                  <div class="col-md-12 text-center mg-top20">
                      <h4 class="font-bold" style="color:#000;">Prinsip Kami</h4>
                    <ul class="inline-ul">
                      <li>
                        <span class="btn-owl">Bekerja Sepenuh Hati</span> 
                      </li>
                      <li>
                        <span class="btn-owl">Pelayanan Terbaik</span>  
                      </li>
                      <li>
                        <span class="btn-owl">Perekrutan Maksimal</span> 
                      </li>
                      <li>
                        <span class="btn-owl">SDM Berkualitas</span> 
                      </li>
                    </ul>
                  </div>
                </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </section><!-- #services -->


     <section class="gallery" id="gallery">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Galeri</h3>
          <p>Kumpulan Foto dan Video PT Harda Esa Raksa</p>
        </header>

        <div class="row">

        <div class="col-md-12 text-center">
          <h4>Foto</h4>
        </div>

        <?php 
           $album = mysqli_query($db, "SELECT * FROM album WHERE status='Aktif'");
           while ($row = mysqli_fetch_assoc($album)) {
              $albumid = $row['albumid'];
              $nama_album = $row['nama_album'];
              $album_deskripsi = $row['album_deskripsi'];
              $album_date = $row['album_date'];
              $cover_album = $row['image'];
              $timestamp = strtotime($album_date);
              $newDate = date('j-F-Y', $timestamp);
              $ndata = str_replace("../", "", $cover_album);   
        ?>

        <div class="col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
          <div class="box-gallery">  
            <a href='#modalFoto' data-toggle='modal' data-id="<?= $albumid; ?>">
              <img src="<?= $ndata; ?>"> 
              <div class="title-gallery"><h3><?= $nama_album; ?></h3></div>
              <div class="desc-gallery"><?= $album_deskripsi; ?></div>
            </a>
          </div>
        </div>

        <?php } ?>
          
          <div class="col-md-12 text-center">
            <h4>Video</h4>
          </div>

          <?php 
            $video_link = mysqli_query($db, "SELECT * FROM galeri_video");
            while ($row = mysqli_fetch_assoc($video_link)) {
              $nama_video = $row['nama_video'];
              $video_deskripsi = $row['video_deskripsi'];
              $video_date = $row['date_video'];
              $video = $row['video'];
              $timestamp = strtotime($video_date);
              $newDate = date('j-F-Y', $timestamp); 
              $videoid = $row['videoid'];
              $img_video = $row['img_video'];
              $str_video = str_replace("../", "", $img_video);    
          ?>
          <div class="col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="box-gallery">  
              <a href='#modalVideoGaleri' data-toggle='modal' data-id="<?= $videoid; ?>">
                <div class="gallery-video"><img src="<?= $str_video; ?>"></div> 
                <div class="title-gallery"><h3><?= $nama_video; ?></h3></div>
                <div class="desc-gallery"><?= $video_deskripsi; ?></div>
              </a>
            </div>
          </div>

          <?php } ?>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg contact wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Kontak Kami</h3>
        </div>


        <div class="form">
          <div id="sendmessage">Pesan anda telah terikirim. Terimakasih</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:3" data-msg="Tolong Masukan nama minimal 3 karakter" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Tolong Masukan email yang valid" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subjek" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Tolong Masukan nama minimal 4 karakter" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="isi_pesan" rows="5" data-rule="required" data-msg="Tolong tuliskan isi pesan anda" placeholder="Pesan"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="contact">Kirim Pesan</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>PT Harda Esa Raksa</h3>
            <p>Harda Esa Raksa berdiri sejak tahun 1987 dimulai dari usaha perdagangan alat-alat telekomunikasi dan barang cetak, hingga berawal pada tahun 2007, Harda Esa Raksa mengembangkan bisnis dalam hal penyaluran dan penempatan tenaga kerja.</p>
            <div class="box-info-footer">
              <h3>Jam Kerja</h3>
              <p> Senin s/d Jumat : 08.00 - 17.00 WIB </p>
              <p>Sabtu & Minggu Libur</p>
            </div>
             <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=100011113153945" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/PtHardaEsaRaksa" class="linkedin" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/loker_jkt/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/pt-harda-esa-raksa/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.youtube.com/channel/UC5ndId8JDdoZsq5eyv8PnLw" class="linkedin" target="_blank"><i class="fa fa-youtube-play"></i></a>
              </div>
          </div>

            <div class="col-lg-8 col-md-6 footer-contact">
              <h4>Kontak & Lokasi</h4>
              <!-- <div id="info-contact-footer" class="row contact-info owl-carousel owl-theme"> -->

                <?php 
                  $branch_footer = mysqli_query($db, "SELECT * FROM kontak");
                  while ($row = mysqli_fetch_assoc($branch_footer)) {
                    $wilayah = $row['wilayah'];
                    $alamat = $row['alamat'];
                    $telepon = $row['telepon'];
                    $email = $row['email'];
                    $maps = $row['maps'];
                    $no_wa = $row['no_wa'];
                ?>
                  <div class="row"> 
                    <div class="col-md-6 desc-contact">
                      <div class="title-footer"><?= $wilayah; ?></div>
                      <p>
                        <?= $alamat; ?><br>
                        <strong>Telepon:</strong> <?= $telepon; ?><br>
                        <strong>Email:</strong> <?= $email; ?><br>
                        <?php if ($no_wa != "") { ?>
                        <a class="hold-link btn-owl" href="https://wa.me/<?= $no_wa; ?>" target = "_blank"><i class="fa fa-whatsapp"></i> Chat Kami</a><br>
                        <?php } ?> 
                      </p>

                    </div>

                    <div class="col-md-6 maps-contact">
                        <div class="title-footer"><?= $wilayah; ?></div>
                        <iframe src="<?= $maps; ?>" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen></iframe>
                    </div>
                  </div>

                  <br><br>
                 
                <?php } ?>

              <!-- </div> -->

            </div>


          </div>
        </div>
      </div>

        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong>PT Harda Esa Raksa</strong>. All Rights Reserved
          </div>
        </div>
      </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <?php 
    include "modal.php";
  ?>  
  <!-- JavaScript Libraries -->
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
  <script>
    $('#modalFoto').on('show.bs.modal', function (e) {
      var rowgaleri = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'admin-harda/update-form.php',
          data :  'rowgaleri='+ rowgaleri,
          success : function(data){
          $('.fetched-data-gallery').html(data);//menampilkan data ke dalam modal
          }
      });
    });

     $('#modalBiografiDiri').on('show.bs.modal', function (e) {
      var rowbio = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'admin-harda/update-form.php',
          data :  'rowbio='+ rowbio,
          success : function(data){
          $('.fetched-data-bio').html(data);//menampilkan data ke dalam modal
          }
      });
    });


    $('#modalVideoGaleri').on('show.bs.modal', function (e) {
      var videogaleri = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'admin-harda/update-form.php',
          data :  'videogaleri='+ videogaleri,
          success : function(data){
          $('.fetched-data-video').html(data);//menampilkan data ke dalam modal
          }
      });
    });

     $('#modalInfoLowongan').on('show.bs.modal', function (e) {
      var infolowongan = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'admin-harda/update-form.php',
          data :  'infolowongan='+ infolowongan,
          success : function(data){
            $('.fetched-data-lowongan').html(data);//menampilkan data ke dalam modal
          }
      });
    });

   $("#loader").hide();
   $("#tanggal_lahir").dateDropdowns({
      minAge: 18
   });
   
   $('.day, .month, .year').attr('required','').addClass('form-control col-md-3 display-inline');
   $('.month').addClass('form-control col-md-4 display-inline');
  </script>

<script type="text/javascript">
    $(document).ready(function(){

    $("#modalEmployee").modal();

    // Select and loop the container element of the elements you want to equalise
    $('#info-jobs').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      var highestBoxText = 0;
      
      // Select and loop the elements you want to equalise
      $('.box-info', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });

      $('.info-text', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBoxText) {
          highestBoxText = $(this).height(); 
        }
      });
     
      // Set the height of all those children to whichever was highest 
      $('.info-text',this).height(highestBoxText);
      $('.box-info',this).height(highestBox);
                    
    });



     $('#artikel').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      $('.box', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });
     
      // Set the height of all those children to whichever was highest 
      $('.box',this).height(highestBox);
                    
    });  

  });
</script>

</body>
</html>
