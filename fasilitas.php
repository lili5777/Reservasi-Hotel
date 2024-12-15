<?php 
  include "function.php";
  $fasilitas = Ambil("SELECT * FROM fasilitas");
  $login = @$_GET['login'];
  $username = @$_GET['username'];

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
    <?php if($login == true):?>
      <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="" width="35" height="35" class="d-inline-block align-text-top mx-2">
            <span class="fw-bold text-white">ALTA HOTEL</span>
          </a>
          <div class="d-flex flex-row bd-highlight">
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>">Beranda</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true#roomm">Kamar</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="fasilitas.php?login=true&username=<?php echo $username?>">Fasilitas</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#about">Tentang</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#Galery">Galeri</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="hal_user.php?username=<?php echo $username?>">Profil</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=false">Keluar</a></div>
          </div>
        </div>
    </nav>
    <?php endif;?>
    <?php if($login == NULL || $login==FALSE):?>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="" width="35" height="35" class="d-inline-block align-text-top mx-2">
            <span class="fw-bold text-white">ALTA HOTEL</span>
          </a>
          <div class="d-flex flex-row bd-highlight">
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php">Beranda</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php#roomm">Kamar</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="fasilitas.php">Fasilitas</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php#about">Tentang</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php#Galery">Galeri</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" data-bs-toggle="modal" data-bs-target="#loginn" href="#">Masuk</a></div>
          </div>
        </div>
      </nav>
      <?php endif;?>

     <!--modal2 login-->
     <div class="modal fade" id="loginn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">MASUK</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
          <div class="modal-body">
            <form action="function.php" method="post">
              <div class="mb-2">
                <label for="Username" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="Username" name="username">
              </div>
              <div class="mb-2">
                <label for="Password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="Password" name="password">
              </div>
              <div class="mb-2">
                <label for="pilih" class="form-label">Pengguna</label>
                <select class="form-select" aria-label="Default select example" id="pilih" name='jenis'>
                  <option selected>Silahkan Pilih</option>
                  <option value="1">User</option>
                  <option value="2">Admin</option>
                </select>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#daftar">Daftar</button>
            <button type="submit" class="btn btn-primary" name="akun">Masuk</button>
          </div>
          </form>
  
          </div>
        </div>  
      </div>
  
      <!-- Modal daftar -->
      <div class="modal fade" id="daftar" tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Isi Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
            <form action="function.php" method="post">
              <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-2">
                <label for="ktp" class="form-label">No.KTP</label>
                <input type="text" class="form-control" id="ktp" name="in_ktp">
              </div>
              <div class="mb-2">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="in_nama">
              </div>
              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="in_alamat">
              </div>
              <div class="mb-2">
                <label for="hp" class="form-label">No. HP</label>
                <input type="number" class="form-control" id="hp" name="in_nmr">
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="tambah" value='2'>Daftar</button>
            </div>
            </form>
        </div>
        </div>  
      </div>

    <!--fasilitas-->
    <div class="fasilitas text-center" >
        <div class="container-fluid py-5" >
          <div class="container">
            <h2 class="text-center mb-3 fw-bold text-white">Fasilitas</h2>
            <div class="row d-flex justify-content-between">
              <?php foreach($fasilitas as $keys): ?>
              <!--card1-->
              <div class="cardnew1 col-lg-4 col-md-6 mb-3" style="height: 300px;
                    width: 350px;
                    border: 2px solid rgb(255, 255, 255);
                    padding: 0;
                    background-image: url('img/<?php echo $keys['gambar'] ?>');
                    background-size: cover;
                    border-radius: 10px;
                    position: relative;
                    overflow: hidden;
                    margin: 0px 10px;">
                    <div class="card-body">
                     <div class="judul1">
                    <h3><?php echo $keys['nama'] ?></h3>
                  </div>
                  <div class="pop">
                  <p><b><?php echo $keys['desk'] ?></b></p>
                  </div> 
                    </div>
                
              </div>
              <?php endforeach; ?>
             

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