<?php
  include "function.php";
  $ambil = mysqli_query($database, "SELECT * FROM desk_abounner WHERE id = 1");
  $ambil2 = mysqli_query($database, "SELECT * FROM desk_abounner WHERE id = 2");
  $hasil = mysqli_fetch_assoc($ambil);
  $hasil2 = mysqli_fetch_assoc($ambil2);

  $kamar = Ambil("SELECT * FROM tipe_kamar");
  $id = 1;
  $galeri = Ambil("SELECT * FROM desk_galeri");
  $no = 1;
  $fasilitas = Ambil("SELECT * FROM fasilitas");
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
        <h3><i class="fa-solid fa-screwdriver-wrench me-3"></i>Deskripsi</h3><hr>
        
        <h4 class="judul">BANNER</h4>
        <div class="container-fuild">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">GAMBAR</th> 
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td style="width: 500px;"><img src="img/<?php echo $hasil['gambar'] ?>" style="width: 30%; height: 30%;" alt=""></td>
                        <td><?php echo $hasil['desk'] ?></td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#bannerr">EDIT<i class="fa-solid fa-pen-to-square"></i></a></td>
                        
                      </tr>
                </tbody>
              </table>
        </div>
        
        <h4 class="judul pt-4">TIPE KAMAR</h4>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">TIPE</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">HARGA</th>
                  </tr>
                </thead>
                <tbody>
                <a href="" data-bs-toggle="modal" data-bs-target="#kamar">EDIT<i class="fa-solid fa-pen-to-square"></i></a>
                  <?php foreach($kamar as $keys): ?>
                    <tr>
                        <th scope="row"><?php echo $keys['id'] ?></th>
                        <td style="width: 500px;"><img src="img/<?php echo $keys['gambar'] ?>" style="width: 30%; height: 30%;" alt=""></td>
                        <td><?php echo $keys['tipe'] ?></td>
                        <td><?php echo $keys['desk'] ?></td>
                        <td><?php echo $keys['harga'] ?></td>
                        
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

        <h4 class="judul pt-4">TENTANG</h4>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td style="width: 500px;"><img src="img/<?php echo $hasil2['gambar'] ?>" style="width: 30%; height: 30%;" alt=""></td>
                        <td><?php echo $hasil2['desk']?></td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#about">EDIT<i class="fa-solid fa-pen-to-square"></i></a></td>
                        
                      </tr>
                </tbody>
              </table>

        <h4 class="judul pt-4">GALERI</h4>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">DESKRIPSI</th>
                  </tr>
                </thead>
                <tbody >
                <a href="" data-bs-toggle="modal" data-bs-target="#galeri">EDIT<i class="fa-solid fa-pen-to-square"></i></a>
                <?php foreach($galeri as $keys): ?>  
                  <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td style="width: 500px;"><img src="img/<?php echo $keys['gambar'] ?>" style="width: 30%; height: 30%;" alt=""></td>
                    <td><?php echo $keys['desk'] ?></td>
                    
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

              <h4 class="judul pt-4">FASILITAS</h4>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">DESKRIPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <a href="" data-bs-toggle="modal" data-bs-target="#fasilitas">EDIT<i class="fa-solid fa-pen-to-square"></i></a>
                  <?php foreach($fasilitas as $keys): ?>
                    <tr>
                        <th scope="row"><?php echo $keys['id'] ?></th>
                        <td style="width: 500px;"><img src="img/<?php echo $keys['gambar'] ?>" style="width: 30%; height: 30%;" alt=""></td>
                        <td><?php echo $keys['nama'] ?></td>
                        <td><?php echo $keys['desk'] ?></td> 
                    </tr>
                </tbody>
                <?php endforeach; ?>
              </table>

      </div>

      <!--modelbanner-->
      <div class="modal fade" tabindex="-1" id="bannerr">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action="function.php" method="post">
                <div class="mb-2">
                  <label for="gambar" class="form-label" >Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                <div class="mb-2">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
              </div>
              
             </form>

          </div>
        </div>
      </div>

      <!--modelkamar-->
      <div class="modal fade" tabindex="-1" id="kamar">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action = "function.php" method="post">
                  <div class="mb-2">
                    <label for="ktp" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="ktp" name="gambar" required>
                  </div>
                  
                  <div class="mb-2">
                      <label for="deskripsi" class="form-label">Deskripsi </label>
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                  </div>
                  
                  <div class="mb-2">
                      <label for="no" class="form-label">No</label>
                      <input type="text" class="form-control" id="no" name="no" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name = "simpan_kamar" >Simpan</button>
                </div>
              </form>

          </div>
        </div>
      </div>

      <!--modelabout-->
      <div class="modal fade" tabindex="-1" id="about">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action = "function.php" method = "post">
                <div class="mb-2">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                <div class="mb-2">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>
            </div>
              
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name = "simpan2">Simpan</button>
                </div>
              </form>
              
          </div>
        </div>
      </div>

      <!--modelgaleri-->
      <div class="modal fade" tabindex="-1" id="galeri">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action = "function.php" method = "post">
                <div class="mb-2">
                  <label for="ktp" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="ktp" name = "gambar" required>
                </div>
                <div class="mb-2">
                  <label for="Username" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="Username" name = "deskripsi" required>
                </div>
                <div class="mb-2">
                  <label for="no" class="form-label">No</label>
                  <input type="text" class="form-control" id="no" name = "no" required>
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name = "simpan_galeri">Simpan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      
      <!--modelfasilitas-->
      <div class="modal fade" tabindex="-1" id="fasilitas">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action = "function.php" method="post">
                  <div class="mb-2">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                  </div>
                  
                  <div class="mb-2">
                      <label for="nama" class="form-label">Nama Fasilitas</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>

                  <div class="mb-2">
                    <label for="deskripsi" class="form-label">Deskripsi !!Masukkan perintah br untuk pindah baris</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                  </div>

                  <div class="mb-2">
                      <label for="no" class="form-label">No</label>
                      <input type="text" class="form-control" id="no" name="no" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name = "fasilitas" >Simpan</button>
                </div>
              </form>

          </div>
        </div>
      </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

