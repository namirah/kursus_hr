<?php
try {
	$dbh = new PDO('mysql:host=localhost;dbname=kursus_an', "root","");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
	print "koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
	die();
}
?>