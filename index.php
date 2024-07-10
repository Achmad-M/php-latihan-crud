<?php
// Langkah pertama adalah mengimpor file koneksi database
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <!-- Mengimpor Bootstrap CSS untuk styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Mengimpor Font Awesome CSS untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Praktikum PBO CRUD</title>
</head>

<body>
  <!-- Header navigasi -->
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
    Praktikum PBO CRUD
  </nav>

  <div class="container">
    <?php
    // Menampilkan pesan jika ada (contoh: notifikasi setelah aksi CRUD)
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <!-- Tombol untuk menambah data baru -->
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <!-- Tabel untuk menampilkan data -->
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga Satuan</th>
          <th scope="col">Jumlah Barang</th>
          <th scope="col">Harga Total</th>
          <th scope="col">Action</th> 
        </tr>
      </thead>
      <tbody>
      <?php
// Mengambil data dari database dan menampilkannya dalam tabel
$sql = "SELECT * FROM `crud`";
$result = mysqli_query($conn, $sql);

$increment = 1; // Variabel untuk increment
$totalharga = 0; // Variabel untuk mengakumulasi total harga

while ($row = mysqli_fetch_assoc($result)) {
$harga_satuan = $row["harga_satuan"];
    $jumlah_barang = $row["jumlah_barang"];
    $harga_total_dari_produk = $harga_satuan * $jumlah_barang;

    // Memperbarui array $row dengan harga_total_dari_produk
    $row["harga_total_dari_produk"] = $harga_total_dari_produk;

     // Menambahkan harga_total_dari_produk ke totalharga
     $totalharga += $harga_total_dari_produk;
?>
  <tr>
    <td id="td<?php echo $increment; ?>" ><?php echo $increment; ?></td>
    <td ><?php echo $row["nama_produk"] ?></td>
    <td ><?php echo $row["harga_satuan"] ?></td>
    <td ><?php echo $row["jumlah_barang"] ?></td>
    <td ><?php echo $row["harga_total_dari_produk"] ?></td>
    <td>
      <!-- Tombol untuk mengedit dan menghapus data -->
      <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
      <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
    </td>
  </tr>
<?php
  $increment++; // Melakukan increment setiap kali perulangan
}
?>

      </tbody>
    </table>
  </div>
  <div class="container-sm">
<!-- Sekarang $totalharga berisi jumlah total dari kolom harga_total_dari_produk -->
<h4>Total Harga: <?php echo "$totalharga" ?></h4>
  </div>

  <!-- Mengimpor Bootstrap JavaScript untuk fungsionalitas tambahan -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
