<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (!isset($_SESSION)) {
		// echo '<script>window.location = "page/login.php";</script>';
		session_start();
	}
	if(isset($_SESSION["id_role"])){		
		if($_SESSION["id_role"] == 1)
			echo '<script>window.location = "dashboard-admin.php";</script>';
		else if($_SESSION["id_role"] == 2 || $_SESSION["id_role"] == 3)
			echo '<script>window.location = "dashboard-ketua.php";</script>';
		else if($_SESSION["id_role"] == 4)
			echo '<script>window.location = "dashboard-bendahara.php";</script>';
        else if($_SESSION["id_role"] == 5)
			echo '<script>window.location = "dashboard-anggota.php";</script>';
	}
	else{
		echo '<script>window.location = "page/login.php";</script>';
	}
 	require "inc.koneksi.php";
    
    ?>
</body>
</html>