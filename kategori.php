<?php

	include 'koneksi.php';
	if(isset($_GET['aksi']))
	{
		$id = $_GET['id'];
		$sql = "select * from kategori where id_kat = $id";
		$perintah = $dbh->query($sql);
		$a = $perintah->fetch();
?>
		<h1>edit kategori</h1>
		<form method="post" action="kategori_proses.php">
			<input type="hidden" name="id" value="<?php echo $id?>">
		nama kategori : <input type="text" name="kategori" value="<?php echo $a 
		['nama_kategori']?>"><br><br>
		<input type="submit" name="proses" value="edit">
	</form>
	kembali ke <a href="kategori.php"><button>kategori</button></a>

<?php
	}
	else{

?>
	
		<h1>tambah kategori</h1>
		<form method="post" action="kategori_proses.php">
		nama kategori : <input type="text" name="kategori"><br><br>
		<input type="submit" name="proses" value="tambah">
</form>

<?php }?>

<hr>

<table width="300px" border="1">
	<tr>
		<th>no</th>
		<th>nama kategori</th>
		<th>aksi</th>
	</tr>
	<?php
	

	$sql = "select * from kategori";
	$perintah = $dbh->query($sql);
	$no = 1;
	foreach ($perintah as $a){
		echo "
		<tr>
		<td>$no</td>
		<td>$a[nama_kategori]</td>
		<td>
		<a href='kategori.php?aksi=edit&id=$a[id_kat]'>edit </a> ||
		<a href='kategori_proses.php?id=$a[id_kat]'>delete </a>
		</td>
	</tr>
	";
	$no++;
}
?>
</table>