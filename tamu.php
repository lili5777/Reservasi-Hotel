<?php 
  include "function.php";
  $pelanggan = Ambil("SELECT * FROM pelanggan");
  $no = 1;
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
        <h3><i class="fa-solid fa-user me-3 fw-bold"></i>TAMU</h3><hr>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah Data</button>

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">NO.KTP</th>
              <th scope="col">NAMA</th>
              <th scope="col">ALAMAT</th>
              <th scope="col">NO.TLP</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($pelanggan as $keys):?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $keys['username']?></td>
                <td><?php echo $keys['password']?></td>
                <td><?php echo $keys['Ktp']?></td>
                <td><?php echo $keys['nama']?></td>
                <td><?php echo $keys['Alamat']?></td>
                <td><?php echo $keys['Nmr']?></td>
                <td><a href="hal_edit.php?id=<?php echo $keys['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="function.php?hapus=<?php echo $keys['id']?>" ><i class="fa-solid fa-trash"></i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!--modal-->
      <div class="modal fade" tabindex="-1" id="tambahdata">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ISI DATA</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              <form action="function.php" method="post">
                <div class="mb-2">
                  <label for="ktp" class="form-label" >No.KTP</label>
                  <input type="text" class="form-control" id="ktp" name="in_ktp" required>
                </div>
                <div class="mb-2">
                  <label for="Username" class="form-label" >Nama</label>
                  <input type="text" class="form-control" id="Username" name="in_nama" required>
                </div>
                <div class="mb-2">
                  <label for="alamat" class="form-label" >Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="in_alamat" required>
                </div>
                <div class="mb-2">
                  <label for="tlp" class="form-label" >No.Tlp</label>
                  <input type="text" class="form-control" id="tlp" name="in_nmr" required>
                </div>
                
              
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name='tambah'>Simpan</button>
            </div>
            </form>

          </div>
        </div>
      </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

