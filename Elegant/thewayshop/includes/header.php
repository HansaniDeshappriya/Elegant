<?php include 'includes/database.php';
session_start();
if(isset($_SESSION['customerId'])){
  $customer = $_SESSION['customerId'];
}
$subtotal = 0;
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ELEGANT</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=p7nOyFKdNRotMfoH7ClEx4WycgAyolfnFZOwCR4gxh3L3qvBy62dqroj4UMUJf8PLayezvXFOma9KOZtUhXAgA" charset="UTF-8"></script></head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right-phone-box">
                        <p>Call US :- <a href="#"> 011-2752750</a></p>
                    </div>
                    <div class="our-link">
                    </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo1.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>

                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <li><a href="shop.php?category=<?php echo $row['catId']; ?>"><?php echo $row['categoryName']; ?></a></li>
                            <?php } ?>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <!-- <li class="login/Register"><a href="#"><i class="fa fa-login"></i></a></li> -->
                        <?php if(isset($_SESSION['customerId'])){
                            echo '<li class="login"><a href="my-account.php"><i class="fa fa-user"></i></a></li>';
                            echo '<li class="login"><a href="logout.php"><i class="fa fa-sign-out"></i></a></li>';
                        }else{
                        echo '<li class="login"><a href="login.php"><i class="fa fa-user"></i></a></li>';
                        } ?>

                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                      <?php

                        $sql = "SELECT * FROM cartitem ct INNER JOIN cart c ON c.cartId=ct.cartId
                        INNER JOIN product p ON p.id = ct.productId
                        WHERE c.customerId='$customer' AND c.status='open'";
                        if($result = mysqli_query($conn, $sql)){
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo $row['image']; ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $row['proName']; ?></a></h6>
                            <p>1x - <span class="price">Rs. <?php echo number_format($row['price'], 2); ?></span></p>
                        </li>
                        <?php   $subtotal = $subtotal + $row['price']; } }?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: <?php echo number_format($subtotal, 2) ?></span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
