<?php 
include 'function.php';
$pelanggan = Ambil("SELECT * FROM PELANGGAN");
$kamar = Ambil("SELECT * FROM kamar");
$jum_kamar = 0;
$jum_pelanggan = 0;
$kamar_kosong = 0;
$kamar_terpakai = 0;
foreach($kamar as $keys){
$jum_kamar++;
if($keys['status']=='FALSE'){
$kamar_kosong++;
}elseif($keys['status']=='TRUE'){
$kamar_terpakai++;
}
}
foreach($pelanggan as $keys){
  $jum_pelanggan++;
  }
  $order = Ambil("SELECT * FROM history WHERE id_kamar=0");
  $jum_p = 0;

  foreach($order as $keys){
  $jum_p++;
  }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="fontasome/css/all.css">
    
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold text-white" href="#">Selamat Datang Admin | ALTA HOTEL</a>
          <a class="navbar-brand fw-bold text-white" href="home.php">Logout</a>
        </div>
    </nav>

    <!--data-->
    <div class="row no-gutters mt-5">
      <!--menubar-->
      <div class="col-md-3 pt-4 ps-3 bg-dark pb-5">
        <ul class="nav flex-column ms-3 mb-5">
          <li class="nav-item">
            <a class="nav-link active text-white hov fw-bold" href="dashboard.php"><i class="fa-solid fa-gauge me-3"></i>Dashboard</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="tamu.php"><i class="fa-solid fa-user me-3"></i>Tamu</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="kamar.php"><i class="fa-solid fa-house me-3"></i>Kamar</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="pesanan.php"><i class="fa-solid fa-share-from-square me-3"></i>Pemesanan</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="pembayarann.php"><i class="fa-solid fa-cart-shopping me-3"></i>Pembayaran</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="riwayat.php"><i class="fa-solid fa-landmark me-3"></i>Riwayat Pembelian</a>
            <hr class="hr">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white hov fw-bold" href="deskripsi.php"><i class="fa-solid fa-screwdriver-wrench me-3"></i>Deskripsi</a>
            <hr class="hr">
          </li>
        </ul>
      </div>

      <!--info-->
      <div class="col-md-9 pt-4 px-5">
        <h3><i class="fa-solid fa-gauge me-3"></i>DASHBOARD</h3><hr>

        <div class="row text-white">
          <div class="card bg-secondary ms-4 mb-4" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa-solid fa-user me-3"></i></div>
              <h5 class="card-title">TAMU</h5>
              <div class="display-4 fw-bold"><?php echo $jum_pelanggan?></div>
              <a href="tamu.php" class="Detail text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-success ms-4 mb-4" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa-solid fa-house me-3"></i></div>
              <h5 class="card-title">KAMAR KOSONG</h5>
              <div class="display-4 fw-bold"><?php echo $kamar_kosong?></div>
              <a href="kamar.php" class="Detail text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-danger ms-4 mb-4" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa-solid fa-house-circle-check"></i></div>
              <h5 class="card-title">KAMAR TERPAKAI</h5>
              <div class="display-4 fw-bold"><?php echo $kamar_terpakai?></div>
              <a href="kamar.php" class="Detail text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-primary ms-4 mb-4" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa-solid fa-cart-shopping me-3"></i></div>
              <h5 class="card-title">PESANAN</h5>
              <div class="display-4 fw-bold"><?php echo $jum_p++;; ?></div>
              <a href="pesanan.php" class="Detail text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
            </div>
          </div>
          
        </div>

      </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

