<?php 
include "config/koneksi.php"; 
// SELECT WEEK(post_date) week, refrensi, COUNT(*) as jumlah, CONCAT(DATE_FORMAT(DATE_ADD(post_date, INTERVAL(1-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e'), ' TO ', DATE_FORMAT(DATE_ADD(post_date, INTERVAL(7-DAYOFWEEK(post_date)) DAY),'%Y-%m-%e')) AS DateRange FROM recruitment WHERE branch = 'Jakarta' GROUP BY YEARWEEK(post_date), refrensi
  if($_POST['idcard']) {
     
     $no_ktp=$_POST['idcard'];

     $checkdata=mysqli_query($db, "SELECT no_ktp FROM recruitment WHERE no_ktp='$no_ktp'");

     if(mysqli_num_rows($checkdata)>0)
     {
      echo "User Name Already Exist";
     }
     else
     {
      echo "OK";
     }
  }
?>