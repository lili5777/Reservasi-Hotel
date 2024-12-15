<?php 
include 'function.php';
$id = $_GET['id'];

$raw = mysqli_query($database,"SELECT * FROM tipe_kamar WHERE id='$id'");
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
 				<td>NAMA</td><td>: <input type="text" name="in_nama" value="<?php echo $final['tipe']?>"></td>
 			</tr>
 			<tr>
 				<td>Singkatan</td><td>: <input type="text" name="in_si" value="<?php echo $final['singkatan']?>"></td>
 			</tr>
 			<tr>
 				<td>Harga</td><td>: <input type="text" name="in_harga" value="<?php echo $final['harga']?>"></td>
 			</tr>
 			<tr>
 				<td colspan="2"><button type="submit" name="ubah_tipe" value="<?php echo $id; ?>">UBAH</button></td>
 			</tr>
 		</table>
 	</form>
 </div>

 </body>
 </html>