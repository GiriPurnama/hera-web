<?php
session_start();
include "../config/koneksi.php";
include "../config/indo_tgl.php";
$cabang = $_SESSION['branch'];
$nama_lengkap = $_SESSION['nama_lengkap'];

if (isset($_POST['export_excel'])) {

    $start_date = $_POST['start_date'];
    $tgl_mulai = strtotime($start_date);
    $tgl_mulai = tgl_indo(date('Y-m-d', $tgl_mulai));   

    $end_date  = $_POST['end_date'];
    $tgl_akhir = strtotime($end_date);
    $tgl_akhir = tgl_indo(date('Y-m-d', $tgl_akhir));   

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=pelamar-exportxls-".date("d-m-Y").".xls");
 
// memanggil query dari database
// $refrensi = $_GET['refrensi'];                     
  // $sqlshow = mysqli_query($db, "SELECT * FROM recruitment");
  // $nameSql = mysqli_query($db, "SELECT refrensi, MONTHNAME(post_date) AS month, MONTH(post_date) AS tahun_minggu, COUNT(*) AS jumlah FROM recruitment GROUP BY tahun_minggu, refrensi");
  // $nameSql = mysqli_query($db, "SELECT refrensi, MONTHNAME(post_date) AS month, YEARWEEK(post_date) AS tahun_minggu, COUNT(*) AS jumlah FROM recruitment GROUP BY refrensi");
  // $nameSql = mysqli_query($db, "SELECT refrensi, COUNT(*) as jumlah FROM recruitment GROUP BY refrensi");
  // $jum_pendaftar = mysqli_num_rows($sqlshow);
  // $jum_individu  = mysqli_num_rows($nameSql);

  // ============================================= SQL Lama ============================================================
    // $nameSql = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, refrensi, posisi_rekomendasi, komentar, pengalaman_kerja, nama_lengkap, posisi, post_date, CONCAT(DATE_FORMAT(DATE_ADD(post_date, INTERVAL(1-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e'), ' - ', DATE_FORMAT(DATE_ADD(post_date, INTERVAL(7-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e')) AS DateRange FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now() and (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') GROUP BY post_date, posisi");
    // $nameSql1 = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, post_date, CONCAT(DATE_FORMAT(DATE_ADD(post_date, INTERVAL(1-DAYOFWEEK(post_date)) DAY),'%e-%m-%Y'), ' s/d ', DATE_FORMAT(DATE_ADD(post_date, INTERVAL(7-DAYOFWEEK(post_date)) DAY),'%e-%m-%Y')) AS DateRange FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now()");

    // $countPosisi = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, count(*) AS jumlah, refrensi, posisi, posisi_rekomendasi, CONCAT(DATE_FORMAT(DATE_ADD(post_date, INTERVAL(1-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e'), ' - ', DATE_FORMAT(DATE_ADD(post_date, INTERVAL(7-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e')) AS DateRange FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now() and (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED')  GROUP BY posisi ORDER BY refrensi ASC");
    // $countJml = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, count(*) AS jumlah, refrensi, CONCAT(DATE_FORMAT(DATE_ADD(post_date, INTERVAL(1-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e'), ' - ', DATE_FORMAT(DATE_ADD(post_date, INTERVAL(7-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e')) AS DateRange FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now() and (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') GROUP BY refrensi ORDER BY refrensi ASC");
  // ============================================= SQL Lama ============================================================

  $nameSql = mysqli_query($db, "SELECT refrensi, posisi_rekomendasi, komentar, pengalaman_kerja, nama_lengkap, posisi, post_date FROM recruitment WHERE post_date BETWEEN '$start_date' AND '$end_date' AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') Group BY post_date, posisi ORDER BY post_date");
  $countPosisi = mysqli_query($db, "SELECT count(*) AS jumlah, refrensi, posisi, posisi_rekomendasi FROM recruitment WHERE post_date BETWEEN '$start_date' AND '$end_date' AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') GROUP BY posisi ORDER BY refrensi ASC"); 
  $countJml = mysqli_query($db, "SELECT count(*) AS jumlah, post_date, refrensi FROM recruitment WHERE post_date BETWEEN '$start_date' AND '$end_date' AND (status_pelamar = 'DISARANKAN' OR status_pelamar = 'REJECTED') GROUP BY refrensi ORDER BY refrensi ASC");      
?>     
         
    <table>
        <tr>
          <td><h3>Data Pelamar</h3></td>
        </tr>
        <tr>
          <td width="0px"><b>Periode Tanggal :</b> <?= $tgl_mulai; ?> - <?= $tgl_akhir; ?></td>
        </tr>
    </table>    
        <table border="1">  
          <thead bgcolor="eeeeee" align="center">
            <tr bgcolor="eeeeee" >
             <th>No</th>
             <th>Tanggal</th>
             <th>Referensi</th>
             <th>Nama Lengkap</th>
             <th>Posisi</th>
            </tr>
          </thead>
          <tbody>            
   
   <?php
        
      $nomor=1;
      while($rowshow = mysqli_fetch_assoc($nameSql)){                     
        $posisi_rekomendasi = $rowshow['posisi_rekomendasi'];
        $posisi = $rowshow['posisi'];
        $refrensi = $rowshow['refrensi'];
        $nama_pelamar = $rowshow['nama_lengkap']; 
        $posisi_rekomendasi = $posisi_rekomendasi ?: $posisi;
        $pengalaman = $rowshow['pengalaman_kerja'];
        // $minggu = $rowshow['minggu'];
        $komentar = strip_tags($rowshow['komentar'], '<p><a>');
        $pengalaman_kerja = preg_replace("/\,/", "<br/>", $pengalaman);
        
        $post_date = $rowshow['post_date'];
        $post_date = strtotime($post_date);
        $post_date = tgl_indo(date('Y-m-d', $post_date));  


          echo '<tr>';
            echo '<td>'.$nomor.'</td>';
            echo '<td>'.$post_date.'</td>';
            echo '<td>'.$refrensi.'</td>';
            echo '<td>'.$nama_pelamar.'</td>';
            echo '<td>'.$posisi_rekomendasi.'</td>';
          echo '</tr>';
          $nomor++;
      }


   ?>
  </tbody>
  </table>


    
  <table>
      <tr>
        <td><h3>Total Posisi</h3></td>
      </tr>
      <tr>
        <td width="0px"><b>Periode Tanggal :</b> <?= $tgl_mulai; ?> - <?= $tgl_akhir; ?></td>
      </tr>
  </table>    
  <table border="1">  
    <thead bgcolor="eeeeee" align="center">
      <tr bgcolor="eeeeee" >
       <th>No</ths>
       <th>Referensi</th>
       <th>Posisi</th>
       <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>            
   
   <?php
        
      $nomor=1;
      while($rowshow = mysqli_fetch_assoc($countPosisi)){                     
        $posisi = $rowshow['posisi'];
        $refrensi = $rowshow['refrensi'];
        $posisi_rekomendasi = $posisi_rekomendasi ?: $posisi;
        $jumlah = $rowshow['jumlah'];
       

          echo '<tr>';
            echo '<td>'.$nomor.'</td>';
            echo '<td>'.$refrensi.'</td>';
            echo '<td>'.$posisi.'</td>';
            echo '<td>'.$jumlah.'</td>';
          echo '</tr>';
          $nomor++;
      }


   ?>
    </tbody>
  </table>


  <table>
        <tr>
          <td><h3>Total Jumlah</h3></td>
        </tr>
        <tr>
           <td width="0px"><b>Periode Tanggal :</b><?= $tgl_mulai; ?> - <?= $tgl_akhir; ?></td>
        </tr>
    </table>    
        <table border="1">  
          <thead bgcolor="eeeeee" align="center">
            <tr bgcolor="eeeeee" >
             <th>No</ths>
             <th>Referensi</th>
             <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>            
   
   <?php
        
      $nomor=1;
      while($rowshow = mysqli_fetch_assoc($countJml)){                     
        $refrensi = $rowshow['refrensi'];
        $posisi_rekomendasi = $posisi_rekomendasi ?: $posisi;
        $jumlah = $rowshow['jumlah'];
       

          echo '<tr>';
            echo '<td>'.$nomor.'</td>';
            echo '<td>'.$refrensi.'</td>';
            echo '<td>'.$jumlah.'</td>';
          echo '</tr>';
          $nomor++;
      }


   ?>
  </tbody>
  </table>

  <?php } ?>            