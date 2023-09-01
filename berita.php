<?php
// buat koneksi database dengan connect file
include("connect.php");

session_start();

// fetch semua data motor dari database
$id_berita = $_GET['id_berita'];
$hasil = mysqli_query($connection, "SELECT * FROM  master_berita WHERE id_berita = '$id_berita'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  <title>Portal Berita</title>
</head>

<body>

  <?php
  
  if (isset($_SESSION['username'])) {
  ?>
    <a href="master-berita.php" type="button" class="btn btn-danger mx-2">Back</a>
  <?php
  }else{
  ?>
    <a href="home.php" type="button" class="btn btn-danger mx-2">Back</a>
  <?php
  }
  ?>


<!-- berita -->
<div class="container">
  <?php
    // Loop through the query results
    while ($row = mysqli_fetch_assoc($hasil)) {
      
      $judulBerita = $row['judul_berita'];
      $isiBerita = $row['deskripsi_berita'];
      $gambarBerita = $row['gambar_berita'];
  ?>
  <div class="w-100 d-flex justify-content-center">
    <div class="news-item w-75">
      <h2 class="text-center mt-3 "><?php echo $judulBerita; ?></h2>
      <div class="text-center">
        <img width="500" src="<?php echo $gambarBerita; ?>" alt="Gambar Berita">
      </div>
      <p class="mt-3"><?php echo $isiBerita; ?></p>
      <hr> <!-- Optional: Add a horizontal line between news items -->
    </div>
  </div>
  <?php
    }
  ?>
</div>
</body>

</html>