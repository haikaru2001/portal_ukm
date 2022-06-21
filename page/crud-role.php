<?php
require('../inc.koneksi.php');
include('../class/class.Role.php');

if(isset($_GET['add'])){
    $objRole = new Role();
    $objRole->role = $_GET['nama_role'];
    $objRole->AddRole();
    echo "<script>window.location = '../dashboard-admin.php?page=list-role'</script>";
}

if(isset($_GET['update'])){
    $objRole = new Role();
    $objRole->id = $_GET['id_role'];
    $objRole->role = $_GET['nama_role'];
    $objRole->UpdateRole();
    echo "<script>window.location = '../dashboard-admin.php?page=list-role'</script>";
}
?>