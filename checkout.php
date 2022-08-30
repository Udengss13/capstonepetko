<?php require_once "controllerUserData.php"; 
     require('php/connection.php');
     
    //GET USER ID IN REGISTRATION
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
      header('location: login-user.php');
    }
?>
<?php
  //This is for calling the informaiton of user in fields.
    $sqlInfo = mysqli_query($con, "SELECT * FROM usertable WHERE id = '$user_id'");
?>

<!--When Click ORDER NOW!-->
<?php 
  if(isset($_POST['submit_order'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $paymentmethod = $_POST['paymentmethod'];

    $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE Cart_user_id = '$user_id'");
    $totalofprice=0;
    $price_total = 0;
  
    
    if(mysqli_num_rows($cart_query)>0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
        $product_name[] = $product_item['Cart_name'].'('. $product_item['Cart_quantity'] .')';
        $product_price = $product_item['Cart_price'] * $product_item['Cart_quantity'];  
        $price_total =  $totalofprice += $product_price;
      };
    };
  
    
    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($con, "INSERT INTO  `order` (order_user_id, first_name,  last_name, contact, email, address, payment_method, total_products, total_price)
    VALUES ('$user_id' , '$fname',  '$lname', '$contact', '$email', '$address', '$paymentmethod', '$total_product', '$price_total' )") or die('Query failed!');

 
  // header('location: cart.php');

if($cart_query && $detail_query){
  mysqli_query($con, "DELETE FROM `cart` WHERE Cart_user_id = '$user_id'");
  echo '<script>
  alert("Thank you for ordering on Petco. Continue Shopping!");
  window.location.href="product.php";
  </script>';
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <link rel="icon" href="asset/logopet.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


</head>

<body>

  <!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #1572A1">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="asset/logopet.png" alt="Logo" style="width:45%; height:8vh" /><span
          class="mx-2 text-warning fw-bold">PETCO.</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse me-3" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="home.php?id=<?php echo $user_id?>">Home</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="product.php?id=<?php echo $_SESSION['user_id'];?>">Product</a>
          </li>
        </div>

        <?php 
            $select_rows = mysqli_query($con,"SELECT * FROM `cart` WHERE Cart_user_id = '$user_id'") or die ('query failed');
            $row_count = mysqli_num_rows($select_rows);
          ?>

        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link active fw-bold text-info" href="#">Cart<span
                class="badge badge-light mx-1 bg-light text-dark"><?php echo $row_count ?></span></a>

          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link  text-white" href="login-user.php">Logout</a>
          </li>
        </div>

      </ul>
    </div>
  </nav>

  <!--Call for Username -->
  <div class="container-fluid bg-light">
    <?php
      $select_user = mysqli_query($con, "SELECT * FROM `usertable` WHERE id = '$user_id'");
      if(mysqli_num_rows($select_user) > 0){
        $fetch_user = mysqli_fetch_assoc($select_user);
      }
    ?>
    <p class="text-capitalize text-center">Welcome
      <?php echo $fetch_user['first_name'] ." " .$fetch_user['last_name'] ?></p>
  </div>

  <div class="container bg-light">


    <?php while($rowInfo = mysqli_fetch_array($sqlInfo)){ ?>
    <form action="" method="post">

      <div class="container  w-50 mb-4 rounded-3 border border-5"
        style="  background: linear-gradient(to bottom, #1a2980, #26d0ce);">
        <p class="fs-5 mt-3 text-white text-center">Check your Order first!</p>
        <?php 
          $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE Cart_user_id = '$user_id' ");
          $total = 0;
          $grand_total= 0;

          if(mysqli_num_rows($select_cart)>0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
              $total_price =$fetch_cart['Cart_price'] * $fetch_cart['Cart_quantity'] ;
              $grand_total = $total += $total_price;
        ?>
        <span class="px-4 btn btn-outline-danger d-flex justify-content-center text-white mt-2 mx-auto w-75">
          <?= $fetch_cart['Cart_name'];?>
          ( <?= $fetch_cart['Cart_quantity'];?> ) </span>
        <?php   
            }
          }else{
            echo "<div><span>Your cart is empty!</span></div>";
          }
        ?>

        <div class="mt-5 text-center text-light w-100 px-2 btn btn-success mb-3 active ">
          <span class="mb-3">Total Payment: <?= number_format($grand_total);?></span>
        </div>
      </div>

      <div>
        <p><strong>Instruction:</strong> Fill out this form before place order. Thank you!</p>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control bg-light" name="fname" value="<?=  $rowInfo['first_name']?>" readonly
              required>
          </div>
        </div>
        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control bg-light" name="lname" value="<?=  $rowInfo['last_name']?>" readonly
              required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Contact number</span>
            <input type="number" class="form-control" name="contact" placeholder="e.g. 639832456922" min="639123456789"
              required>
          </div>
        </div>
        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="email" class="form-control bg-light" name="email" value="<?=  $rowInfo['email']?>" readonly
              required>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text " id="basic-addon1">Payment Method</span>
            <select name="paymentmethod" class="form-select" required>
              <option value="">Select your Payment Method</option>
              <option value="Cash on Delivery">Cash On Delivery</option>
              <option value="Gcash">Gcash</option>
              <option value="Paypal">Paypal</option>
            </select>
          </div>
        </div>

        <div class="col-6 mb-2">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Address</span>
            <input type="text" class="form-control bg-light" name="address" value="<?= $rowInfo['address'];?>" required
              readonly>
          </div>
        </div>

        <div class=" text-center">
          <button class="form-control btn btn-primary mb-5 w-50 " name="submit_order">PLACE ORDER</button>
        </div>

    </form>
    <?php }?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  < /scrip>

  <
  script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js" >
  </script>

</body>

</html>