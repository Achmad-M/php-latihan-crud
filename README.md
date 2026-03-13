Dari kode `index.php` yang kamu berikan, terlihat bahwa aplikasi ini menampilkan data produk dengan kolom: `id`, `nama_produk`, `harga_satuan`, `jumlah_barang`, dan menghitung `harga_total`. Tabel yang digunakan di database disebut `crud`.

Berikut adalah **struktur tabel database MySQL** yang sesuai dengan kode tersebut:

```sql
CREATE DATABASE IF NOT EXISTS praktikum_pbo_crud;
USE praktikum_pbo_crud;

CREATE TABLE `crud` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama_produk` VARCHAR(255) NOT NULL,
    `harga_satuan` DECIMAL(10,2) NOT NULL,
    `jumlah_barang` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
);
```

### Penjelasan:

1. **`id`** → primary key, auto increment untuk setiap produk baru.
2. **`nama_produk`** → nama produk (string), sesuai dengan kolom `Nama Produk` di tabel.
3. **`harga_satuan`** → harga per unit, pakai tipe `DECIMAL(10,2)` agar bisa menyimpan angka desimal dengan presisi 2 digit di belakang koma.
4. **`jumlah_barang`** → jumlah stok produk (integer).
5. **`harga_total_dari_produk`** → tidak perlu disimpan di database karena dihitung secara dinamis di PHP (`harga_satuan * jumlah_barang`).
