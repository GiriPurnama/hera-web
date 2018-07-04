<?php 
   include "config/koneksi.php";
    if (isset($_GET['idartikel'])) {
      $idartikel = $_GET['idartikel'];
      
      $load_data = mysqli_query($db, "SELECT * FROM artikel WHERE idartikel='$idartikel'");
      while ($row = mysqli_fetch_assoc($load_data)) {
        $judul_artikel = $row['judul_artikel'];
        $idartikel = $row['idartikel'];
        $isi_artikel = $row['isi_artikel'];
        
        $foto_artikel = $row['foto_artikel'];
        $str_artikel = str_replace("../", "", $foto_artikel);
        
        $cut_str = substr($isi_artikel,0,300). '...';

        $artikel_date = $row['post_date'];
        $timestamp = strtotime($artikel_date);
        $newDate = date('j-F-Y', $timestamp);    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PT Harda Esa Raksa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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
    <header id="header" style="background: #000;">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.php">PT Harda Esa Raksa</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
    </div>
  </header><!-- #header -->
  <div class="container">
    <div class="row">
      <div class="box-article">
        
        <div class="col-md-12">
          <div class="img-article">
            <img class="img-fluid" src="<?= $str_artikel; ?>">
          </div>
        </div>
        
        <div class="col-md-12 mg-top20">
          <span class="time-article pull-right"><?= $newDate; ?></span>
          <h1 class="title-article"><?= $judul_artikel; ?></h1>
          <p class="description-article"><?= $isi_artikel; ?></p>
        </div>

      </div>
    </div>
  </div>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>PT Harda Esa Raksa</h3>
            <p>Harda Esa Raksa berdiri sejak tahun 1987 dimulai dari usaha perdagangan alat-alat telekomunikasi dan barang cetak, hingga berawal pada tahun 2007, Harda Esa Raksa mengembangkan bisnis dalam hal penyaluran dan penempatan tenaga kerja.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Gedung ILP Pancoran Lantai 3 No 15 <br>
              Jalan Raya Pasar Minggu No 39 A<br>
              Pancoran, Jakarta Selatan <br>
              <strong>Phone:</strong>021-7988154<br>
              <strong>Email:</strong> hera.harda@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Maps</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0731007715567!2d106.84034821419388!3d-6.254099562973233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b5914d1e3d%3A0xb8229d2ba8dca54c!2sPT+HARDA+ESA+RAKSA!5e0!3m2!1sid!2sid!4v1530517907589" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen></iframe>
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
</body>
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
  <?php 
    }
  ?>