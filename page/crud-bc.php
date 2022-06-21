<?php
require('../inc.koneksi.php');
include('../class/class.Broadcast.php');
include('../class/class.Mail.php');

if(isset($_POST['add'])){
    $objBc = new Broadcast();
    $objBc->pengirim = $_POST['pengirim'];
    $objBc->judul = $_POST['judul'];
    $objBc->isi = $_POST['isi'];
    $objBc->penerima = $_POST['penerima'];
    $objBc->date = date('Y-m-d');
    $objBc->id_ukm = $_POST['id_ukm'];
    $objBc->addBroadcast();
    echo "<script> alert('Berhasil menambah pesan broadcast'); </script>";
    if($_POST['role'] == 1){
        echo "<script>window.location = '../dashboard-admin.php?page=broadcast'</script>";
    }
    else {
        echo "<script>window.location = '../dashboard-ketua.php?page=broadcast'</script>";
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
}
?>