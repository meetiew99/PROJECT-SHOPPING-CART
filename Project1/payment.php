<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Payment section</title>
    <!-- favicon -->
    <link rel="icon" href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo" type="image/gif" sizes="16x16">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="orderPlaced.css">
</head>

<body>
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
        </div>
        <div class="right">
            <li class="x-modern-cart">
                <i class='bx bx-cart'></i>
                <span class="x-cart-quantity">0</span>
            </li>
        </div>
    </ul>
    <!-- OREDER PLACED -->
    <div id="orderContainer">
        <div id="check"><i class="fas fa-check-circle"></i></div>

        <div id="aboutCheck">
            <h1> Order Placed Successfully! </h1>
            <p> We've sent you an email with the Order details. </p>
        </div>
    </div>
</body>
<script src="/orderPlaced.js"></script>

</html>