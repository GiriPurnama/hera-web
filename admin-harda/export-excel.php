<?php
 
include "../config/koneksi.php";

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=pelamar-exportxls-".date("d-m-Y").".xls");
 
// memanggil query dari database
// $refrensi = $_GET['refrensi'];                     
  $sqlshow = mysqli_query($db, "SELECT * FROM recruitment");
  $nameSql = mysqli_query($db, "SELECT refrensi, MONTHNAME(post_date) AS month, YEARWEEK(post_date) AS tahun_minggu, COUNT(*) AS jumlah FROM recruitment GROUP BY refrensi");
  // $nameSql = mysqli_query($db, "SELECT refrensi, COUNT(*) as jumlah FROM recruitment GROUP BY refrensi");
  $jum_pendaftar = mysqli_num_rows($sqlshow);
  $jum_individu  = mysqli_num_rows($nameSql); 
        
?>     
    <h3>Data Pelamar</h3>
      
    <table>
        <tr>
          <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>   
        </tr>
    </table>    
        <table border="1">  
          <thead bgcolor="eeeeee" align="center">
            <tr bgcolor="eeeeee" >
             <th>No</ths>
             <th>Posisi</th>
             <th>Refrensi</th>
             <th>Interviewer</th>
             <th>Nama Lengkap</th>
             <th>Warga Negara</th>
             <th>Tempat Lahir</th>
             <th>Tanggal Lahir</th>
             <th>Agama</th>
             <th>Jenis Kelamin</th>
             <th>No KTP</th>
             <th>No SIM</th>
             <th>Status Sipil</th>
             <th>Alamat Email</th>
             <th>Alamat Sekarang</th>
             <th>No Handphone</th>
             <th>Telepon</th>
             <th>Pendidikan Terakhir</th>
             <th>Kemampuan Komputer</th>
             <th>Bahasa Asing</th>
             <th>Riwayat Penyakit</th>
             <th>Pengalaman Kerja</th>
             <!-- <th>Lama Pengalaman</th> -->
             <th>Komentar</th>
             <th>Status Pengalaman</th>
            </tr>
          </thead>
          <tbody>            
   
   <?php
        
      $nomor=1;
      while($rowshow = mysqli_fetch_assoc($sqlshow)){                     
        $posisi_rekomendasi = $rowshow['posisi_rekomendasi'];
        $posisi = $rowshow['posisi']; 
        $posisi_rekomendasi = $posisi_rekomendasi ?: $posisi;
        $komentar = strip_tags($rowshow['komentar'], '<p><a>');  

          echo '<tr>';
            echo '<td>'.$nomor.'</td>';
            echo '<td>'.$posisi_rekomendasi.'</td>';
            echo '<td>'.$rowshow['refrensi'].'</td>';
            echo '<td>'.$rowshow['interview'].'</td>';
            echo '<td>'.$rowshow['nama_lengkap'].'</td>';
            echo '<td>'.$rowshow['warga_negara'].'</td>';
            echo '<td>'.$rowshow['tempat_lahir'].'</td>';
            echo '<td>'.$rowshow['tanggal_lahir'].'</td>';
            echo '<td>'.$rowshow['agama'].'</td>';
            echo '<td>'.$rowshow['jenis_kelamin'].'</td>';
            echo '<td>'.$rowshow['no_ktp'].'</td>';
            echo '<td>'.$rowshow['no_sim'].'</td>';
            echo '<td>'.$rowshow['status_sipil'].'</td>';
            echo '<td>'.$rowshow['alamat_email'].'</td>';
            echo '<td>'.$rowshow['alamat_sekarang'].'</td>';
            echo '<td>'.$rowshow['no_handphone'].'</td>';
            echo '<td>'.$rowshow['telepon'].'</td>';
            echo '<td>'.$rowshow['pendidikan_terakhir'].'</td>';
            echo '<td>'.$rowshow['kemampuan_komputer'].'</td>';
            echo '<td>'.$rowshow['bahasa_asing'].'</td>';
            echo '<td>'.$rowshow['riwayat_penyakit'].'</td>';
            echo '<td>'.$rowshow['pengalaman_kerja'].'</td>';
            // echo '<td>'.$rowshow['lama_pengalaman'].'</td>';
            echo '<td>'.$komentar.'</td>';
            echo '<td>'.$rowshow['status_pelamar'].'</td>';
          echo '</tr>';
          $nomor++;
      }

          echo "<tr>";
            echo "<td><b>Referensi</b></td>";
            // echo "<td><b>Tahun Minggu</b></td>";
            echo "<td><b>Bulan</b></td>";
            echo "<td><b>Jumlah</b></td>";
          echo "</tr>";
          while($rowname = mysqli_fetch_assoc($nameSql)){          
            echo '<tr>';
              echo '<td>'.$rowname['refrensi'].'</td>';
              // echo '<td>'.$rowname['tahun_minggu'].'</td>';
              echo '<td>'.$rowname['month'].'</td>';
              echo '<td>'.$rowname['jumlah'].'</td>';
            echo '</tr>';                       
          }
   ?>
  </tbody>
  </table>   