
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
	<style type="text/css">
		*{
			margin: 0px;
		}
		body{
			margin: 0px;
			padding: 0px;
			display: flex;
		}
		/*LEFT MENU*/
		.menu{
			height: 600px;
			width: 200px;
			border-right: 2px solid grey;
			
		}
		.menu .judul{
			text-align: center;
			height: 100px;
			width: 200px;
			
			border-bottom: 2px solid grey;
		}
		.menu .menu_master{
			
			height: 250px;
			width: 200px;
			border-bottom: 2px solid grey;
		}
		.menu .menu_master ul{
			
			padding: 0px;
		}
		.menu .menu_master ul li{
			line-height: 62.5px;
			text-align: center;
		}
		.menu .menu_master ul li a{
			text-decoration:none; 
		}
		/*BATAS PENUTUP MENU_MASTER*/
		.menu .menu_order{
			
			height: 244px;
			width: 200px;
			border-bottom: 2px solid grey;
		}
		.menu .menu_order ul{
			
			padding: 0px;
		}
		.menu .menu_order ul li{
			line-height: 80px;
			text-align: center;
		}
		.menu .menu_order ul li a{
			text-decoration:none; 
		}
		/*BATAS PENUTUP MENU_ORDER*/
		.DISPLAY{
			height: 780px;
			width: 1200px;
			
			border: 2px solid grey; 

		}


	</style>
</head>
<body>
<div class="menu">
	<div class="judul">
		<p>ALTA HOTEL <br>SISTEM INFORMASI HOTEL</p><p><?php echo date("Y-m-d"); ?></p>
	</div>
	<div class="menu_master">
		<ul>
			<li><a href="index.php?id=1">DASHBOARD</a></li>
			<li><a href="index.php?id=2">PELANGGAN</a></li>
			<li><a href="index.php?id=3">TIPE KAMAR</a></li>
			<li><a href="index.php?id=4">RUANG KAMAR</a></li>
		</ul>
	</div>
	<div class="menu_order">
		<ul>
			<li><a href="index.php?id=5">PEMESANAN</a></li>
			<li><a href="index.php?id=6">PEMBAYARAN</a></li>
			<li><a href="index.php?id=7">HISTORY ORDER</a></li>
		</ul>
	</div>
</div>

<div class="DISPLAY">
	<?php 
		if ($_GET['id']==1){
			include 'dashboard.php';
		}elseif ($_GET['id']==2) {
			include 'pelanggan.php';
		}elseif ($_GET['id']==3) {
			include 'tipekamar.php';
		}elseif ($_GET['id']==4) {
			include 'ruangkamar.php';
		}elseif ($_GET['id']==5) {
			include 'pemesanan.php';
		}elseif ($_GET['id']==6) {
			include 'pembayaran.php';
		}elseif ($_GET['id']==7) {
			include 'history.php';
		}
	 ?>
</div>

 
</body>
<html>