<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="icon" href="asset/logopet.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body style="background-image: url('asset/sliderimagepetcohouase.jpg')">
  <!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light ; border-bottom border-secondary" style="background: #1572A1;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="asset/logopet.png" alt="Logo" style="width:19%; height:8vh" /><span
        style="text-shadow: 3px 3px 3px  black" class="mx-2 text-info fw-bold">PETKO.</span> 
          <span style="border-left: 3px solid rgba(5, 13, 98, 0.767); margin-right: 3px;padding: 3px;"> </span> 
          <span style="text-shadow: 2px 2px 2px  rgba(49, 44, 44, 0.767);" class="text-white"><b>PETCO. ANIMAL CLINIC</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse me-3" id="navbarScroll">
      <ul class="navbar-nav me-auto my-0 my-lg-0 " style="--bs-scroll-height: 100px;">
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link active text-white" style="border-radius:10px; margin-left:3px;" aria-current="page" href="index.php">HOME</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="aboutUs.php">ABOUT US</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="services.php">SERVICES</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="shop.php">SHOP</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="petgalery.php">PET GALERY</a>
          </li>
        </div>
        <!-- <div class=" text-white">
          <?php echo  date("m/d/y") . "<br>"; ?>
        </div> -->
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link  text-white" href="login-user.php">SIGN IN</a>
          </li>
        </div>
      </ul>
    </div>
  </nav>



  <!--Main -->
  <div class="container mb-5 mt-5">
    <div class="row">
      <div class="col-md-4 offset-md-4 form login-form">
        <form action="login-user.php" method="POST" autocomplete="">
          <h2 class="text-center">Login Form</h2>
          <p class="text-center">Login with your email and password.</p>
          <?php
             if(count($errors) > 0)
             {
          ?>
          <div class="alert alert-danger text-center">
            <?php
                foreach($errors as $showerror)
                {
                    echo $showerror;
                }
            ?>
          </div>
          <?php
              }
            ?>
          <div class="form-group">
            <input class="form-control mb-3" type="email" name="email" placeholder="Email Address" required
              value="<?php echo $email ?>">
          </div>
          <div class="form-group">
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
          </div>
          <div class="link forget-pass text-end"><a href="forgot-password.php">Forgot password?</a></div>
          <div class="form-group">
            <input class="form-control button" type="submit" name="login" value="Login">
          </div>
          <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
        </form>
      </div>
    </div>
  </div>



  <!--Footer-->
  <footer class=" footer-banner" id="about">
    <div class="container text">
      <h1>PETCO SHOP</h1>
      <p>Thank you for Visiting Petco Shop Enjoy An GodBless!</p>
      <br>
      <div class="row">
        <div class="col-sm-3">
          <ul class="follow">
            <h3>FOLLOW US!</h3>
            <p></p><a href="https://www.facebook.com/Udeng13">Facebook <i
                class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13"> About Us<i class="fa-solid fa-table-layout"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Our Service <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Privacy Policy <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13">Facebook <i class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13">Facebook <i class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</body>

</html>