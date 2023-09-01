<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Portal Berita</title>
</head>

<body>

  <div class="container w-100 d-flex justify-content-center">
        <div class="w-50 text-light p-4 rounded bg-dark" style="margin-top: 10%;">
            <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                <h4 class="login-text">Tambah Berita</h4>
                <label for="judul_berita" class="form-label">Judul Berita</label>
                <div class="input-group mb-3 text-start">
                  <input type="text" class="form-control" name="judul_berita">
                </div>
                <label for="gambar_berita" class="form-label">Gambar Berita</label>
                <div class="input-group mb-3 text-start">
                  <input type="file" class="form-control" name="gambar_berita" >
                </div>
                <label for="deskripsi_berita" class="form-label">Deskripsi Berita</label>
                <div class="input-group mb-3 text-start">
                  <textarea class="form-control"  name="deskripsi_berita"></textarea>
                </div>
                <div class="input-group mb-3 text-start">
                  <button name="submit" type="submit" class="btn btn-primary " onclick="return confirm('yakin dek??');">Submit</button>
                  <a href='master-berita.php' class="btn btn-danger ">Cancel</a>
                </div>
            </form>
        </div>
    </div>

  <?php
  if (isset($_POST['submit'])) {
    $judul_berita = $_POST['judul_berita'];
    $deskripsi_berita = $_POST['deskripsi_berita'];

    if (isset($_FILES['gambar_berita']) && $_FILES['gambar_berita']['error'] === UPLOAD_ERR_OK) {
      $gambar_berita = $_FILES['gambar_berita']['name'];
      $gambar_temp = $_FILES['gambar_berita']['tmp_name'];
      $gambar_path = 'uploads/' . $gambar_berita; // Make sure 'uploads/' matches the correct directory path

      if (move_uploaded_file($gambar_temp, $gambar_path)) {
        include("connect.php");

        $hasil = mysqli_query($connection, "INSERT INTO master_berita (judul_berita, deskripsi_berita, gambar_berita) VALUES ('$judul_berita', '$deskripsi_berita', '$gambar_path')");

        if ($hasil) {
          echo "<script>alert('Selamat Update Berhasil')</script>";
          header("Location: master-berita.php");
        } else {
          echo "Gagal menambahkan data berita: " . mysqli_error($connection);
        }
      } else {
        echo "Gagal mengunggah gambar.";
      }
    } else {
      echo "Tidak ada gambar yang diunggah.";
    }
  }

  ?>

</body>

</html>