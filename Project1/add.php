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

// Add data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    //$image = "images/" . mysqli_real_escape_string($connection, $_POST['image']);

    $imageName = $_FILES['image']['name'];  // Get image upload name
    $tempName = $_FILES['image']['tmp_name'];
    $imagePath = "images/" . $imageName;
    move_uploaded_file($tempName, $imagePath);  // Move upload image into images folder

    $insertQuery = "INSERT INTO products (product_name, product_description, product_price, product_image) VALUES ('$name', '$description', '$price', '$imagePath')";

    if (mysqli_query($connection, $insertQuery)) {
        // JavaScript script for displaying a confirmation alert
        echo '<script>';
        echo 'alert("Product added successfully!");';
        echo 'window.location.href = "your_redirect_page.php";'; // Replace with the actual redirect page
        echo '</script>';
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Add Product</title>
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
    <div class="card">
        <div class="card-header">
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for=" name">Product Name:</label>
                <input type="text" id="name" name="name" placeholder=" " required>

                <label for="price">Product Price:</label>
                <input type="text" id="price" name="price" placeholder="RM 999.99" required>

                <label for="image">Product Image:</label>
                <input type="file" id="image" name="image" required>

                <label for="description">Product Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder=" "></textarea>

                <div class="card-footer">
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>