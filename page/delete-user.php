<?php
include('../class/class.User.php');

if(isset($_GET['id_user'])){	
	$objUser = new User(); 
	$objUser->id = $_GET['id_user'];
	$objUser->DeleteUser();
	echo "<script>window.location = 'dashboard-admin.php?page=list-user'</script>";					
}