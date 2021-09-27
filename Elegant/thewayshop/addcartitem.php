<?php
include 'includes/database.php';
session_start();

if(isset($_SESSION['customerId'])){

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $product = $_POST['product'];
    $qty = $_POST['qty'];
  }else{
    $product = $_GET['product'];
    $qty = $_GET['qty'];
  }

    $customer = $_SESSION['customerId']; // Customer Id
    $date = date("Y-m-d");

    // Check for open cart
    $sql = "SELECT * FROM cart WHERE customerId='$customer' AND status='open'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 0){
      // Create a new cart for user
      $sql = "INSERT INTO cart (customerId, status) VALUES ('$customer', 'open')";
      mysqli_query($conn, $sql);

      $cart = mysqli_insert_id($conn); // Cart Id
    }else{
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $cart = $row['cartId'];
    }
    // Add product to the cart
    $sql2 = "INSERT INTO cartitem (cartId, productId, qty, date) VALUES ('$cart', '$product', '$qty', '$date')";

    if(mysqli_query($conn, $sql2)){
      header ('Location: cart.php');
    }else{
      echo "Error";
    }
}
?>
