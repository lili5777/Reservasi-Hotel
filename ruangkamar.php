<?php 
include 'function.php';
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");
$kamar = Ambil("SELECT * FROM kamar");
$no = 1;
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
			<td>ID KAMAR</td><td><input type="" name="in_id"></td>
		</tr>
		<tr>
			<td colspan="2">
				<select name="in_tipe">
					<option>TIPE_KAMAR</option>
					<?php foreach ($tipe_kamar as $hasil): ?>
						<option value="<?php echo$hasil['tipe'] ?>"><?php echo$hasil['tipe'] ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><button type="submit" name="kamar">TAMBAH KAMAR</button></td>
		</tr>
	</table>
</form>

<table cellpadding="10">
	<tr>
		<td>NO</td><td>Tipe Kamar</td><td>Ruang Kamar</td>
	</tr>
	<?php foreach ($tipe_kamar as $hasil1): ?>
		<tr>
			<td><?php echo $no++; ?></td><td><?php echo $hasil1['tipe']; ?></td><td>
				<?php foreach ($kamar as $hasil) {
					if ($hasil['tipe']==$hasil1['tipe']) {
						echo " ".$hasil['id'];
					}
				} ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
 </body>
 </html>