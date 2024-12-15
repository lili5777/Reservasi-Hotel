<?php 
    include "function.php";
    $id=$_GET['id'];
    $tipe= mysqli_query($database, "SELECT * FROM tipe_kamar WHERE id='$id'");
    $hasil= mysqli_fetch_assoc($tipe);
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
            <a class="nav-link text-white hov fw-bold" href="deskripsi.php"><i class="fa-solid fa-screwdriver-wrench me-3"></i>Singkatan</a>
            <hr class="hr">
          </li>
        </ul>
      </div>

      <!--info-->
      <div class="col-md-9 pt-4 px-5">
        <h3><i class="fa-solid fa-house me-3"></i>EDIT DATA</h3><hr>
            
            <div class="modal-body">
              <form action="function.php" method="post">
                <div class="mb-2">
                  <label for="Username" class="form-label" >Nama</label>
                  <input type="text" class="form-control" id="Username" name="in_nama" required value="<?php echo $hasil['tipe']?>"value="<?php echo $hasil['tipe']?>">
                </div>
                <div class="mb-2">
                  <label for="harga" class="form-label" >Harga</label>
                  <input type="text" class="form-control" id="harga" name="in_harga" required value="<?php echo $hasil['harga']?>">
                </div>
                <div class="mb-2">
                  <label for="deskripsi" class="form-label" >Singkatan</label>
                  <input type="text" class="form-control" id="deskripsi" name="in_si" required value="<?php echo $hasil['singkatan']?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='ubah_tipe' value="<?php echo $id;?>">Simpan</button>
                </div>
             </from>
            </div>

            


    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

