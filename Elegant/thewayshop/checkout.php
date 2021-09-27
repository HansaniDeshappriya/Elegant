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
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
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
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                    <?php
                        $sql = "SELECT * FROM customer WHERE customerID='$customer'";
                        $r = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($r);
                    ?>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name *</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $row['fName']; ?>" disabled>
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name *</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $row['lName']; ?>" disabled>
                                <div class="invalid-feedback"> Valid last name is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Mobile *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="mobile" value="<?php echo $row['phoneNo']; ?>" disabled>
                                <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address *</label>
                            <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" disabled>
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" id="address" value="<?php echo $row['addressL1']; ?>" disabled>
                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">Address 2 *</label>
                            <input type="text" class="form-control" id="address2" value="<?php echo $row['addressL2']; ?>" disabled> </div>
                            <div class="mb-3">
                                <label for="city">City *</label>
                                <input type="text" class="form-control" id="city" value="<?php echo $row['city']; ?>" disabled> </div>
                        <hr class="mb-4">
                         </form>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <?php
                              $sql = "SELECT * FROM cartitem ct INNER JOIN cart c ON c.cartId=ct.cartId
                              INNER JOIN product p ON p.id = ct.productId
                              WHERE c.customerId='$customer' AND c.status='open'";
                              if($result = mysqli_query($conn, $sql)){
                              while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="rounded p-2 bg-light">
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> <a href="detail.html"><?php echo $row['proName']; ?></a>
                                        <div class="small text-muted">Price: Rs. <?php echo number_format($row['price'], 2); ?> <span class="mx-2">|</span> Qty: <?php echo $row['qty']; ?><span class="mx-2">|</span> Subtotal: Rs. <?php $amount = $row['price'] * $row['qty']; echo number_format($amount, 2); ?></div>
                                    </div>
                                </div>
                              <?php $subtotal = $subtotal + $amount;
                                    $cart = $row['cartId'];
                             } } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
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
                    <div class="col-12 d-flex shopping-box"> <a href="placeorder.php?cart=<?php echo $cart; ?>&total=<?php echo $total; ?>&confirm=1" class="ml-auto btn hvr-hover">Place Order</a> </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->

<?php include 'includes/footer.php'; ?>
