<?php
// Mengimpor file koneksi ke database
include "db_conn.php";

// Memeriksa apakah form telah disubmit
if (isset($_POST["submit"])) {
   // Mengambil data dari form
   $nama_produk = $_POST['nama_produk'];
   $harga_satuan = $_POST['harga_satuan'];
   $jumlah_barang = $_POST['jumlah_barang'];


   // Membuat query SQL untuk memasukkan data ke database
   $sql = "INSERT INTO `crud`(`id`, `nama_produk`, `harga_satuan`,`jumlah_barang`) VALUES (NULL,'$nama_produk','$harga_satuan','$jumlah_barang')";

   // Menjalankan query SQL
   $result = mysqli_query($conn, $sql);

   // Memeriksa apakah operasi penyimpanan berhasil
   if ($result) {
      // Jika berhasil, redirect ke halaman utama dengan pesan sukses
      header("Location: index.php?msg=New record created successfully");
   } else {
      // Jika gagal, tampilkan pesan error
      echo "Failed: " . mysqli_error($conn);
   }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Pengaturan awal halaman -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Mengimpor Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Judul halaman -->
   <title>Praktikum PBO CRUD</title>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
   Praktikum PBO CRUD
   </nav>

   <div class="container">
      <!-- Judul form -->
      <div class="text-center mb-4">
         <h3>Add New Product</h3>
         <p class="text-muted">Complete the form below to add a new product</p>
      </div>

      <!-- Form untuk menambahkan produk baru -->
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <!-- Kolom input untuk Nama Produk dan Harga Produk -->
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nama Produk:</label>
                  <input type="text" class="form-control" name="nama_produk" placeholder="Nabati Keju">
               </div>

               <div class="col">
                  <label class="form-label">Harga Satuan:</label>
                  <input type="text" class="form-control" name="harga_satuan" placeholder="1000">
               </div>

               <div class="col">
                  <label class="form-label">Jumlah Barang:</label>
                  <input type="text" class="form-control" name="jumlah_barang" placeholder="1">
               </div>

            </div>

            <!-- Tombol untuk menyimpan dan membatalkan -->
            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Mengimpor Bootstrap JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
