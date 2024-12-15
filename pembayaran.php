<?php 
include 'function.php';
$history = Ambil("SELECT * FROM history");
$pelanggan = Ambil("SELECT * FROM pelanggan");
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");
$kamar = Ambil("SELECT * FROM kamar");
$no = 1;
$tampilkan = FALSE;
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <table cellspacing="10">
 	<tr>
 		<td>NO</td><td>Nama</td><td>Biaya</td><td>Chekcin</td><td>Checkout</td><td>Tanggal pesanan</td><td>Aksi</td>
 	</tr>
 	<?php foreach ($history as $key): ?>
 		<?php foreach ($kamar as $kamar_id) {
 			if($kamar_id['id'] == $key['id_kamar'] && $kamar_id['status_bayar']=="BARU"){
 				$tampilkan = TRUE;
 			}
 		} ?>
 		<?php if($tampilkan): ?>
 			<tr>
 			<td><?php echo $no++; ?></td>
 			<td>
 				<?php 
 					foreach ($pelanggan as $pelanggan_nama) {
 						if($pelanggan_nama['id'] == $key['id_pelanggan']){
 							echo $pelanggan_nama['nama']." (";
 							echo $pelanggan_nama['Nmr'];
 							echo ")";
 						}
 					}
 				 ?>
 			</td>
 			<td>
 				<?php 
 					foreach ($tipe_kamar as $tipe_harga) {
 						if($tipe_harga['id'] == $key['id_tipe_kamar']){
 							echo $tipe_harga['harga'];
 							
 						}
 					}
 				 ?>
 			</td>
 			 <td>
 				<?php echo $key['chek_in']?>
 			</td>
 			<td>
 				<?php echo $key['chek_out']?>
 			</td>
 			<td>
 				<?php echo $key['tanggal']; ?>
 			</td>
 			<td>
 				<a href="bayar.php?id=<?php echo $key['id_kamar'] ?>">BAYAR</a>
 			</td>
 		</tr>
 		<?php endif; ?>
 	<?php endforeach; ?>
 </table>
 </body>
 </html>