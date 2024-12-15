<?php 
include "function.php";

$tamu = Ambil("SELECT * FROM pelanggan");
$tipe = Ambil("SELECT * FROM tipe_kamar");

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
      <div class="col-md-9 pt-4 ps-5 px-5">
        <h3><i class="fa-solid fa-share-from-square me-3"></i>PEMESANAN KAMAR</h3><hr>

        <form action="function.php" method="POST">
            <div class="mb-2">
                <label for="pilih" class="form-label fw-bold">Tamu</label>
                <select class="form-select" aria-label="Default select example" id="pilih" name="id" required>
                  <option selected>Silahkan Pilih</option>
                  <?php foreach($tamu as $keys): ?>
                  <option value="<?php echo $keys['id']?>"><?php echo $keys['nama']?></option>
                  <?php endforeach; ?>

                  
                </select>
            </div>
            

            <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label for="masuk" class="form-label fw-bold">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="masuk" name="chek_in" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label for="keluar" class="form-label fw-bold">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="keluar" name="chek_out" required>
                  </div>
                </div>
            </div>

                    <div class="mb-2">
                        <label for="tipe" class="form-label fw-bold">Tipe Kamar</label>
                        <select class="form-select" aria-label="Default select example" id="tipe" name="id_tipe" required>
                        <?php foreach($tipe as $keys): ?>
                        <option value="<?php echo $keys['id']?>"><?php echo $keys['tipe']?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="bayar" class="form-label fw-bold">Mode Pembayaran</label>
                        <select class="form-select" aria-label="Default select example" id="bayar" required name="metode">
                          <option selected>Silahkan Pilih</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Credit</option>
                        </select>
                    </div>




            <button class="btn btn-primary mt-2 fw-bold" type="submit" name="pesan">Pesan</button>
        </form>
      </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

