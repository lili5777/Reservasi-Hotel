<?php 
 include 'function.php';
$login = @$_GET['login'];
$username = @$_GET['username'];

$data = mysqli_query($database, "SELECT * FROM pelanggan WHERE username = '$username'");
$hasil = mysqli_fetch_assoc($data);

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="fontasome/css/all.css">
  </head>
  <body>
    
    <!--navbar-->
    <?php if($login == "true"):?>
      <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="" width="35" height="35" class="d-inline-block align-text-top mx-2">
            <span class="fw-bold text-white">ALTA HOTEL</span>
          </a>
          <div class="d-flex flex-row bd-highlight">
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>">Beranda</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#roomm">Kamar</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="fasilitas.php?login=<?php if($login==NULL){echo 'false';}else{echo $login;}?>&username=<?php echo $username?>">Fasilitas</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#about">Tentang</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=true&username=<?php echo $username?>#Galery">Galeri</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="hal_user.php?username=<?php echo $username;?>">Profil</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php?login=false">Keluar</a></div>
          </div>
        </div>
    </nav>
    <?php endif;?>
    <?php if($login == NULL || $login == "false"):?>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="" width="35" height="35" class="d-inline-block align-text-top mx-2">
            <span class="fw-bold text-white">ALTA HOTEL</span>
          </a>
          <div class="d-flex flex-row bd-highlight">
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="home.php">Beranda</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="#roomm">Kamar</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="fasilitas.php">Fasilitas</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="#about">Tentang</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" href="#Galery">Galeri</a></div>
            <div class="p-2 bd-highlight"><a class="sub nav-link fw-bold" data-bs-toggle="modal" data-bs-target="#loginn" href="#">Masuk</a></div>
          </div>
        </div>
      </nav>
      <?php endif;?>
      <!--content-->
    <div class="container py-5">
        <div class="row">

            <!--kiri-->
            <div class="col-lg-4">
                <div class="card text-center p-3 shadow">
                    <div class="card-body">
                        <img class="img img-thumbnail rounded-circle w-80" src="img/icon_user.PNG" alt="profil">
                        <h2><?php echo $hasil['nama'] ?></h2>
                    </div>
                </div>
            </div>

            <!--kanan-->
            <div class="col-lg-8">
                <div class="shadow p-4 mb-3">
                    <h3>INFORMASI SAYA</h3><hr>
                    <div class="row">

                        <!--kiri-->
                        <form action="function.php" method="post">
                        <div class="col-lg-5">
                            <p class="card-text">
                                <label class="form-label" for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama" name="in_nama" value="<?php echo $hasil['nama'] ?>">
                            </p>
                            <p class="card-text">
                                <label class="form-label" for="ktp">No.Ktp</label>
                                <input class="form-control" type="text" id="ktp" name="in_ktp" value="<?php echo $hasil['Ktp'] ?>">
                            </p>
                            <p class="card-text">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input class="form-control" type="text" id="alamat" name="in_alamat" value="<?php echo $hasil['Alamat'] ?>">
                            </p>
                            <p class="card-text">
                                <label class="form-label" for="no">No.Tlp</label>
                                <input class="form-control" type="text" id="no" name="in_nmr" value="<?php echo $hasil['Nmr'] ?>">
                            </p>
                            <BUtton type="submit" class="btn btn-primary fw-bold" name="ubah1" value="<?php echo $hasil['id'] ?>">Ubah Data</BUtton>
                        </div>
                        </form>
                    </div>

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