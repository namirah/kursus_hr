<?php
include "koneksi.php";

$kategori = $_POST['kategori'];
$tombol = $_POST['proses'];
$id = $_POST['id'];

if($tombol == 'tambah') {
	$sql = "INSERT INTO kategori (nama_kategori) VALUES ('$kategori');";
	$dbh -> query($sql);
}

else if($tombol == 'edit'){
	$sql = "UPDATE kategori SET nama_kategori = '$kategori' WHERE id_kat = $id;";
	$dbh -> query($sql);

}

else{
	$id = $_GET['id'];
	$sql = "DELETE FROM kategori Where id_kat = $id";
	$dbh -> query($sql);

}

header('location:kategori.php');


?>
