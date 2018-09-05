<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  include "auth.php"; 
  include "../config/koneksi.php"
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
        Email Blast <b><?= $cabang; ?></b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Email Blast</li>
      </ol>
    </section>

    <?php 
    	$query_test = mysqli_query($db, "SELECT alamat_email FROM recruitment WHERE branch = '$cabang'");
    ?>

    <!-- Main content -->
    <section class="content">
	    	<?php
				if (isset($_POST['submit']) && $_POST['submit'] == 'SendEmail') {
				   
				  // Validasi Form
				  if($_POST['emailSubject'] == "") {
				    echo "<script language='javascript'>alert('Tolong isi Subjek Email.');
				      window.location = ''</script>";
				  } else if($_POST['emailText'] == "") {
				    echo "<script language='javascript'>alert('Tolong isi text email.');
				      window.location = ''</script>";
				  } else {
				 
				    // Kirim Email dalam format HTML
				    $emailSubject = $_POST['emailSubject'];
				    $emailText = $_POST['emailText'];
				  	require '../vendor/autoload.php';

						    $mail = new PHPMailer(true);                            
						    try {
						        //Server settings
						        $mail->IsHTML(true);
								$mail->CharSet = "text/html; charset=UTF-8;";
						        $mail->isSMTP();                                     
						        $mail->Host = 'mx1.hostinger.co.id';                      
						        $mail->SMTPAuth = true;                             
						        $mail->Username = 'recruitment@pthardaesaraksa.com';     
						        $mail->Password = 'heraharda123';             
						        $mail->SMTPOptions = array(
						            'ssl' => array(
						            'verify_peer' => false,
						            'verify_peer_name' => false,
						            'allow_self_signed' => true
						            )
						        );                         
						        $mail->SMTPSecure = 'ssl';                           
						        $mail->Port = 465;                                   

						        //Send Email
						        $mail->setFrom('recruitment@pthardaesaraksa.com');
						        
						        //Recipients
						        while ($row = mysqli_fetch_assoc($query_test)) {
							    	$emailblast = $row['alamat_email'];
							    	$mail->addAddress($emailblast);
							    	// echo $emailblast;
							        // $mail->AddCC($allusers);
								}
						        $mail->addReplyTo('recruitment@pthardaesaraksa.com');
						        
						        //Content
						        $mail->isHTML(true);                                  
						        $mail->Subject = $emailSubject;
						        $mail->Body    = $emailText;

						        $mail->send();
								echo ("<script LANGUAGE='JavaScript'>window.alert('Email Terkirim'); window.location.href='email-blast.php'</script>");
						    } catch (Exception $e) {
							   	echo ("<script LANGUAGE='JavaScript'>window.alert('Maaf tidak bisa kirim email'); window.location.href='email-blast.php'</script>");
						    }
				 
					  	}
					}
				?>

		    	<form action="" method="post">
		    		<div class="col-md-12">
		                <div class="form-group">
		                  <label for="subjek">Subjek</label>
		                  <input type="text" class="form-control" name="emailSubject" id="emailSubject" required/>
		                </div>
		    		</div> 
	                <div class="col-md-12">
		                <div class="form-group">
		                  <label for="deskripsi">Isi Pesan</label>
		                  <textarea class="form-control" name="emailText" id="emailText" rows="8" required></textarea>
		                </div>
	                </div>
	                <div class="col-md-12">
		                <div class="form-group">
		                	<button type="input" name="submit" value="SendEmail" class="btn btn-primary"><i class="icon-check"></i>Kirim Email</button>
			      		</div>
	                </div>
		      	</form>		
	    	
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
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('emailText');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

  $.widget.bridge('uibutton', $.ui.button);
</script>
<?php
  include "library-js.php";
?>
</body>
</html>



