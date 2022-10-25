<?php
//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "klinik");
//variabel nim yang dikirimkan form.php
@$id = $_GET['id'];
//mengambil data
@$query = mysqli_query($koneksi, "select * from users where id = '$id'");
@$user = mysqli_fetch_array($query);
$data = array(
    'id'       =>  @$user['id'],
    'email'      =>  @$user['email']);
//tampil data
echo json_encode($data);
?>