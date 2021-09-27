<?php
include 'includes/database.php';

if($_GET['confirm'] !== 0){
  $cart = $_GET['cart'];
  $amount = $_GET['total'];
  $date = date("Y-m-d");

  $sql = "INSERT INTO checkout (date, cartId, amount) VALUES ('$date', '$cart', '$amount')";

  if(mysqli_query($conn, $sql)){
    $sql ="UPDATE cart SET status = 'close' WHERE cart.cartId = '$cart'";

    if(mysqli_query($conn, $sql)){
      header('Location: my-account.php');
    }
  }
}

?>
