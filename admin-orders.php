<?php
require_once "controllerUserData.php"; 
     require('php/connection.php');
     
  //GET USER ID IN REGISTRATION
  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
    header('location: login-user.php');
  }

  if(isset($_POST['confirmed'])){
    $update_status = $_POST['update_status'];
    $update_status_id = $_POST['update_status_id'];
    $update_status = 1;
    
    $update_status_query = mysqli_query($con, "UPDATE `order` SET  order_status = '1'
    WHERE order_user_id = '$user_id'");

   if($update_status_query){
     header('location: admin-orders.php');
   }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin || Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/color.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src="asset/logopet.png" alt="Petco Logo"
        style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white" href="#"
        style="padding-left: 15px;">PET CO.</a></h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
      <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">

        <li class="nav-item">
          <a class="nav-link c-white bg_nav_menu rounded" href="#">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-green" href="admin-content.php">Content</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-green  rounded" href="admin-category-list.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-green  rounded" href="admin-menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-green rounded" href="admin-dashboard.php">User List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link c-green" href="admin-login.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <form action="" method="POST">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i = 1;
                $order_query = mysqli_query($con, "SELECT * FROM `order`");
                
                if(mysqli_num_rows($order_query) > 0){
                  while($row = mysqli_fetch_assoc($order_query)){    
            ?>

              <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['first_name']." ".$row['last_name']  ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['contact'] ?></td>
                <?php if($row['order_status'] == 1): ?>
                <td class="text-center">
                  <span class="badge badge-success bg-success text-white">Confirmed</span>
                  <input type="hidden" value="<?php echo $row['order_status'] ?>" name="update_status">
                  <input type="hidden" value="<?php echo $row['order_user_id'] ?>" name="update_status_id">
                </td>
                <?php else: ?>
                <td class="text-center "><span class="badge badge-secondary bg-secondary text-dark">For
                    Verification</span></td>
                <?php endif; ?>
                <td>

                <td>

                  <button class="btn btn-primary" type="submit" name="confirmed">Confirm</a></button>
                </td>
              </tr>

              <?php
                    };
                  };
              ?>

            </tbody>
          </table>
        </form>


      </div>
    </div>

  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script src="/js/script.js"></script>
</body>

</html>