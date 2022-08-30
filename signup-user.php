<?php require_once "controllerUserData.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Signup Form</title>
  <link rel="icon" href="asset/logopet.png" type="image/x-icon">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
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
            <a class="nav-link text-white" aria-current="page" href="#">Home</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" href="contactUs.php">Contact Us</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link  active fw-bold text-info" href="login-user.php">Login</a>
          </li>
        </div>
      </ul>
    </div>
  </nav>



  <!--Sign Up form-->
  <div class="container py-3 mt-5 mb-5 rounded-3" style="background-color: #1572A1">
    <h2 class="text-center text-white">Sign Up Form</h2>
    <p class="text-center text-white">It's quick and easy to Petko.</p>

    <form action="signup-user.php" method="POST" autocomplete="">

      <!--Message Alert-->
      <?php if(count($errors) == 1){ ?>
      <div class="alert alert-danger text-center">
        <?php
                foreach($errors as $showerror){
                  echo $showerror;
                }
            ?>
      </div>
      <?php
            }
            elseif(count($errors) > 1){
            ?>
      <div class="alert alert-danger">
        <?php
              foreach($errors as $showerror){
            ?><ul>
          <li><?php echo $showerror; ?></li>
        </ul>
        <?php
              }
            ?>
      </div>
      <?php
                    }
                    ?>


      <div class="container ">
        <!--1st row-->
        <div class="row ">
          <div class="col-6">
            <!--FName-->
            <div class="form-floating mt-3">
              <input class="form-control mb-2" type="text" name="first_name" placeholder="First Name" required
                value="<?php echo $fname ?>" id="floatingFirst" autocomplete="off">
              <label for="floatingFirst">First Name</label>
            </div>

            <!--MName-->
            <div class="form-floating mb-2">
              <input class="form-control" type="text" name="middle_name" placeholder="Middle Name" required
                value="<?php echo $mname ?>" id="floatingMiddle" autocomplete="off">
              <label for="floatingMiddle">Middle Name</label>
            </div>

            <!--LName-->
            <div class="form-floating">
              <input class="form-control mb-2" type="text" name="last_name" placeholder="Last Name" required
                value="<?php echo $lname ?>" id="floatingLast" autocomplete="off">
              <label for="floatingLast">Last Name</label>
            </div>

            <!--Suffix-->
            <div class="form-floating">
              <input class="form-control" type="text" name="suffix" placeholder="Suffix" value="<?php echo $suffix ?>"
                id="floatingSuffix" autocomplete="off">
              <label for="floatingSuffix">Suffix</label>
            </div>
          </div>

          <!--2nd Column-->
          <div class="col-6 mt-3">
            <!--Email-->
            <div class="form-floating mb-2">
              <input class="form-control" type="email" name="email" placeholder="Email Address" required
                value="<?php echo $email ?>" id="floatingEmail" autocomplete="off">
              <label for="floatingEmail">Email</label>
            </div>

            <!--Address-->
            <div class="form-floating mb-2">
              <input class="form-control" type="text" name="address" placeholder="Address" required
                value="<?php echo $address ?>" id="floatingAddress" autocomplete="off">
              <label for="floatingAddress">Complete Address</label>
            </div>

            <!--Password-->
            <div class="form-floating mb-2">
              <input class="form-control" type="password" name="password" placeholder="Password" required
                id="floatingPass">
              <label for="floatingPassword">Password</label>
            </div>

            <!--Confirm Password-->
            <div class="form-floating">
              <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required
                id="floatingConfirm">
              <label for="floatingConfirm">Confirm Password</label>
            </div>
          </div>
          <!--end of row-->
        </div>

        <!--2nd Row-->
       
      <div class="form-group mt-2 text-center">
        <input class="form-control btn btn-primary w-50 " type="submit" name="signup" value="Signup">
      </div>
      <div class="link login-link text-center text-white">Already a member? <a href="login-user.php"
          class="text-warning">Login here</a></div>
    </form>
  </div>

</body>

</html>