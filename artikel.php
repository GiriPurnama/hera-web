<?php 
    include "config/koneksi.php";
    include "config/indo_tgl.php";
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
        $newDate = tgl_indo(date('Y-m-d', $timestamp));   
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";    
    }
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <title>PT Harda Esa Raksa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta property="og:title" content="<?= $judul_artikel; ?>" />
  <meta property="og:description" content="<?= strip_tags($cut_str, '<p><a>'); ?>" />
  <meta property="og:url" content="<?= $actual_link; ?>" />
  <meta property="og:image" content="<?= $str_artikel; ?>" />

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
        <h1><a href="../">PT Harda Esa Raksa</a></h1>
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

        <div class="col-md-12">
          <div class="media-social">
            <h5>Share Artikel</h5>
            <div class="icon-medsos">
              <a href="javascript:void(0);"><span class="twitter-share" title="twitter"  data-js="twitter-share"><i class="fa fa-twitter-square"></i></span></a>
              <a href="javascript:void(0);"><span class="facebook-share" title="facebook" data-js="facebook-share"><i class="fa fa-facebook-square"></i></span></a>
              <a href="javascript:void(0);"><span class="linkedin-share" title="linkedin" data-js="linkedin-share"><i class="fa fa-linkedin-square"></i></span></a>
            </div>
          </div>
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
             <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=100011113153945" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/loker_jkt/" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/pt-harda-esa-raksa/" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
          </div>

            <div class="col-lg-8 col-md-6 footer-contact">
              <h4>Contact Us & Maps</h4>
              <!-- <div id="info-contact-footer" class="row contact-info owl-carousel owl-theme"> -->

                <?php 
                  $branch_footer = mysqli_query($db, "SELECT * FROM kontak");
                  while ($row = mysqli_fetch_assoc($branch_footer)) {
                    $wilayah = $row['wilayah'];
                    $alamat = $row['alamat'];
                    $telepon = $row['telepon'];
                    $email = $row['email'];
                    $maps = $row['maps'];
                ?>
                  <div class="row"> 
                    <div class="col-md-6 desc-contact">
                      <div class="title-footer"><?= $wilayah; ?></div>
                      <p>
                        <?= $alamat; ?><br>
                        <strong>Phone:</strong> <?= $telepon; ?><br>
                        <strong>Email:</strong> <?= $email; ?><br>
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
  <script type="text/javascript">
    
    var url = document.URL;

    var twitterShare = document.querySelector('[data-js="twitter-share"]');

    twitterShare.onclick = function(e) {
      e.preventDefault();
      var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
      if(twitterWindow.focus) { twitterWindow.focus(); }
        return false;
      }

    var facebookShare = document.querySelector('[data-js="facebook-share"]');

    facebookShare.onclick = function(e) {
      e.preventDefault();
      var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
      if(facebookWindow.focus) { facebookWindow.focus(); }
        return false;
    }

    var linkedinkShare = document.querySelector('[data-js="linkedin-share"]');
    
    linkedinkShare.onclick = function(e) {
      e.preventDefault();
      var linkedinWindow = window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(url), '', 'left=0,top=0,width=650,height=420,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
      if(linkedinWindow.focus) { linkedinWindow.focus(); }
        return false;
    }

  </script>
  <?php 
    }
  ?>