<!-- Connect DB -->
<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "squad_ml";

$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, $database);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete.css">
    <title>Delete Product</title>
</head>

<body>
     <!-- Top bar -->
     <ul class="x-top-bar">
        <div class="left">
            <li>
                <a href="#" class="x-nav-href">
                    <img src="images/jersey-retro-high-resolution-logo.png" alt="Logo" class="x-logo"> 
                </a>
            </li>
        </div>
        <div class="middle">
            <li class="x-nav">
                <a href="index.php" class="x-nav-href">
                    <span>Home</span>
                </a>
            </li>
            <li class="x-nav">
                <a href="about.php" class="x-nav-href">
                    <span>About</span>
                </a>
            </li>
            <li class="x-nav">
                <a href="add.php" class="x-nav-href">
                    <span>Add Product</span>
                </a>
            </li>
            <li class="x-nav">
                <a href="delete.php" class="x-nav-href">
                    <span>Delete Product</span>
                </a>
            </li>
        </div>
        <div class="right">
            <li class="x-modern-cart">
                <i class='bx bx-cart'></i>
                <span class="x-cart-quantity">0</span>
            </li>
        </div>
    </ul>

    <!-- Get All Image from Database -->
    <?php
    $query = mysqli_query($connection, "SELECT * FROM products");

    // Check if a delete request is sent
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $idToDelete = $_GET['id'];
        $deleteQuery = "DELETE FROM products WHERE id = $idToDelete";
        mysqli_query($connection, $deleteQuery);
    }

    echo '<div class="table-product">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Product Image</th>';
    echo '<th>Product Name</th>';
    echo '<th>Product Description</th>';
    echo '<th>Product Price</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';

    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row["id"];
        $name = $row["product_name"];
        $description = $row["product_description"];
        $price = $row["product_price"];
        $image = $row["product_image"];

        echo '<tbody>';
        echo '<tr>';
        echo '<td><img class="x-product-image" src="' . $image . '" alt="' . $name . '"></td>';
        echo '<td><span class="x-product-name">' . $name . '</span></td>';
        echo '<td><div class="x-product-description-overlay">' . '<span class="x-product-description">' . $description . '</span>' . '</div></td>';
        echo '<td><span class="x-product-price">' . 'RM ' . $price . '</span></td>';
        echo '<td><button type="button" class="delete-btn" onclick="deleteProduct(' . $id . ')">Delete</button></td>';
        echo '</tr>';
        echo '</tbody>';
    }
    echo '</table>';
    echo '</div>';
    // Always Close Connection At The End of Your PHP for A Good Practice
    mysqli_close($connection);
    ?>

    <script>
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = '?action=delete&id=' + productId;
            }
        }
    </script>

</body>

</html>