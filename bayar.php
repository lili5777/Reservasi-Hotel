<?php 
include 'function.php';
$id = $_GET['id'];

$ubah_pembayaran = mysqli_query($database,"UPDATE kamar SET status_bayar='SELESAI', status = 'TRUE' WHERE id='$id'");
	if($ubah_pembayaran){
		echo "
			<script>
			alert('PEMBAYARAN SELESAI');
			document.location = 'riwayat.php';
			</script>
			asas
		";
	}else{
		echo "
			<script>
			alert('GAGAL MEMBAYAR');
			document.location = 'pembayaran.php';
			</script>
		";
	}

 ?>
