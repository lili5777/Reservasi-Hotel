<?php 
include 'function.php';
$history = Ambil("SELECT * FROM history");
$pelanggan = Ambil("SELECT * FROM pelanggan");
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");
$kamar = Ambil("SELECT * FROM kamar");
$no = 1;
$tampilkan = FALSE;
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
        <h3><i class="fa-solid fa-cart-shopping me-3"></i>PEMBAYARAN</h3><hr>
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">BIAYA</th>
                <th scope="col">CHECKIN</th>
                <th scope="col">CHECKOUT</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Metode</th>



                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($history as $key){ ?>
              <?php foreach ($kamar as $kamar_id) {
                if($kamar_id['id'] == $key['id_kamar'] && $kamar_id['status_bayar']=="BARU"){
                  $tampilkan = TRUE;
                  
                }
              } ?>
              <?php if($tampilkan){ ?>
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
                  <?php echo $key['metode']; ?>
                </td>
                <td>
                  <a href="bayar.php?id=<?php echo $key['id_kamar']; ?>">BAYAR</a>
                </td>
              </tr>
              <?php }; ?>
            <?php }; ?>
            </tbody>
          </table>
      </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

