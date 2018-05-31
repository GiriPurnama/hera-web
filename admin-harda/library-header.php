  <?php 
     include "../modal.php";
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          <?php  
            $pendaftar_baru = mysqli_query($db, "SELECT * FROM recruitment WHERE status_pelamar = 'pelamar-baru'");
            $jum_pendaftar = mysqli_num_rows($pendaftar_baru);
          ?>
          <li class="dropdown notifications-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $jum_pendaftar ?></span>
            </a> -->

            <!-- <ul class="dropdown-menu">
              <li class="header">Kau Mempunyai <?php echo $jum_pendaftar ?> Notifikasi</li>
              <li>
                
                <ul class="menu">
                  <li>
                      <span class="no-notif">Belum ada pendaftar Baru</span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Lihat Semua</a></li>
            </ul> -->
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            $idlogin = $_SESSION['id_admin'];
            $query_login = mysqli_query($db, "SELECT * FROM login WHERE id_admin = '$idlogin'");
            while ($row = mysqli_fetch_assoc($query_login)) {
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= $row['img_divisi']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $row['nama_lengkap'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= $row['img_divisi']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $row['nama_lengkap']; ?> - <?= $row['divisi']; ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                  <?php echo "<a href='edit-profile.php?id_admin=$row[id_admin]' class='btn btn-default btn-flat'>Profile</a>" ?>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>