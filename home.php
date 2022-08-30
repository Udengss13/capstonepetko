<?php require_once "controllerUserData.php"; 
     require('php/connection.php');
   
      $user_id = $_SESSION['user_id'];

      if(!isset($user_id)){
        header('location: login-user.php');
      }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
  <!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #1572A1">
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

            <a class="nav-link active fw-bold text-info" aria-current="page" href="#">Home</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="product.php">Product</a>
          </li>
        </div>

        <?php 
            $select_rows = mysqli_query($con,"SELECT * FROM `cart` WHERE Cart_user_id = '$user_id'") or die ('query failed');
            $row_count = mysqli_num_rows($select_rows);
          ?>

        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="cart.php">Cart<span
                class="badge badge-light mx-1 bg-light text-dark"><?php echo $row_count ?></span></a>

          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link  text-white" href="logout-user.php"
              onclick="return confirm('Are you sure do you want to logout?')">Logout</a>
          </li>
        </div>
      </ul>
    </div>
  </nav>

  <div class="container-fluid bg-light">
    <?php 
        $select_user = mysqli_query($con, "SELECT * FROM usertable WHERE id = '$user_id'");
        if(mysqli_num_rows($select_user) > 0){
          $fetch_user = mysqli_fetch_assoc($select_user); 
        };
      ?>
    <p class="text-capitalize text-center">Welcome
      <?php echo $fetch_user['first_name']." ". $fetch_user['last_name']; ?></p>
  </div>


  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active bg-primary"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="asset/pets1.png" alt="pets" class="d-block" style="width:100%; height:500px;">
        <div class="carousel-caption">
          <h3 class="text-dark">CUTE CAT AND DOG</h3>
          <p class="text-dark">We love pets!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="asset/pets2.jpg" alt="pet" class="d-block" style="width:100%; height:500px">
        <div class="carousel-caption">
          <h3 class="text-dark">I LOVE PETS</h3>
          <p class="text-dark">We love pets!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="asset/pets3.jpg" alt="pet" class="d-block" style="width:100%; height:500px">
        <div class="carousel-caption">
          <h3>CUTE CAT AND DOG</h3>
          <p>We love pets!</p>
        </div>
      </div>
    </div>


    <div class="mt-4">
      <h3 class="text-center">Take A Paws</h3>
      <div class="row m-3">
        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet3.jpg" alt="Card image" style="width:100% ; border-style: solid;">
            <div class="card-body">
            </div>
          </div>

        </div>

        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet1.jpg" alt="Card image" style="width:100%; border-style: solid;">
            <div class="card-body">

            </div>
          </div>
        </div>
        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet2.jpg" alt="Card image" style="width:100%; border-style: solid;">
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
      <div class="row m-3">
        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet3.jpg" alt="Card image" style="width:100% ; border-style: solid;">
            <div class="card-body">
            </div>
          </div>

        </div>

        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet2.jpg" alt="Card image" style="width:100%; border-style: solid;">
            <div class="card-body">

            </div>
          </div>
        </div>
        <div class="col sm-3">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="asset/pet4.jpg" alt="Card image" style="width:100%; border-style: solid;">
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</body>

</html>