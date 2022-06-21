<?php
include('./class/class.Broadcast.php');

if(isset($_GET['id_bc'])){	
	$objBc = new Broadcast(); 
	$objBc->id = $_GET['id_bc'];	
    echo $objBc->id;
	$objBc->deleteBroadcast();

	if($_SESSION['id_role'] == 1){
		echo "<script>window.location = 'dashboard-admin.php?page=broadcast'</script>";
	}
	else {
		echo "<script>window.location = 'dashboard-ketua.php?page=broadcast-k'</script>";
	}
						
}
// else{		
// 	echo '<script>window.history.back()</script>';	
// }
?>