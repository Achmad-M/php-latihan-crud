<?php
// Mengimpor file koneksi ke database
include "db_conn.php";

// Mengambil nilai 'id' dari parameter GET untuk penghapusan data
$id = $_GET["id"];

// Membuat pernyataan SQL untuk menghapus data dari tabel 'crud' berdasarkan 'id'
$sql = "DELETE FROM `crud` WHERE id = $id;";

// Menjalankan pernyataan SQL dan menyimpan hasilnya dalam variabel '$result'
$result = mysqli_query($conn, $sql);

// Memeriksa apakah operasi penghapusan berhasil
if ($result) {
  // Jika berhasil, redirect ke halaman utama dengan pesan sukses
  header("Location: index.php?msg=Data deleted successfully");
} else {
  // Jika gagal, tampilkan pesan error beserta pesan dari MySQL
  echo "Failed: " . mysqli_error($conn);
}
?>
