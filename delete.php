<?php
include("connect.php");

if(isset($_GET['id_berita'])) {
    $id_berita = mysqli_real_escape_string($connection, $_GET['id_berita']);

    $query = "DELETE FROM master_berita WHERE id_berita=$id_berita";
    $hasil = mysqli_query($connection, $query);

    if($hasil) {
        header("Location: master-berita.php");
        exit;
    } else {
        echo "Gagal menghapus berita: " . mysqli_error($connection);
    }
} else {
    echo "ID berita tidak ditemukan.";
}
?>
