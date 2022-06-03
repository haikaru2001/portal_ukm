<?php
require('../inc.koneksi.php');
include('../class/class.Ukm.php');

if(isset($_GET['add'])){
    $objUkm = new Ukm();
    $objUkm->ukm = $_GET['nama_ukm'];
    $objUkm->addUkm();
    echo "<script>window.location = '../dashboard-admin.php?page=list-ukm'</script>";
}

if(isset($_GET['update'])){
    $objUkm = new Ukm();
    $objUkm->id = $_GET['id_ukm'];
    $objUkm->ukm = $_GET['nama_ukm'];
    $objUkm->Updateukm();
    echo "<script>window.location = '../dashboard-admin.php?page=list-ukm'</script>";
}
?>