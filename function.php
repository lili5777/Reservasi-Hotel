<?php 
$database = mysqli_connect("localhost","root","","karyaa");
  //////////CHECK OUT PESANAN SECARA OTOMATIS
	$Waktu = date("Y-m-d");
    $sekarang = date('Y-m-d', strtotime('+1 days', strtotime($Waktu)));
    
  $list_pesanan1 = Ambil("SELECT * FROM history");
  foreach($list_pesanan1 as $keys){
    $chk_out = $keys['chek_out'];
    if($sekarang == $chk_out){
      $id_pesanan = $keys['id_pesanan'];
      $id_kamar = $keys['id_kamar'];
      mysqli_query($database,"DELETE FROM history WHERE id_pesanan='$id_pesanan'");
      mysqli_query($database, "UPDATE kamar SET status='FALSE', status_bayar='BARU' WHERE id='$id_kamar'");

    }
  }
  //////////CHECK IN PESANAN SECARA OTOMATIS
	$Waktu = date("Y-m-d");
    $sekarang = date('Y-m-d', strtotime('+1 days', strtotime($Waktu)));
    
  $list_pesanan1 = Ambil("SELECT * FROM history");
  $BOKING = Ambil("SELECT * FROM history WHERE id_kamar='0'");

  foreach($BOKING as $keyss){
  	global $sekarang;
    $chk_in = $keys['chek_in'];
    if($sekarang == $chk_in){
    	$id_p = $keys['id_pelanggan'];
    	$id_t = $keys['id_tipe_kamar'];
    	$chki = $keys['chek_in'];
    	$chko = $keys['chek_out'];
    	$mtd = $keys['metode'];
    	//=========================
    	$result = mysqli_query($database,"SELECT * FROM tipe_kamar WHERE id='$id_t'");
    	$result1 = mysqli_fetch_assoc($result);
    	
    	$hasil_tipe = $result1['tipe']; 
    	//=========================

    	$kamar = Ambil("SELECT * FROM kamar");
	    foreach ($kamar as $keys) {
			
			if($keys["status"] == 'FALSE' && $keys["tipe"] == $hasil_tipe){
				//

				$id_kamar = $keys['id'];
				mysqli_query($database,"UPDATE kamar SET status='TRUE',status_bayar='BARU' WHERE id='$id_kamar'");
				//
				$coba = mysqli_query($database,"INSERT INTO history VALUES('','$id_p','$id_t','$chki','$chko','$id_kamar','$sekarang','$mtd')");
				if($coba){
						
					echo "
					<script>
					alert('DATA BOOKING SUDAH MASUK');
					
					</script>
				";	
				}

				$idd = $keyss['id_pesanan'];			
					mysqli_query($database,"DELETE FROM history WHERE id_pesanan='$idd'");
				break;
			}
		}


    }
  }

  //////////CHECK IN PESANAN SECARA OTOMATIS



//MENGAMBIL DATA DARI TABLE

function Ambil($query){
	global $database;
	$raw = mysqli_query($database,$query);
	$final = [];
	foreach ($raw as $row) {
		$final[] = $row;
	}
	return $final;
}

//MEMASUKKAN DATA PELANGGAN

if(isset($_POST['tambah'])){
	$nama = $_POST['in_nama'];
	$ktp = $_POST['in_ktp'];
	$alamat = $_POST['in_alamat'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nmr = $_POST['in_nmr'];

	$masuk = mysqli_query($database,"INSERT INTO pelanggan values('','$nama','$ktp','$alamat','$nmr', '$username', '$password')");
	if($_POST['tambah'] == 2){
		echo "
			<script>
			alert('DATA BERHASIL DI INPUT');
			document.location = 'home.php';
			</script>
		";	
	}elseif($masuk){
		echo "
			<script>
			alert('DATA BERHASIL DI INPUT');
			document.location = 'tamu.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('DATA BERHASIL GAGAL DI INPUT');
			document.location = 'tamu.php';
			</script>
		";
	}

}

//MENGEDIT DATA PELANGGAN
if(isset($_POST['ubah']) || isset($_POST['ubah1'])){
	@$_POST['ubah1'];
	@$_POST['ubah'];

	$username = @$_POST['username'] ;
	$password = @$_POST['password'];
	$nama = $_POST['in_nama'];
	$ktp = $_POST['in_ktp'];
	$alamat = $_POST['in_alamat'];
	$nmr = $_POST['in_nmr'];
	$id1 = $_POST['ubah1'];
	$id = @$_POST['ubah'];
	$user = mysqli_query($database,"SELECT * FROM pelanggan WHERE id='$id1'");
	if(isset($_POST['ubah'])){
		$user = mysqli_query($database,"SELECT * FROM pelanggan WHERE id='$id'");
	}elseif(isset($_POST['ubah1'])){
		$user = mysqli_query($database,"SELECT * FROM pelanggan WHERE id='$id1'");
	}
	$final_user = mysqli_fetch_assoc($user);
	
	$userr = $final_user['username'];
	
	if(isset($_POST['ubah'])){
		$berubah = mysqli_query($database,"UPDATE pelanggan SET nama='$nama',Ktp='$ktp',Alamat='$alamat',Nmr='$nmr', username='$username', password='$password' WHERE id='$id'");
	}elseif(isset($_POST['ubah1'])){
		$berubah = mysqli_query($database,"UPDATE pelanggan SET nama='$nama',Ktp='$ktp',Alamat='$alamat',Nmr='$nmr' WHERE id='$id1'");
	}
	if($berubah){
		if(isset($_POST['ubah'])){
			echo "
			<script>
			alert('DATA BERHASIL DI EDIT');
			document.location = 'tamu.php';
			</script>
		";
		}elseif(isset($_POST['ubah1'])){
			echo "
			<script>
			alert('DATA BERHASIL DI EDIT');
			document.location = 'hal_user.php?username={$userr}';
			</script>
		";
		}
	}else{
		echo "
			<script>
			alert('DATA BERHASIL GAGAL DI EDIT');
			document.location = 'tamu.php';
			</script>
		";
	}
}

//MENGHAPUS DATA PELANGGAN

if(isset($_GET['hapus'])){
	$id = $_GET['hapus'];
	$terhapus = mysqli_query($database,"DELETE FROM pelanggan WHERE id='$id'");
	if($terhapus){
		echo "
			<script>
			alert('DATA BERHASIL DI HAPUS');
			document.location = 'tamu.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('DATA BERHASIL GAGAL DI HAPUS');
			document.location = 'tamu.php';
			</script>
		";
	}
}


//MEMASUKKAN TIPE KAMAR

if(isset($_POST['tambah_tipe'])){
	$nama = $_POST['in_nama'];
	$si = $_POST['in_singkatan'];
	$alamat = $_POST['in_harga'];

	$masuk = mysqli_query($database,"INSERT INTO tipe_kamar values('','$nama','$si','$alamat','','')");
	if($masuk){
		echo "
			<script>
			alert('TIPE KAMAR BERHASIL DI INPUT');
			document.location = 'kamar.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('TIPE KAMAR BERHASIL GAGAL DI INPUT');
			document.location = 'kamar.php';
			</script>
		";
	}

}

//MENGEDIT TIPE KAMAR
if(isset($_POST['ubah_tipe'])){
	$nama = $_POST['in_nama'];
	$si = $_POST['in_si'];
	$harga = $_POST['in_harga'];
	$id = $_POST['ubah_tipe'];

	$berubah = mysqli_query($database,"UPDATE tipe_kamar SET tipe='$nama',singkatan='$si',harga='$harga' WHERE id='$id'");
	if($berubah){
		echo "
			<script>
			alert('TIPE KAMAR BERHASIL DI EDIT');
			document.location = 'kamar.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('TIPE KAMAR BERHASIL GAGAL DI EDIT');
			document.location = 'kamar.php';
			</script>
		";
	}
}

// MENGHAPUS TIPE KAMAR
if(isset($_GET['hapus_tipe'])){
	$id = $_GET['hapus_tipe'];
	$terhapus = mysqli_query($database,"DELETE FROM tipe_kamar WHERE id='$id'");
	if($terhapus){
		echo "
			<script>
			alert('TIPE KAMAR BERHASIL DI HAPUS');
			document.location = 'kamar.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('TIPE KAMAR GAGAL DI HAPUS');
			document.location = 'kamar.php';
			</script>
		";
	}
}

//MENAMBAH KAMAR

if(isset($_POST['kamar'])){
	$id = $_POST['in_id'];
	$tipe = $_POST['in_tipe'];
	$id_Cek = Ambil("SELECT id FROM kamar");

	foreach ($id_Cek as $ids) {
		if($ids['id'] == $id){
		echo "
			<script>
			alert('ID KAMAR SUDAH TERPAKAI');
			document.location = 'kamar.php';
			</script>
		";
		}
	}
	if($tipe == 'TIPE_KAMAR'){
		echo "
			<script>
			alert('MOHON INPUTKAN TIPE KAMAR');
			document.location = 'kamar.php';
			</script>
		";
	}else{
		$masuk = mysqli_query($database,"INSERT INTO kamar values('$id','$tipe','FALSE','BARU')");
		if($masuk){
			echo "
				<script>
				alert('KAMAR BERHASIL DI INPUT');
				document.location = 'kamar.php';
				</script>
			";
		}

	}
}

//MEMASUKKAN DATA PESANAN KE HISTORY ORDER

if(isset($_POST['pesan']) || isset($_POST['pesan2'])){
	//MENGECEK APAKAH ADA USERNAME YANG DI KIRIM SEBAGAI ACUAN KALAU TAMU SUDAH LOGIN UNTUK MENGETAHUI KALAU FUNGSI DI PANGGIL DARI USER dan mengambil ID pelanggan
	if(@$_POST['pesan2'] != NULL){
		
			$username = $_POST['pesan2'];
			$pelanggan = Ambil("SELECT * FROM pelanggan");
			//MENCARI ID PELANGGAN SESUAI USERNAME YANG DI KIRIM
			foreach($pelanggan as $keys){
				if ($keys['username'] == $username) {
					$id_pelanggan = $keys['id'];
					break;
				}
			}
		

	}elseif(isset($_POST['pesan2'])){
		echo "
			<script>
			alert('SILAHKAN LOGIN TERLEBIH DAHULU');
			document.location = 'home.php';
			</script>
		";
	}else{
		$id_pelanggan = $_POST['id'];
	}
	//BATAS==================================
	
	$chekin = $_POST['chek_in'];
	$chekout = $_POST['chek_out'];
	$id_tipe = $_POST['id_tipe'];

	//MENGECE APAKAH TANGGAL YANG DIMASUKKAN SUDAH BENAR ,SEBAGAI FILTER KE 1
	$tanggal = date("Y-m-d");
		if($chekout<=$tanggal || $chekin<$tanggal || $chekin==$chekout){
		if(isset($_POST['pesan'])){
			echo "
			<script>
				alert('TANGGAL YANG ANDA MASUKKAN BERMASALAH1');
				document.location = 'pesanan.php';
			</script>

		";
		}elseif(isset($_POST['pesan2'])){
			echo "
			<script>
				alert('TANGGAL YANG ANDA MASUKKAN BERMASALAH1');
				document.location = 'home.php?login=true&username={$username}';
			</script>

		";
		}

	}elseif($chekout>$chekin){
	//BATAS==================================
	$penuh = TRUE;
	$tipe_kamar = mysqli_query($database,"SELECT * FROM tipe_kamar WHERE id='$id_tipe'");
	$kamar = Ambil("SELECT * FROM kamar");
	$tipe_new = mysqli_fetch_assoc($tipe_kamar);
	//MENGECEK APAKAH >>>>>>>KAMAR<<<<<<< YANG DI PESAN, DENGAN TIPE YANG SUDAH DI PILIH MASIH ADA YANG KOSONG ATAU TIDAK, SEBAGAI FILTER KE 2
	//SEKALIAN MENGUBAH STATUS KAMAR YANG AKAN DI PESAN MENJADI ORDER
	foreach ($kamar as $keys) {
		
		if(($keys["status"] != 'TRUE' && $keys["status"] != 'ORDER') && $keys["tipe"] == $tipe_new['tipe']){
			$id_kamar = $keys['id'];
			mysqli_query($database,"UPDATE kamar SET status='ORDER' WHERE id='$id_kamar'");
			$penuh = FALSE;
			break;
		}else{
			$penuh = TRUE;
		}
	}
	//BATAS==================================

	if(!$penuh){

			global $id_kamar;
			global $id_pelanggan;
			$metode = $_POST['metode'];

			$berubah = mysqli_query($database,"INSERT INTO history VALUES('','$id_pelanggan','$id_tipe','$chekin','$chekout','$id_kamar','$tanggal','$metode')");

	}elseif($penuh) {
		 if($penuh){
			global $id_kamar;
			global $id_pelanggan;
			
			$metode = $_POST['metode'];
			$history = Ambil("SELECT * FROM history WHERE id_tipe_kamar = '$id_tipe'");
			//MENGECEK APAKAH >>>>>>>TANGGAL<<<<< YANG DI PILIH SESUAI TIPE MASIH TERSEDIA ATAU TIDAK
			$s_chek_in = FALSE;
			$s_chek_out = FALSE;

			foreach($history as $keys){
				if($chekin<$keys['chek_in'] && $chekout<$keys['chek_out']){
					$s_chek_in = TRUE;
				}
				if($chekin>$keys['chek_out'] && $chekout>$keys['chek_out']){
					$s_chek_out = TRUE;
				}
				if($s_chek_out || $s_chek_in){
					$BISA_ORDER = TRUE;
				}else{
					$BISA_ORDER = FALSE;
					break;
				}
			}

			if($BISA_ORDER){
				$berubah = mysqli_query($database,"INSERT INTO history VALUES('','$id_pelanggan','$id_tipe','$chekin','$chekout','','$tanggal','$metode')");
			}else{
			echo "
				<script>
				alert('TANGGAL YANG DI MASUKKAN SUDAH TERISI');
				document.location = 'pesanan.php';
				</script>
			";
			}
			

		}
	}

	global $berubah;
	if($berubah){
		if(isset($_POST['pesan'])){
			echo "
			<script>
			alert('PESANAN BERHASIL DI INPUT');
			document.location = 'pesanan.php';
			</script>
		";
		}elseif(isset($_POST['pesan2'])){
			echo "
			<script>
			alert('PESANAN BERHASIL DI INPUT');
			document.location = 'hal_reservasi.php?login=true&username={$username}';
			</script>
		";
		}
	}elseif (isset($_POST['pesan'])) {
		echo "
			<script>
			alert('PESANAN GAGAL DI INPUT');
			document.location = 'pesanan.php';
			</script>
		";
	}elseif (isset($_POST['pesan2'])) {
		echo "
			<script>
			alert('KAMAR SUDAH PENUH3');
			document.location = 'home.php?login=true&username={$username}';
			</script>
		";
	}
	}
}

// MEMASUKKAN GAMBAR KE DESKRIPSI ABOUT DAN BANNER

if(isset($_POST['simpan'])){
	$gambar = $_POST['gambar'];
	$desk = $_POST['deskripsi'];
	
	$cek= mysqli_query($database, "UPDATE desk_abounner SET gambar = '$gambar', desk = '$desk' WHERE id = 1");
	if($cek){
		echo  "
		<script>
		alert('GAMBAR BERHASIL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}else{
	echo "
		<script>
		alert('GAMBAR GAGAL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}
}

if(isset($_POST['simpan2'])){
	$gambar = $_POST['gambar'];
	$desk = $_POST['deskripsi'];
	
	$cek= mysqli_query($database, "UPDATE desk_abounner SET gambar = '$gambar', desk = '$desk' WHERE id = 2");
	if($cek){
		echo  "
		<script>
		alert('GAMBAR BERHASIL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}else{
	echo "
		<script>
		alert('GAMBAR GAGAL DI INPUT');
		document.location = 'deskirpsi.php';
		</script>
	";
}
}

// MEMASUKKAN GAMBAR KE KAMAR
if(isset($_POST['simpan_kamar'])){
	$gambar = $_POST['gambar'];
	
	$desk = $_POST['deskripsi'];
	
	$id = $_POST['no'];
	
	$cek= mysqli_query($database, "UPDATE tipe_kamar SET gambar = '$gambar', desk = '$desk' WHERE id = '$id'");
	if($cek){
		echo  "
		<script>
		alert('GAMBAR BERHASIL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}else{
	echo "
		<script>
		alert('GAMBAR GAGAL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}
}

// MEMASUKKAN GAMBAR KE GALERI
if(isset($_POST['simpan_galeri'])){
	$gambar = $_POST['gambar'];
	$desk = $_POST['deskripsi'];
	$id = $_POST['no'];
	
	$cek= mysqli_query($database, "UPDATE desk_galeri SET gambar = '$gambar', desk = '$desk' WHERE id = '$id'");
	if($cek){
		echo  "
		<script>
		alert('GAMBAR BERHASIL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}else{
	echo "
		<script>
		alert('GAMBAR GAGAL DI INPUT');
		document.location = 'deskripsi.php';
		</script>
	";
}
}

// MENGEDIT FASILITAS
if(isset($_POST['fasilitas'])){
	$gambar = $_POST['gambar'];
	$nama = $_POST['nama'];
	$desk = $_POST['deskripsi'];
	$id = $_POST['no'];
	
	$cek= mysqli_query($database, "UPDATE fasilitas SET gambar = '$gambar', nama= '$nama', desk = '$desk' WHERE id = '$id'");
	if($cek){
		echo  "
		<script>
		alert('BERHASIL DI EDIT');
		document.location = 'deskripsi.php';
		</script>
	";
}else{
	echo "
		<script>
		alert('GAGAL DI EDIT');
		document.location = 'deskripsi.php';
		</script>
	";
}
}

// CEK AKUN PELANGGAN dan ADMIN
if(isset($_POST['akun'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status1 = false;
	$status2 = false;

	$login = $_POST['jenis'];
	echo $login;
	
	
	$pelanggan= Ambil("SELECT * FROM pelanggan");
	$admin = Ambil("SELECT * FROM admin");
	if($login == 1){
		foreach($pelanggan as $keys){
		if($username == $keys['username'] && $password == $keys['password']){
			$status1 = true;
		}
	}
	}elseif($login == 2){
		foreach($admin as $keys){
			if($username == $keys['username'] && $password == $keys['password']){
				$status2 = true;
		}
	}
	}
	
	if($status1){
		echo  "
		<script>
		alert('BERHASIL MASUK');
		document.location = 'hal_user.php?username={$username}';
		</script>
	";
	}elseif($status2){
		echo "
			<script>
			alert('BERHASIL MASUK');
			document.location = 'dashboard.php';
			</script>
		";
	}else{
		echo "
			<script>
			alert('USERNAME/PASSWORD/TIPE SALAH');
			document.location = 'home.php';
			</script>
		";
	}
}

// RESET KAMAR DAN STATUS KAMAR

if(isset($_POST['reset_kmr']) || isset($_POST['reset_sts'])){
	if(isset($_POST['reset_kmr'])){
	$reset = mysqli_query($database, "TRUNCATE TABLE kamar");
	if($reset){
		echo "
		<script>
		alert('Sukses');
		document.location = 'kamar.php';
		</script>
	";
	}
	}elseif(isset($_POST['reset_sts'])){
	$reset = mysqli_query($database, "UPDATE kamar SET status = 'FALSE', status_bayar = 'BARU' ");
	if($reset){
		echo "
		<script>
		alert('Sukses');
		document.location = 'kamar.php';
		</script>
	";
	}

	}
}
//CHEK OUT UNTUK KAMAR ATAU MENGHAPUS UNTUK ADMIN
if(isset($_GET['id_r']) || isset($_GET['id_u'])){
$id_u = @$_GET['id_u'];
$id_r = @$_GET['id_r'];
$id_kamar = $_GET['id_kamar'];


$username = @$_GET['username'];
echo $id_kamar;

if(isset($_GET['id_r'])){
	$ha = mysqli_query($database,"DELETE FROM history WHERE id_pesanan='$id_r'");
}elseif(isset($_GET['id_u'])){
	$ha = mysqli_query($database,"DELETE FROM history WHERE id_pesanan='$id_u'");
}
$update = mysqli_query($database, "UPDATE kamar SET status='FALSE', status_bayar='BARU' WHERE id='$id_kamar'");

if($ha && $update){
		if(isset($_GET['id_r'])){
			echo "
			<script>
			alert('CHECK OUT DENGAN ID PESANAN {$id_r}');
			document.location = 'riwayat.php'; 
			</script>
		";
		}elseif(isset($_GET['id_u'])){
			echo "
			<script>
			alert('PESANAN BERHASIL DI HAPUS {$id_u}');
			document.location = 'hal_user.php?username={$username}'; 
			
			</script>
			BENAR
		";
		}
}else{
	echo "gagal";
}
}

//CHEKC OUT OTOMATIS UNTUK PELANGGAN YANG LUPA, AGAR KAMAR BISA KOSONG SESUAI JADAL YANG DI TENTUKAN
 ?>
