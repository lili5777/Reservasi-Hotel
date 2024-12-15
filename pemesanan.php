<?php 
include 'function.php';
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");
$pelanggan = Ambil("SELECT * FROM pelanggan");
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
 			<td>Chek in</td><td><input type="text" name="chek_in"></td>
 		</tr>
 		 <tr>
 			<td>Chek out</td><td><input type="text" name="chek_out"></td>
 		</tr>
 		<tr>
 			<td>
 				<select name="id_tipe">
 				<?php foreach ($tipe_kamar as $hasil): ?>
 				 <option value="<?php echo $hasil['id'] ?>"><?php echo $hasil['tipe'] ?></option>
				<?php endforeach; ?>		
 				</select>
 				
 			</td>
 		</tr>
 	</table>
 	<select name="id">
 		<?php foreach ($pelanggan as $hasil): ?>
 			<option value="<?php echo $hasil['id'] ?>"><?php echo $hasil['nama'] ?></option>
 		<?php endforeach; ?>
 	</select>
 	<button type="submit" name="pesan">PESAN KAMAR</button>
  </form>
 </body>
 </html>