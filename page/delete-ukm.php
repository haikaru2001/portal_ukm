<?php
include('./class/class.Ukm.php');

if(isset($_GET['id_ukm'])){	
	$objUkm = new Ukm(); 
	$objUkm->id = $_GET['id_ukm'];	
    echo $objUkm->id;
	$objUkm->Deleteukm();
	echo "<script>window.location = 'dashboard-admin.php?page=list-ukm'</script>";					
}
// else{		
// 	echo '<script>window.history.back()</script>';	
// }
?>