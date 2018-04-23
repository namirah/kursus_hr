<?php include "koneksi.php"; 
if(isset($_GET['aksi'])){
	$sql = "select * from artikel where id_artikel = $_GET[id]";
	$perintah = $dbh ->query($sql);
	$field = $perintah->fetch();
?>
	<h1>edit artikel</h1>
<form method="post" action="artikel_proses.php">
	kategori :
	<select name="kategori">
		<option value=""> ---pilih kategori---</option>
		<?php
			$sql1 = "select * from kategori";
			$perintah1 = $dbh-> query($sql1);
			foreach ($perintah1 as $field1 ) {
				if($field['id_kat'] == $field1['id_kat']){
					$add = "selected";
				}
				else{
					$add = "";
				}
				echo "<option value='$field1[id_kat]'$add>$field1[nama_kategori]
				</option>";
				}
			?>


	</select><br><br>
	<input type="hidden" name="id" value="<?php echo $field['id_artikel']?>">
	judul : <input type="text" name="judul" value="<?php echo $field['judul']?>"><br><br>
	isi : <textarea name="isi"><?php echo $field['isi']?></textarea><br><br>
	gambar : <input type="text" name="gambar" value="<?php echo $field['gambar']?>"><br><br>
	<input type="submit" name="proses" value="edit">
</form>

<?php
}
else{
	?>


<h1>tambah artikel</h1>
<form method="post" action="artikel_proses.php">
	kategori :
	<select name="kategori">
		<option value=""> ---pilih kategori---</option>
		<?php
			$sql = "select * from kategori";
			$perintah = $dbh-> query($sql);
			foreach ($perintah as $field ) {
				echo "<option value='$field[id_kat]'>$field[nama_kategori]</option>";
				}
			?>


	</select><br><br>


	judul : <input type="text" name="judul"><br><br>
	isi : <textarea name="isi"></textarea><br><br>
	gambar : <input type="text" name="gambar"><br><br>
	<input type="submit" name="proses" value="tambah">
</form>
<?php
}
?>

<table width="300px" border="1">
	<tr>
		<th>no</th>
		<th>nama kategori</th>
		<th>judul</th>
		<th>isi</th>
		<th>gambar</th>
	</tr>
<?php
	$sql = "select * from artikel,kategori where artikel.id_kat = kategori.id_kat";
	$perintah = $dbh->query($sql);
	$no=1;


	foreach ($perintah as $field) {
	 echo "
	     <tr>
	     <td>$no</td>
	     <td>$field[nama_kategori]</td>
	     <td>$field[judul]</td>
	     <td>$field[isi]</td>
	     <td>
	     <a href='artikel.php?aksi=edit&id=$field[id_artikel]'>edit</a> ||

	     <a href='artikel_proses.php?id=$field[id_artikel]'>delete</a>

	     </td>
	     </tr>
	     ";
	$no=$no+1;
	}

?>
</table>