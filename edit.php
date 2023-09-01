<?php
include("connect.php");


// Check if id_berita is set in the URL
  $id_berita = $_GET['id_berita'];

  // Ambil data berita berdasarkan id
  $query = "SELECT * FROM master_berita WHERE id_berita= '$id_berita'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $judul_berita = $row['judul_berita'];
  $deskripsi_berita = $row['deskripsi_berita'];
  $gambar_berita = $row['gambar_berita'];

  // update
  if(isset($_POST['update'])){
    $id_berita_baru = $_POST['id_berita'];
    $judul_berita_baru = $_POST['judul_berita'];
    $deskripsi_berita_baru = $_POST['deskripsi_berita'];
    $gambar_old = $_POST['gambar_old'];
    $gambar_baru = $_FILES['gambar_berita']['name'];
    if($gambar_baru !="") {
      $gambar_temp = $_FILES['gambar_berita']['tmp_name'];
      $gambar_path = 'uploads/' . $gambar_baru;
      move_uploaded_file($gambar_temp, $gambar_path); 
      $gambar_baru = $gambar_path;
    } else {
      $gambar_baru = $gambar_old;
    }
    $sql_update = "UPDATE master_berita SET  judul_berita = '$judul_berita_baru', deskripsi_berita = '$deskripsi_berita_baru', gambar_berita = '$gambar_baru' WHERE id_berita = '$id_berita_baru'";
    $update_action = mysqli_query($connection, $sql_update);
    if($update_action){
      echo "<script>alert('Selamat Update Berhasil')</script>";
      header("Location: master-berita.php");
    } else {
      echo "<script>alert('Silahkan coba lagi!')</script>";
      // header("Location: master-berita.php");
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <title>Edit Berita</title>
</head>

<body>
  <div class="container w-100 d-flex justify-content-center">
        <div class="w-50 text-light p-4 rounded bg-dark" style="margin-top: 10%;">
            <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                <h4 class="login-text">Edit Berita</h4>
                <input type="hidden" name="id_berita" value="<?php echo $id_berita; ?>">
                <input type="hidden" name="gambar_old" value="<?php echo $gambar_berita; ?>">
                <label for="judul_berita" class="form-label">Judul Berita</label>
                <div class="input-group mb-3 text-start">
                  <input type="text" class="form-control" name="judul_berita" value="<?php echo $judul_berita; ?>">
                </div>
                <label for="gambar_berita" class="form-label">Gambar Berita</label>
                <div class="input-group mb-3 text-start">
                  <input type="file" class="form-control" name="gambar_berita" ></input>
                </div>
                <p>img now : <span><?php echo $gambar_berita; ?></span></p>
                <label for="deskripsi_berita" class="form-label">Deskripsi Berita</label>
                <div class="input-group mb-3 text-start">
                  <textarea class="form-control"  name="deskripsi_berita"><?php echo $deskripsi_berita; ?></textarea>
                </div>
                <div class="input-group mb-3 text-start">
                  <button name="update" type="submit" class="btn btn-primary " onclick="return confirm('yakin dek??');">Submit</button>
                  <a href='master-berita.php' class="btn btn-danger ">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
