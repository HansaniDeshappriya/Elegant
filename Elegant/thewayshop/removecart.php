<?php
include 'includes/database.php';
session_start();

if(isset($_SESSION['customerId'])){
  $cartItem = $_GET['cartItem'];

  $sql = "DELETE FROM cartitem WHERE cartitem.cartItemId = '$cartItem'";
  if(mysqli_query($conn, $sql)){
    header('Location: cart.php');
  }
}


?>
