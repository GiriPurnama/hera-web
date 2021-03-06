<?php 
  include "auth.php";
?>
<!DOCTYPE html>
<html>
  <?php 
    include "library-css.php";
    $cabang = $_SESSION['branch'];
  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    include "library-header.php";
    include "library-sidebar.php";
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
          <div class="box pad10">
            <div class="box-header">
              <h3 class="box-title">Expired</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
            <span class="pad10"><b>* 3 Hari pelamar</b> tidak datang sistem akan membuat status expired secara Otomatis</span>
             <form method="POST" action="server.php">
              <input type="hidden" name="branch" value="<?= $cabang; ?>">
               <div class="btn-export-excel">
                  <input onclick="return confirm('Apakah yakin akan menghapus semua data ini?')" type="submit" class="btn btn-danger btn-submit" name="delete_all" value="Delete All">
               </div>
             </form>
              <table class="table table-bordered table-hover" id="table-user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Status Pelamar</th>
                  <th>Tanggal Post</th>
                  <th>Posisi</th>
                  <th>Posisi Disarankan</th>
                  <th>Referensi</th>
                  <th>Interviewer</th>
                  <th>Nama Lengkap</th>
                  <th>No Handphone</th>
                  <th>Tanggal Lahir</th>
                  <!-- <th>Agama</th> -->
                  <!-- <th>Jenis Kelamin</th> -->
                  <th>Pendidikan Terakhir</th>
                  <th>Pengalaman Kerja</th>
                 <!--  <th>Review</th> -->
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1;
                    $pelamar = mysqli_query($db, "SELECT * FROM recruitment WHERE  branch = '$cabang' AND status_pelamar = 'Expired'  ORDER BY id DESC");
                    // $hitungDulu = mysqli_num_rows($pelamar);
                    while ($row = mysqli_fetch_assoc($pelamar)) {

                    $posisi = $row['posisi'];

                    $rekomendasi = $row['posisi_rekomendasi'] ? : "-";

                    $rekomendasi_ro =  $rekomendasi ?: $posisi; 

                    $status_pelamar = $row['status_pelamar'];
                    
                    $pengalaman_kerja = $row['komentar'];

                    $oldDate = $row['post_date'];
                    $timestamp = strtotime($oldDate);
                    $newDate = date('j F Y', $timestamp); 

                    $cek_interview = $row['interview'] ? : "Belum Diinterview";

                    $ndata = preg_replace("/\,/", "<br/>", $pengalaman_kerja);

                    $review = $ndata ? : "-";

                    $tgl_lahir = $row['tanggal_lahir'];
                    $timestamplahir = strtotime($tgl_lahir);
                    $newDateLahir = date('j F Y', $timestamplahir);

                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td>
                      <?php 
                        if ($status_pelamar == "DISARANKAN") {
                            echo '<span class="label label-success">Disarankan</span>';
                        } elseif ($status_pelamar == "REJECTED"){
                            echo '<span class="label label-danger">Rejected</span>';
                        } elseif ($status_pelamar == "Expired"){
                            echo '<span class="label label-danger">Expired</span>';
                        } else {
                            echo '<span class="label label-info">Belum Interview</span>';
                        }
                      ?>
                  </td>
                  <td><?= $newDate; ?></td>
                  <td><?= $posisi; ?></td>
                  <td><?= $rekomendasi; ?></td>
                  <td><?= $row['refrensi']; ?></td>
                  <td><?= $cek_interview; ?></td>
                  <td><?= $row['nama_lengkap'];?></td>
                  <th><?= $row['no_handphone']; ?></th>
                  <td><?= $newDateLahir; ?></td>
                  <!-- <th><?php echo $row['agama']; ?></th> -->
                  <!-- <th><?php echo $row['jenis_kelamin']; ?></th> -->
                  <th><?= $row['pendidikan_terakhir']; ?></th>
                  <th><?= $row['pengalaman_kerja']; ?></th>
                  <!-- <th><?= $review; ?></th> -->
                  <td>
                    <?php echo "<a href='edit-user.php?id=$row[id]'><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                    
                    <?php if ($status == "RO" || $status == "InternalHRD" || $status == "Chief" || $status == "Master") { ?>
                    
                      <a href='server.php?idexpired=<?php echo $row['id']; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><span class='action-icon'><i class='fa fa-trash'></i></span></a>
                    
                    <?php } ?>
                  </td>
                </tr>

                <?php $no++; } ?>
              </tbody>
              </table>
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
  $.widget.bridge('uibutton', $.ui.button);
   $(function () {
   $('#table-user').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'columnDefs': [
          { "searchable": false, "targets": 9 },
          { "searchable": false, "targets": 8 },
          { "searchable": false, "targets": 9 },
          { "searchable": false, "targets": 11 },
          { "searchable": false, "targets": 12 }
        ]
    })
    // $('#example1').DataTable()
   
  })
</script>
<?php
  include "library-js.php";
?>
</body>
</html>
