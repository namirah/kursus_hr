<?php
include "koneksi.php";

	$kategori = $_POST['kategori'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$gambar = $_POST['gambar'];
	$tombol = $_POST['proses'];
	$id = $_POST['id'];

if($tombol == 'tambah'){
	$sql = "INSERT INTO  artikel(id_kat,judul,isi,gambar)
			values('$kategori','$judul','$isi','$gambar')";
	
	$dbh ->query($sql);
	}
else if($tombol == "edit"){
	$sql = "UPDATE artikel SET id_kat = '$kategori',
							judul = '$judul',
							isi = '$isi',
							gambar = '$gambar'
			WHERE id_artikel = $id";
	$dbh ->query($sql);
}

else{
	$id = $_GET['id'];
	$sql = "DELETE FROM artikel where id_artikel = $id";
	$dbh ->query($sql);
}
header('location:artikel.php');


?>
