<?php
include('./class/class.Role.php');

if(isset($_GET['id_role'])){	
	$objRole = new Role(); 
	$objRole->id = $_GET['id_role'];	
    echo $objRole->id;
	$objRole->DeleteRole();
	echo "<script>window.location = 'dashboard-admin.php?page=list-role'</script>";					
}
// else{		
// 	echo '<script>window.history.back()</script>';	
// }
?>