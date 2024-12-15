<?php 
include "function.php";
$tipe_kamar = Ambil("SELECT * FROM tipe_kamar");
$kamar = Ambil("SELECT * FROM kamar");
$no = 1;

//=======================

//======================
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
        <h3><i class="fa-solid fa-house me-3"></i>KAMAR</h3><hr>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahkamar">Tambah Tipe Kamar</button>

        <div class="row text-dark">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NAMA</th>
                <th scope="col">HARGA</th>
                <th scope="col">SINGKATAN</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($tipe_kamar as $keys): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $keys['tipe']?></td>
                <td><?php echo $keys['harga']?></td>
                <td><?php echo $keys['singkatan']?></td>
                <td><a href="hal_edit2.php?id=<?php echo $keys['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="function.php?hapus_tipe=<?php echo $keys['id']; ?>"><i class="fa-solid fa-trash "></i></a></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <button class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#tambahnokamar">Tambah No.Kamar</button>

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">TIPE</th>
              <th scope="col">NO</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tipe_kamar as $akmal):?>
            <tr>
              <td><?php echo $akmal['tipe'];?></td>
              <td>
              <?php foreach($kamar as $keys){
                if($keys['tipe']==$akmal['tipe'] && $keys['status']=='FALSE'){
                 $id = $keys['id'];
                 
                  echo '<span style="text-align:center;background:GREEN; border-radius:5px; color:white;  margin-left:5px; padding:5px;"> ' . $id.  '</span>';
                }elseif($keys['tipe']==$akmal['tipe'] && $keys['status']=='TRUE'){
                  $id = $keys['id'];
                 
                  echo '<span style="text-align:center; background:RED;  border-radius:5px; color:white; margin-left:5px; padding:5px;"> ' . $id.  '</span>';
                }elseif($keys['tipe']==$akmal['tipe'] && $keys['status']=='ORDER'){
                  $id = $keys['id'];
                 
                  echo '<span style="text-align:center; background:ORANGE;  border-radius:5px; color:white; margin-left:5px; padding:5px;"> ' . $id.  '</span>';
                }
              }?>
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table>

        <button class="btn btn-primary me-3 " data-bs-toggle="modal" data-bs-target="#resetkamar">Reset Kamar</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resetstatuskamar">Reset Status Kamar</button>


      </div>

      <!--modal1-->
      <div class="modal fade" tabindex="-1" id="tambahkamar">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">TAMBAH TIPE KAMAR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action='function.php' method='post'>
                <div class="mb-2">
                  <label for="namakamar" class="form-label">Nama Kamar</label>
                  <input type="text" class="form-control" id="namakamar" name="in_nama">
                </div>
                <div class="mb-2">
                  <label for="deskripsi" class="form-label">Singkatan</label>
                  <input type="text" class="form-control" id="deskripsi" name="in_singkatan">
                </div>
                <div class="mb-2">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control" id="harga" name="in_harga">
                </div>
              
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name='tambah_tipe'>Simpan</button>
            </div>
            </form>

          </div>
        </div>
      </div>

      <!--modal2-->
      <div class="modal fade" tabindex="-1" id="tambahnokamar">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">TAMBAH NO.KAMAR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action='function.php' method='post'>
                <div class="mb-2">
                  <label for="pilih" class="form-label fw-bold">Tipe Kamar</label>

                  <select class="form-select" aria-label="Default select example" id="pilih" name='in_tipe'>
                  <?php foreach($tipe_kamar as $keys):?>
                    <option value="<?php echo $keys['tipe']?>"><?php echo $keys['tipe'];?></option>
                  <?php endforeach;?>
                  </select>
                </div>

                <div class="mb-2">
                  <label for="idd" class="form-label">No.Kamar</label>
                  <input type="number" class="form-control" id="idd" name='in_id'>
                </div>
               
              
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name='kamar'>Simpan</button>
            </div>
            </form>

          </div>
        </div>
      </div>
      

      <!--modal reset kamar-->
      <div class="modal fade" tabindex="-1" id="resetkamar">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">PERINGATAN</h5>
            </div>
            <div class="modal-body">
              <p>Apa anda yakin ingin mereset kamar?</p>
            </div>
            <form action="function.php" method="post">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="reset_kmr">Ya</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!--modal reset status kamar-->
      <div class="modal fade" tabindex="-1" id="resetstatuskamar">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">PERINGATAN</h5>
            </div>
            <div class="modal-body">
              <p>Apa anda yakin ingin mereset  status kamar?</p>
            </div>
            <form action="function.php" method="post">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="reset_sts">Ya</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>