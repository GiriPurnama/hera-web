<?php 
    include '../config/koneksi.php';

    $username = $_POST['username'];
    $pass     = md5($_POST['password']);

    $login = mysqli_query($db, "SELECT * FROM login WHERE username = '$username' AND password='$pass'");
    $row   = mysqli_fetch_array($login);
    if ($row['username'] == $username AND $row['password'] == $pass)
    {
      session_start();
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
      $_SESSION['divisi'] = $row['divisi'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['id_admin'] = $row['id_admin'];
      $_SESSION['img_divisi'] = $row['img_divisi'];
      $_SESSION['branch'] = $row['branch'];
      header('location:dashboard.php');
    }
    else
    {
      // echo "gagal";
      echo ("<script LANGUAGE='JavaScript'>window.alert('Username atau Password Salah'); window.location.href='index.php'</script>");
      // header('location:index.php'); 
    }
?>