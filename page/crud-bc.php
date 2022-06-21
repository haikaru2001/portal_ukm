<?php
require('../inc.koneksi.php');
include('../class/class.Broadcast.php');
include('../class/class.Mail.php');
date_default_timezone_set("Asia/Bangkok");

if(isset($_POST['add'])){
    $objBc = new Broadcast();
    $objBc->pengirim = $_POST['pengirim'];
    $objBc->judul = $_POST['judul'];
    $objBc->isi = $_POST['isi'];
    $objBc->penerima = $_POST['penerima'];
    $objBc->date = date('Y-m-d H:i:s');
    $objBc->id_ukm = $_POST['id_ukm'];
    $objBc->addBroadcast();
    echo "<script> alert('Berhasil menambah pesan broadcast'); </script>";
    if($_POST['role'] == 1){
        echo "<script>window.location = '../dashboard-admin.php?page=broadcast'</script>";
    }
    else {
        echo "<script>window.location = '../dashboard-ketua.php?page=broadcast-k'</script>";
    }
}
if(isset($_POST['setAction'])){
    $objBc = new Broadcast();
    $objBc->id = $_POST['id_bc'];
    $objBc->status = $_POST['action'];
    $objBc->reason = $_POST['alasan'];
    $objBc->setStatus();
    echo "<script> alert('Berhasil memengubah action'); </script>";
    echo "<script>window.location = '../dashboard-admin.php?page=broadcast'</script>";

    // if($objBc->status == 'a'){
    //     $message =  file_get_contents('../templateemail.html');  					 
	// 		$header = "Registrasi berhasil";
	// 		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
	// 				Selamat <b>' .$objUser->name.'</b>, anda telah terdaftar pada sistem UKM Management System online ESQ Business School.<br>
	// 				Berikut ini informasi account anda:<br>
	// 				</span>
	// 				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
	// 					Username : '.$objUser->email.'<br>
	// 					Password : '.$password.'
	// 				</span>';
	// 		$footer ='Silakan login untuk mengakses sistem';
										
	// 		$message = str_replace("#header#",$header,$message);
	// 		$message = str_replace("#body#",$body,$message);
	// 		$message = str_replace("#footer#",$footer,$message);
					 						
			
	// 		Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);
    // }
}
?>