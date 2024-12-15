<?php 
include 'function.php';
$username = $_GET['username'];
$hasil = mysqli_query($database,"SELECT * FROM pelanggan WHERE username='$username'");
$data_akun = mysqli_fetch_assoc($hasil);
$pelanggan = Ambil("SELECT * FROM pelanggan");
$history = Ambil("SELECT * FROM history");
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");

foreach ($pelanggan as $keys) {
    if ($keys['username']==$username) {
        $id = $keys['id'];
        break;
    }
}


foreach ($history as $keys) {
  $no = $keys['id_pesanan'];
}
$hasil_history = mysqli_query($database,"SELECT * FROM history WHERE id_pesanan='$no'");
$final_history = mysqli_fetch_assoc($hasil_history);
foreach ($tipe_kamar as $keys) {
  if ($keys['id']==$final_history['id_tipe_kamar']) {
      $harga = $keys['harga'];
      $tipe = $keys['tipe'];

      break;
  }
}

$in = date_create($final_history['chek_in']);
$out = date_create($final_history['chek_out']);
$beda = date_diff($in,$out);
?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
  </head>
  <body>
    
    <!--navbar-->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="" width="35" height="35" class="d-inline-block align-text-top mx-2">
            <span class="fw-bold text-white">ALTA HOTEL</span>
          </a>
          <div class="d-flex flex-row bd-highlight">
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username;?>">Beranda</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#roomm">Kamar</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="fasilitas.php?login=true&username=<?php echo $username?>">Fasilitas</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#about">Tentang</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#Galery">Galeri</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="hal_user.php?username=<?php echo $username?>">Profil</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=false">Keluar</a></div>
          </div>
        </div>
    </nav>

      <!--content-->
    <div class="container py-5">
        <div class="row">

            <!--kiri-->
            <div class="col-lg-4">
                <div class="card p-3 shadow">
                    <div class="card-body">
                        <h3 class="text-center">DATA</h3><hr>
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">No.Ktp :</span>
                            <h5><?php echo $data_akun['Ktp'] ?></h5>
                        </p>
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">Nama :</span>
                            <h5><?php echo $data_akun['nama'] ?></h5>
                        </p>
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">Alamat :</span>
                            <h5><?php echo $data_akun['Alamat'] ?></h5>
                        </p>
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">No.Hp :</span>
                            <h5><?php echo $data_akun['Nmr'] ?></h5>
                        </p>
                    </div>
                </div>
            </div>

            <!--kanan-->
            <div class="col-lg-8">
                <div class="shadow p-4 mb-3">
                    <h3 class="text-center">RESERVASI</h3><hr>

                    <div class="row">
                        <!--kiri-->
                        <div class="col-lg-6">
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Harga Perhari :</span>
                                <h5><?php echo $harga;?></h5>
                            </p>
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Tipe Kamar :</span>
                                <h5><?php echo $tipe;?></h5>
                            </p>
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Totatl Harga :</span>
                                <h5><?php echo $harga*(($beda->d)+1);?></h5>
                            </p>
                            <p class="card-text">
                            <span class="text-muted mb-1 d-block">Metode Pembayaran :</span>
                            <h5>Tunai</h5>
                            </p>
                        </div>

                        <!--kanan-->
                        <div class="col-lg-6">
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Tanggal Masuk :</span>
                                <h5><?php echo $final_history['chek_in']?></h5>
                            </p>
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Tanggal Keluar :</span>
                                <h5><?php echo $final_history['chek_out']?></h5>
                            </p>
                            
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Total Hari :</span>
                                <h5><?php echo ($beda->d)+1;?> hari</h5>
                            </p>
                        </div>
                    </div>
                        <a href="hal_user.php?username=<?php echo $username?>"><button class="btn btn-primary fw-bold">Kembali</button></a>

                </div>
            </div>
        </div>
        
    </div>

    <!--contact-->
    <div class="container-fluid d-flex gelery">
      <div class="col-8 mx-3">
        <div class="d-flex pt-2">
          <img src="img/location (1).png" alt="" class="mx-3"
            width="20"
            height="20">
            <p>Jl. Taman Makam Pahlawan</p>
        </div>
        <div class="d-flex">
          <img src="img/phone-call (2).png" alt="" class="mx-3"
            width="20"
            height="20">
            <p>081317256766</p>
        </div>
        <div class="d-flex">
          <img src="img/mail.png" alt="" class="mx-3"
            width="20"
            height="20">
            <p>altahotel@gmail.com</p>
        </div>
      </div>

      <div class="container-fluid pt-3 ps-5 ms-5">
        <a href="https://www.facebook.com/login.php" class="mx-2"><img src="img/facebook.png" alt="" width="50" height="50"></a>
        <a href="https://twitter.com/i/flow/login" class="mx-2"><img src="img/instagram (2).png" alt="" width="50" height="50"></a>
        <a href="https://www.instagram.com/accounts/login/" class="mx-2"><img src="img/twitter.png" alt="" width="50" height="50"></a>
      </div>
    </div>

    <!--footer-->
    <div class="container-fluid text-center bg-dark py-1">
      <p class="fw-bold text-white">© 2022 Alta Hotel Makassar.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>