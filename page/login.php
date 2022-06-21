<?php 
require('../inc.koneksi.php');
require_once('../class/class.User.php');
// $user = new User();
// $user->email = 'adm.ukmms165@gmail.com';
// $user->id = 'admin1';
// $user->name = 'udin';
// $password = 'admin123';
// $user->password = password_hash($password, PASSWORD_DEFAULT);
// $user->id_role = 5;
// $user->sex = 'L';
// $user->telp = '9817233';
// $user->AddUser();
// $user->changePassword();

// if($user->hasil){
//   echo "<script> alert('Registrasi berhasil'); </script>";
// }
if(isset($_POST['btnLogin'])){
    
	$email = $_POST['email'];
	$password = $_POST['password'];	

  $objUser = new User(); 
	$objUser->hasil = true;
	$objUser->Validate($email);
		
	if($objUser->hasil){

    if(password_verify($password, $objUser->password)){
			if (!isset($_SESSION)) {
				session_start();
			}		  			
      $objUser->loginUser();
			$_SESSION["userid"]= $objUser->id;
			$_SESSION["id_ukm"]= $objUser->id_ukm;
      $_SESSION["nama_ukm"]= $objUser->ukm;
			$_SESSION["id_role"]= $objUser->id_role;
      $_SESSION["nama_role"]= $objUser->role;
			$_SESSION["name"]= $objUser->name;
			$_SESSION["email"]= $objUser->email;
      
			
				
			if(isset($_SESSION["id_role"])){		
        if($_SESSION["id_role"] == 1)
          echo '<script>window.location = "../dashboard-admin.php";</script>';
        else if($_SESSION["id_role"] == 2 ||$_SESSION["id_role"] == 3)
          echo '<script>window.location = "../dashboard-ketua.php";</script>';
        else if($_SESSION["id_role"] == 4)
          echo '<script>window.location = "../dashboard-bendahara.php";</script>';
        else if($_SESSION["id_role"] == 5)
          echo '<script>window.location = "../dashboard-anggota.php";</script>';
      }	
		}
		else{
			echo "<script>alert('Password tidak match');</script>";					
		}
	}
	else{
		echo "<script>alert('Email tidak terdaftar');</script>";							
	} 	
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UKM | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Sweetalert -->
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
          <input type="text" class="form-control" placeholder="NIM or Email" name="email">
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
            <button type="submit" class="btn btn-primary btn-block" name="btnLogin" onclick="">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
