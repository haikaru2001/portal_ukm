<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form method="get">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="sendmail" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php
      include('../class/class.User.php');
      include('../class/class.Mail.php');
        if(isset($_GET['sendmail'])){
            $objUser = new User();
            $objUser->SelectUserByMail($_GET['email']);
            $message =  file_get_contents('../templateemail.html');  					 
			$header = "Recovery Password";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Kepada <b>' .$objUser->name.'</b>, anda telah melakukan recovery password pada sistem UKM Management System online ESQ Business School.<br>
					Berikut ini link untuk merubah password account anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #57697e; style:bold">
						<a href="localhost/UKM-MS/dashboard-admin.php?page=recovery-password.php">Link reset password</a>
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
					 						
			
			Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);	
			echo "<script> alert('Registrasi berhasil'); </script>";
        }
      
      ?>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
