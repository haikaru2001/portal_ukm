<?php
require('../inc.koneksi.php');
include('../class/class.User.php');
include('../class/class.Mail.php');

if(isset($_GET['add'])){
    $objUser = new User();
    $objUser->id = $_GET['nim'];
    $objUser->name = $_GET['nama_user'];
    $objUser->email = $_GET['email'];
    $password = $_GET['password'];
    $objUser->password = password_hash($password, PASSWORD_DEFAULT);
    $objUser->sex = $_GET['gender'];
    $objUser->id_ukm = $_GET['ukm'];
    $objUser->id_role = $_GET['role'];
    $objUser->notelp = $_GET['notelp'];
    $objUser->AddUser();
    $message =  file_get_contents('../templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah terdaftar pada sistem UKM Management System online ESQ Business School.<br>
					Berikut ini informasi account anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Username : '.$objUser->email.'<br>
						Password : '.$password.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
					 						
			
			Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);	
			echo "<script> alert('Registrasi berhasil'); </script>";
			echo "<script>window.location = '../dashboard-admin.php?page=list-user'</script>";
}

if(isset($_GET['update'])){
    if(!empty($_GET['nim'] && $_GET['nama_user'] && $_GET['email'] && $_GET['gender'] && $_GET['ukm'] && $_GET['role'] && $_GET['notelp'])){
        $objUser = new User();
        $objUser->id = $_GET['nim'];
        $objUser->name = $_GET['nama_user'];
        $objUser->email = $_GET['email'];
        $objUser->sex = $_GET['gender'];
        $objUser->id_ukm = $_GET['ukm'];
        $objUser->id_role = $_GET['role'];
        $objUser->notelp = $_GET['notelp'];
        $objUser->UpdateUser();
        echo "<script>window.location = '../dashboard-admin.php?page=list-user'</script>";
    }
    else{
        echo "<script>alert('harus diisi semua')</script>";
    }
    
}
if(isset($_GET['promote'])){
    $objUser = new User();
    $objUser->id = $_GET['nim'];
    $objUser->id_role = $_GET['role'];
    $objUser->PromoteUser();
    echo "<script>window.location = '../dashboard-ketua.php?page=list-user-k'</script>";
}
if(isset($_POST['changePassword'])){
    $objUser = new User();
    $objUser->id = $_POST['nim'];
    if(!empty($_POST['pass'] && $_POST['re_pass'])){
        if($_POST['pass'] == $_POST['re_pass']){
            $objUser->password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $objUser->changePassword();
            
            if($_POST['role'] == 1){
                echo "<script>window.location = '../dashboard-admin.php?page=profile'</script>";
            }
            else if($_POST['role'] == 2 || $_POST['role'] == 3){
                echo "<script>window.location = '../dashboard-ketua.php?page=profile'</script>";
            }
            else if($_POST['role'] == 4){
                echo "<script>window.location = '../dashboard-bendahara.php?page=profile'</script>";
            }
            else if($_POST['role'] == 5){
                echo "<script>window.location = '../dashboard-anggota.php?page=profile'</script>";
            }
        }
        else
            echo "<script>alert('Password tidak match')</script>";
    }
}

if(isset($_POST['edit-profile'])){
    $objUser = new User();
    $objUser->id = $_POST['nim'];
    $objUser->name = $_POST['nama_user'];
    $objUser->email = $_POST['email'];
    $objUser->sex = $_POST['gender'];
    $objUser->notelp = $_POST['notelp'];
    $objUser->id_ukm = $_POST['ukm'];
    $objUser->id_role = $_POST['role'];
    $objUser->bio = $_POST['bio'];

    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        echo "<script>alert('Ekstensi file tidak mendukung')</script>";
    }else{
        if($ukuran < 3044070){		
            $xx = $objUser->id.'_profile.'.$ext;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../dist/img/'.$xx);
            $objUser->foto = $xx;
        }else{
            echo "<script>alert('Ukuran file melebihi 3MB')</script>";
        }
    }

    
    $objUser->EditProfile();
    if($objUser->id_role == 1){
        echo "<script>window.location = '../dashboard-admin.php?page=profile'</script>";
    }
    else if($objUser->id_role == 2 || $objUser->id_role == 3){
        echo "<script>window.location = '../dashboard-ketua.php?page=profile'</script>";
    }
    else if($objUser->id_role == 4){
        echo "<script>window.location = '../dashboard-bendahara.php?page=profile'</script>";
    }
    else if($objUser->id_role == 5){
        echo "<script>window.location = '../dashboard-anggota.php?page=profile'</script>";
    }
    
}
?>