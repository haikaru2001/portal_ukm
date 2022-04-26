<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UKM | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>UKM</b> Management System</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIM" name="nim">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php // jika submit button diklik
  if(isset($_POST['btnLogin'])){
	require_once('class/class.User.php'); 		
	$objAccount = new User(); 
	
  $objAccount->nim = $_POST['nim'];
	$objAccount->password = $_POST['password'];

	$ceknim = $objAccount->Validate($_POST['nim']);
    if($ceknim){
		if($objAccount->nim == $_POST['nim'] && $objAccount->password == $_POST['password']){
			if (!isset($_SESSION)) {
				session_start();
			}		  
		
			$_SESSION["nim"]= $objAccount->nim;
			$_SESSION["idpembeli"]= $objAccount->idpembeli;
			$_SESSION["id_role"]= $objAccount->idrole;
			$_SESSION["nama"]= $objAccount->nama;
			
			echo "<script> alert('Login sukses'); </script>";		
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		}
		else{
			echo "<script> alert('Email dan password tidak match'); </script>";		
		}		
	}
	else{
		echo "<script> alert('Email tidak terdaftar'); </script>";		  
	}
	
  }
?>
