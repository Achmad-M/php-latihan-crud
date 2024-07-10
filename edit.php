<?php
// Memasukkan file koneksi ke database
include "db_conn.php";

// Mengambil ID dari URL
$id = $_GET["id"];

// Memeriksa jika form telah disubmit
if (isset($_POST["submit"])) {
  // Mengambil data dari form
  $nama_produk = $_POST['nama_produk'];
  $harga_satuan = $_POST['harga_satuan'];
  $jumlah_barang = $_POST['jumlah_barang'];

  // Membuat SQL untuk mengupdate data di database
  $sql = "UPDATE `crud` SET `nama_produk`='$nama_produk',`harga_satuan`='$harga_satuan',`jumlah_barang`='$jumlah_barang' WHERE id = $id";

  // Menjalankan query SQL dan menyimpan hasilnya
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah pembaruan data berhasil
  if ($result) {
    // Mengarahkan pengguna ke halaman utama dengan pesan sukses
    header("Location: index.php?msg=Data updated successfully");
  } else {
    // Menampilkan pesan error jika pembaruan gagal
    echo "Failed: " . mysqli_error($conn);
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Mengimpor Bootstrap CSS untuk tampilan yang lebih baik -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>PBO PHP CRUD</title>
</head>

<body>
  <!-- Membuat navbar untuk judul halaman -->
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
  PBO PHP CRUD
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <!-- Menampilkan judul halaman -->
      <h3>Edit Product Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    // Mengambil data pengguna yang akan diedit dari database
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <!-- Membuat form untuk mengedit informasi produk -->
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nama Produk:</label>
            <!-- Menampilkan kolom untuk mengedit nama produj -->
            <input type="text" class="form-control" name="nama_produk" value="<?php echo $row['nama_produk'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Harga Satuan:</label>
            <!-- Menampilkan kolom untuk mengedit harga satuan -->
            <input type="text" class="form-control" name="harga_satuan" value="<?php echo $row['harga_satuan'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Jumlah Barang:</label>
          <!-- Menampilkan kolom untuk mengedit jumlah barang -->
          <input type="text" class="form-control" name="jumlah_barang" value="<?php echo $row['jumlah_barang'] ?>">
        </div>

        <div>
          <!-- Tombol untuk menyimpan perubahan dan membatalkan -->
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Mengimpor Bootstrap JavaScript untuk fitur tambahan -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
