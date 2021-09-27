<?php include'includes/header.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "login"){
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Password MD5 


  $sql = "SELECT customerID FROM customer WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  
  if(mysqli_num_rows($result) == 1){
    $_SESSION['customerId'] = $row['customerID'];
    echo '<script>window.location.replace("index.php");</script>';

  }else{
    echo "Incorrect Login Details";
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "register"){
  // Getting Form Values from POST Method
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $add1 = $_POST['add1'];
  $add2 = $_POST['add2'];
  $city = $_POST['city'];
  $password = md5($_POST['password']);

  $sql ="INSERT INTO customer (fName, lName, email, addressL1, addressL2, city, phoneNo, password) 
  VALUES ('$fname', '$lname', '$email', '$add1', '$add2', '$city', '$phone', '$password')";

  if(mysqli_query($conn, $sql)){
    $customerId = mysqli_insert_id($conn);

    $_SESSION['customerId'] = $customerId;
    echo '<script>window.location.replace("index.php");</script>';
  }else{
    echo "Register Error";
  }


}


?>

<div class="container">
  <div class="row">

    <!-- Login form starts -->
    <div class="col-6 mt-3">
    <h2>Login</h2>
      <form method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="login">Submit</button>
    </form>
    </div>
    <!-- Login form ends -->

    <!-- Register form starts -->
    <div class="col-6 mt-3 mb-3">
    <h2>Register</h2>
    <form method="POST">
  <div class="form-row">
    <div class="form-group col-12">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="add1">Address 1</label>
    <input type="text" class="form-control" name="add1" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="add2">Address 2</label>
    <input type="text" class="form-control" name="add2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Mobile</label>
      <input type="text" class="form-control" name="phone">  
    </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" value="register">Register</button>
</form>
    </div>
    <!-- Register form ends -->

  </div>
</div>

<?php include'includes/footer.php'; ?>
