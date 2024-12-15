<?php 
include 'function.php';
$no = 1;
$tipe = Ambil("SELECT * FROM tipe_kamar");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="function.php" method="post">
 		<table>
 			<tr>
 				<td>NAMA</td><td>: <input type="text" name="in_nama"></td>
 			</tr>
 			<tr>
 				<td>Singkatan</td><td>: <input type="text" name="in_singkatan"></td>
 			</tr>
 			<tr>
 				<td>HARGA</td><td>: <input type="text" name="in_harga"></td>
 			</tr>
 			<tr>
 				<td colspan="2"><button type="submit" name="tambah_tipe">TAMBAH TIPE</button></td>
 			</tr>
 		</table>
 	</form>

 	 <table cellpadding="5">
 	<tr>
 		<td>NO</td><td>NAMA</td><td>SINGKATAN</td><td>HARGA</td><td>AKSI</td>
 	</tr>
 	<?php foreach ($tipe as $hasil): ?>
 	<tr>
 		<td><?php echo $no++; ?></td><td><?php echo $hasil['tipe']; ?></td><td><?php echo $hasil['singkatan']; ?></td><td><?php echo $hasil['harga']; ?></td></td><td><a href="function.php?hapus_tipe=<?php echo $hasil['id']; ?>">HAPUS</a> | <a href="edit_tipe.php?id=<?php echo $hasil['id']; ?>">EDIT</a></td>
 	</tr>
 	<?php endforeach; ?>
 	</table>

 </body>
 </html>