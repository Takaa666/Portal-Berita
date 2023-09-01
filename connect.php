<?php
/**
 * file connect ini berisi tentang pengaturan database
 * mysqli_connect ini digunakan untuk membuat koneksi
 */
$host = "localhost";
$user = "root";
$password = "";
$database = "portal-berita-new";
$connection = mysqli_connect($host,$user,$password,$database);
/**
 * tambahkan fungsi ini untuk mengecek kesalahan pada koneksi
 */
if($connection->connect_error)
{
    die("Koneksi Gagal");
}
