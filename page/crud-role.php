<?php
require('../inc.koneksi.php');
include('../class/class.Role.php');

if(isset($_GET['add'])){
    $objUkm = new Role();
    $objUkm->role = $_GET['nama_role'];
    $objUkm->AddRole();
    echo "<script>window.location = '../dashboard-admin.php?page=list-role'</script>";
}

if(isset($_GET['update'])){
    $objUkm = new Role();
    $objUkm->id = $_GET['id_role'];
    $objUkm->role = $_GET['nama_role'];
    $objUkm->UpdateRole();
    echo "<script>window.location = '../dashboard-admin.php?page=list-role'</script>";
}
?>