<?php include 'includes/header.php'?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Account</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- My account starts -->
    <div class="container">
        <div class="row justify-content-center mt-4 mb-4">
            <?php
                $customer = $_SESSION['customerId'];
                $sql = "SELECT * FROM customer WHERE customerID='$customer'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-8">
                <h2 class="mb-2">Profile Details</h2>
                <form>
                    <div class="form-row">
                        <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['fName']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['lName']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add1">Address 1</label>
                        <input type="text" class="form-control" value="<?php echo $row['addressL1']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="add2">Address 2</label>
                        <input type="text" class="form-control" value="<?php echo $row['addressL2']; ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="<?php echo $row['city']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="phone">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $row['phoneNo']; ?>">
                        </div>
                    </div>
                    </form>
            </div>
           <div class="col-8 mt-3">
               <h2>Orders</h2>
               <table class="table">
  <thead>
    <tr>
      <th scope="col">#Order No</th>
      <th scope="col">Checkout Date</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM checkout ck INNER JOIN cart c ON c.cartId=ck.cartId WHERE customerId ='$customer'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) !== 0){
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <th scope="row"><?php echo $row['checkoutId']; ?></th>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['amount']; ?></td>
    </tr>
  <?php } } ?>
  </tbody>
</table>
           </div>
        </div>
    </div>

<?php include 'includes/footer.php';?>
