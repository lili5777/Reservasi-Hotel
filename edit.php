<?php 
include 'function.php';
$id = $_GET['id'];

$raw = mysqli_query($database,"SELECT * FROM pelanggan WHERE id='$id'");
$final = mysqli_fetch_assoc($raw);
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
 				<td>NAMA</td><td>: <input type="text" name="in_nama" value="<?php echo $final['nama']?>"></td>
 			</tr>
 			<tr>
 				<td>KTP</td><td>: <input type="text" name="in_ktp" value="<?php echo $final['Ktp']?>"></td>
 			</tr>
 			<tr>
 				<td>ALAMAT</td><td>: <input type="text" name="in_alamat" value="<?php echo $final['Alamat']?>"></td>
 			</tr>
 			<tr>
 				<td>NOMOR WA</td><td>: <input type="text" name="in_nmr" value="<?php echo $final['Nmr']?>"></td>
 			</tr>
 			<tr>
 				<td colspan="2"><button type="submit" name="ubah" value="<?php echo $id; ?>">UBAH</button></td>
 			</tr>
 		</table>
 	</form>
 </div>

 </body>
 </html>