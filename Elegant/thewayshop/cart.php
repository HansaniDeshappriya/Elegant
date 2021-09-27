<?php include 'includes/header.php';
$customer = $_SESSION['customerId'];
$subtotal = 0;
$total = 0;

?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql = "SELECT * FROM cartitem ct INNER JOIN cart c ON c.cartId=ct.cartId
                                INNER JOIN product p ON p.id = ct.productId
                                WHERE c.customerId='$customer' AND c.status='open'";
                                if($result = mysqli_query($conn, $sql)){
                                while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									                           <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="" />
								                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#"><?php echo $row['proName']; ?></a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs. <?php echo number_format($row['price'], 2); ?></p>
                                    </td>
                                    <td class="quantity-box">
                                      <form>
                                      <input type="number" size="4" value="<?php echo $row['qty']; ?>" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>Rs. <?php $amount = $row['price'] * $row['qty']; echo number_format($amount, 2); ?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="removecart.php?cartItem=<?php echo $row['cartItemId']; ?>">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>

                              <?php   $subtotal = $subtotal + $amount; } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rs. <?php echo number_format($subtotal, 2) ?></div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold">Rs. <?php if($subtotal !== 0){echo number_format($ship=250, 2);}else{ echo number_format(0, 2); }  ?></div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rs. <?php if($subtotal !== 0){echo number_format($total = $subtotal+$ship, 2); }else{ echo number_format(0, 2); } ?></div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box">
                  <?php if($subtotal !== 0){
                    echo '<a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a>';
                  }else{
                    echo '<a href="#" onclick="msg()" class="ml-auto btn hvr-hover">Checkout</a>';
                  }
                   ?>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
<script>
function msg() {
alert("No item to checkout");
}
</script>
<?php include 'includes/footer.php'; ?>
