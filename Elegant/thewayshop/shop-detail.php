<?php include 'includes/header.php';
$product =$_GET['product'];
 ?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
          <?php
              $sql = "SELECT * FROM product WHERE id ='$product'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);?>
            <div class="col-xl-4 col-lg-4 col-md-4">
                    <li>
                        <a href="#" class="photo"><img src="<?php echo $row['image']; ?>" class="cart-thumb" alt="" width="300px"/></a>
                    </li>
            </div>
            <br>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="single-product-details">
                    <h2><?php echo $row['proName']; ?></h2>
                    <h5> Rs. <?php echo $row['price']; ?></h5>
                    <p class="available-stock"><span> More than <?php echo $row['quantity']; ?> available / <a href="#">5 sold </a></span></p>
                    <h4>Description:</h4>
                    <p><?php echo $row['proDesc']; ?></p>

                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                  <?php if(isset($_SESSION['customerId'])){
                                      echo '<a class="btn hvr-hover" href="addcartitem.php?product='.$row['id'].'&qty=1">Add to Cart</a>';
                                  }else{
                                    echo '<a class="btn hvr-hover" onclick="login()" href="#">Add to Cart</a>';
                                  } ?>
                                </div>
                            </div>


                                <div class="share-bar">
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                  <?php
                      $sql = "SELECT * FROM product LIMIT 6";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="<?php echo $row['image']; ?>" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="shop-detail.php?product=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <?php if(isset($_SESSION['customerId'])){
                                        echo '<a class="cart" href="addcartitem.php?product='.$row['id'].'&qty=1">Add to Cart</a>';
                                    }else{
                                      echo '<a class="cart" onclick="login()" href="#">Add to Cart</a>';
                                    } ?>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?php echo $row['proName']; ?></h4>
                                <h5> Rs. <?php echo $row['price']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
<script>
  function login() {
  alert("Please login to proceed");
}
</script>
<?php include 'includes/footer.php'; ?>
