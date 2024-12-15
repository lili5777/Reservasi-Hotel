<?php 
include 'function.php';

$pelanggan = Ambil("SELECT * FROM pelanggan");
$no = 1;
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <div class="input">
 	<form action="function.php" method="post">
 		<table>
 			<tr>
 				<td>NAMA</td><td>: <input type="text" name="in_nama"></td>
 			</tr>
 			<tr>
 				<td>KTP</td><td>: <input type="text" name="in_ktp"></td>
 			</tr>
 			<tr>
 				<td>ALAMAT</td><td>: <input type="text" name="in_alamat"></td>
 			</tr>
 			<tr>
 				<td>NOMOR WA</td><td>: <input type="text" name="in_nmr"></td>
 			</tr>
 			<tr>
 				<td colspan="2"><button type="submit" name="tambah">TAMBAH DATA</button></td>
 			</tr>
 		</table>
 	</form>
 </div>

 <table cellpadding="5">
 	<tr>
 		<td>NO</td><td>NAMA</td><td>KTP</td><td>ALAMAT</td><td>NOMOR</td><td>AKSI</td>
 	</tr>
 	<?php foreach ($pelanggan as $hasil): ?>
 	<tr>
 		<td><?php echo $no++; ?></td><td><?php echo $hasil['nama']; ?></td><td><?php echo $hasil['Ktp']; ?></td><td><?php echo $hasil['Alamat']; ?></td><td><?php echo $hasil['Nmr']; ?></td><td><a href="function.php?hapus=<?php echo $hasil['id']; ?>">HAPUS</a> | <a href="edit.php?id=<?php echo $hasil['id']; ?>">EDIT</a></td>
 	</tr>
 	<?php endforeach; ?>
 </table>
 </body>
 </html>