<?php
// Mengatur informasi server database
$servername = "localhost"; // Alamat server database 
$username = "root"; // Username database Anda jika perlu
$password = ""; // Password database jika perlu
$dbname = "php-crud"; // Database yang ingin digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil atau tidak
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Jika koneksi berhasil, Anda dapat memperoleh pesan "Connected successfully" dengan menghapus tanda komentar pada baris berikut:
// echo "Connected successfully";
?>
