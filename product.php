<?php
// Koneksi ke database
include 'koneksi.php';

// Query untuk mendapatkan data produk dan kategorinya
$query = "SELECT products.*, categories.category_name
          FROM products
          JOIN categories ON products.category_id = categories.category_id";
$result = mysqli_query($koneksi, $query);

// Tampilkan data produk dan kategori
echo "<table border='1'>
        <tr>
          <th>ID Produk</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['category_name']}</td>
            <td>
                <a href='edit_product.php?id={$row['product_id']}'>Edit</a>
                <a href='delete_product.php?id={$row['product_id']}'>Delete</a>
            </td>
          </tr>";
}

echo "</table>";
?>
