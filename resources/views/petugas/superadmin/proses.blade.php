<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from users where id='$id'");
$users = mysqli_fetch_array($query);
$data = array(
            'email'      =>  $mahasiswa['email'],
            'telp'   =>  $mahasiswa['telp'],
            'status'    =>  $mahasiswa['status'],);
 echo json_encode($data);
?>