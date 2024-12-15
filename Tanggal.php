<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<input type="number" name="tanggal">
		<button type="submit">COBA</button>
	</form>
	<?php 
	$tanggal = $_POST['tanggal'];
	if($tanggal%4==0){
		echo "TAHUN KABISAT";
	}else{
		echo "BUKAN TAHUN KABISAT";
	}
	 ?>


</body>
</html>
