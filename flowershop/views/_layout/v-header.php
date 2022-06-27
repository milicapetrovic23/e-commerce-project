<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/theme/css/bootstrap.css">
    <title>Shop</title>
</head>
<body>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg bg-light p-0">
            <div class="container">
                <a class="navbar-brand text-light col-3 ml-5" href="./">
                    <img src="public/theme/img/logo1.png" alt="All Plants" width="60%">
                </a>
                <div class="col-6">
                    <ul class="navbar-nav row">
                        <li class="nav-item col">
                            <a class="
                                nav-link
                                <?php if($page == 'index') {
                                echo htmlspecialchars('active');
                                } ?>
                                " href="./">HOME</a>
                        </li>
                        <li class="nav-item col">
                            <a class="
                                nav-link
                                <?php if($page == 'all-products-page') {
                                echo htmlspecialchars('active');
                                } ?>
                                " 
                                href="./all-products-page.php"
                                >
                                PRODUCTS
                            </a>
                        </li>
                        <li class="nav-item col">
                            <a class="nav-link" href="./about-us-page.php">ABOUT US</a>
                        </li>
                        <li class="nav-item col">
                            <a class="nav-link" href="./contact-us-page.php">CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <div class="col-1"></div>
                <div class="row">
                <a class="nav-link position-relative col" href="./login-page.php">
                        <img src="public/theme/img/account.png" alt="Your Account" width="60%">
                    </a>
                    <a class="nav-link position-relative col" href="./shopping-cart-page.php">
                        <img src="public/theme/img/cart.png" alt="Shopping Cart" width="60%">
                        <?php 
                            if(!empty($_SESSION['cart'])) { ?>
                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                                <?php    echo count($_SESSION['cart']); ?>
                        </span>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </nav>
    </header>