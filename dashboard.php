<?php
include 'koneksi.php';

// Statistik sederhana
$query_products = "SELECT COUNT(*) as total_products FROM products";
$query_customers = "SELECT COUNT(*) as total_customers FROM customers";
$query_vendors = "SELECT COUNT(*) as total_vendors FROM vendors";

$result_products = mysqli_query($koneksi, $query_products);
$result_customers = mysqli_query($koneksi, $query_customers);
$result_vendors = mysqli_query($koneksi, $query_vendors);

$row_products = mysqli_fetch_assoc($result_products);
$row_customers = mysqli_fetch_assoc($result_customers);
$row_vendors = mysqli_fetch_assoc($result_vendors);
?>

<!-- Tampilkan statistik sederhana -->
<div>Total Produk: <?php echo $row_products['total_products']; ?></div>
<div>Total Pelanggan: <?php echo $row_customers['total_customers']; ?></div>
<div>Total Vendor: <?php echo $row_vendors['total_vendors']; ?></div>
