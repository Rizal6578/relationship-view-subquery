<?php
include 'koneksi.php';

// Ambil ID produk dari parameter URL
$product_id = $_GET['id'];

// Query untuk mendapatkan data produk berdasarkan ID
$query = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Query untuk mendapatkan data kategori
$query_categories = "SELECT * FROM categories";
$categories = mysqli_query($koneksi, $query_categories);
?>

<form action="process_edit_product.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    Nama Produk: <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required><br>
    Kategori: 
    <select name="category_id">
        <?php
        while ($category = mysqli_fetch_assoc($categories)) {
            $selected = ($category['category_id'] == $row['category_id']) ? "selected" : "";
            echo "<option value='{$category['category_id']}' $selected>{$category['category_name']}</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Update Produk">
</form>
