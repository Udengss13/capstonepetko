<?php
    require_once "php/user-list-process.php";
    require('php/connection.php');

    
    $queryimage = "SELECT * FROM admin_content_homepage"; //You don't need a like you do in SQL;
    $resultimage = mysqli_query($db_admin_account, $queryimage);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/color.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Admin || Content</title>
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src="asset/logopet.png" alt="Saint Jude Logo"
        style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white" href="#"
        style="padding-left: 15px;">PET CO.</a></h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
      <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">

        <li class="nav-item">
          <a class="nav-link c-green" href="admin-orders.php">Order</a>
        </li>
        
        <div class="dropdown">
           <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"> Content</button>
          <ul class="dropdown-menu">
           <li class="nav-item">
                <a class="dropdown-item" href="admin-content.php">NEWS</a>
           </li>
            <li><a class="dropdown-item" href="#">Normal</a></li>
            <li><a class="dropdown-item" href="#">Active</a></li>
            <li><a class="dropdown-item" href="#">Disabled</a></li>
          </ul>
       </div>
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

 


</body>
</html>

