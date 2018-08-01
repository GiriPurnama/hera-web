<?php
session_start();
include "../config/koneksi.php";
$cabang = $_SESSION['branch'];
$nama_lengkap = $_SESSION['nama_lengkap']; 

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=pelamar-exportxls-".date("d-m-Y").".xls");
 
// memanggil query dari database
// $refrensi = $_GET['refrensi'];                     
  $sqlshow = mysqli_query($db, "SELECT * FROM recruitment");
  // $nameSql = mysqli_query($db, "SELECT refrensi, MONTHNAME(post_date) AS month, MONTH(post_date) AS tahun_minggu, COUNT(*) AS jumlah FROM recruitment GROUP BY tahun_minggu, refrensi");
  // $nameSql = mysqli_query($db, "SELECT refrensi, MONTHNAME(post_date) AS month, YEARWEEK(post_date) AS tahun_minggu, COUNT(*) AS jumlah FROM recruitment GROUP BY refrensi");
  // $nameSql = mysqli_query($db, "SELECT refrensi, COUNT(*) as jumlah FROM recruitment GROUP BY refrensi");
  $nameSql = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, refrensi, posisi_rekomendasi, komentar, pengalaman_kerja, nama_lengkap, posisi FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now()  GROUP BY refrensi, posisi");
  $countPosisi = mysqli_query($db, "SELECT WEEK(post_date) AS minggu, count(*) AS jumlah, refrensi, posisi, posisi_rekomendasi FROM recruitment WHERE post_date between date_sub(now(),INTERVAL 1 WEEK) and now()  GROUP BY posisi ORDER BY refrensi ASC")
  // $jum_pendaftar = mysqli_num_rows($sqlshow);
  // $jum_individu  = mysqli_num_rows($nameSql); 
        
?>     
         
    <table>
        <tr>
          <td><h3>Data Pelamar</h3></td>
        </tr>
        <tr>
          <td width="0px"><b>Tanggal :</b> <?php echo date("d-m-Y") ?></td>
        </tr>
    </table>    
        <table border="1">  
          <thead bgcolor="eeeeee" align="center">
            <tr bgcolor="eeeeee" >
             <th>No</ths>
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
        $minggu = $rowshow['minggu'];
        $komentar = strip_tags($rowshow['komentar'], '<p><a>');
        $pengalaman_kerja = preg_replace("/\,/", "<br/>", $pengalaman);    

          echo '<tr>';
            echo '<td>'.$nomor.'</td>';
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
          <td width="0px"><b>Tanggal :</b> <?php echo date("d-m-Y") ?></td>
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