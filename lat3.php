<form method="post" action="">
	chat box :<input type="text" name="chat">
	<input type="submit" name="proses" value="ok">
</form>
<hr>
<?php
	if(isset($_POST['proses'])){
		$tulisan = $_POST['chat'];
		$kata = explode(" ", $tulisan);
		$kata_kasar = array('fuck', 'sialan', 'bangsat', 'bitch');
	
	foreach ($kata as $word) {
		// if($word == 'fuck' || $word == 'sialan' || $word ==='bangsat'){
			if(in_array($word, $kata_kasar) === true){
			echo "*****";
		}else{
			echo "$word";
		}
	 }

  }
  else{
  	echo "kata kasar akan di ganti dengan ****";
  }
  ?>