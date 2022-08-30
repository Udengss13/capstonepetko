<?php
session_start();
  //This is for message
    if(isset($_SESSION['update_changes'])){
        $applychanges = $_SESSION['update_changes'];
        unset($_SESSION['update_changes']);
    }
    else{
        $applychanges="";
    }

    require('php/connection.php');
    
     //call all Category
  $querycategory = "SELECT * FROM admin_category"; //You don't need a ; like you do in SQL
  $resultcategory = mysqli_query($db_admin_account, $querycategory);
    
  //call all Menu
  $querymenu = "SELECT * FROM admin_menu"; //You don't need a ; like you do in SQL
  $resultmenu = mysqli_query($db_admin_account, $querymenu);

  if(isset($_GET['editid'])){
      $menu_id = $_GET['editid'];

      $query = "SELECT * FROM admin_menu WHERE Menu_id = $menu_id";
      $result = mysqli_query($db_admin_account, $query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(empty($row['Menu_dir'])){
        $menudir = "asset/menu/default.jpg";
      }
      else{
        $menudir = "asset/menu/". $row['Menu_dir'];
      }
  }

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
  <title>Document</title>
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src="asset/logo.png" alt="Saint Jude Logo"
        style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white" href="#"
        style="padding-left: 15px;">PET CO.</a></h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
      <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">

        <li class="nav-item">
          <a class="nav-link c-green rounded" href="admin-category-list.php">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link c-white bg_nav_menu  rounded" href="#">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-green  rounded" href="admin-dashboard.php">User List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link c-green" href="admin-login.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-xl-fluid mt-5 mb-5">
    <div class="div_background_light px-3">
      <h4 class="text-center c-white py-3">- Edit Menu -</h4>
      <!--Success Message-->
      <?php if($applychanges!=""){?>
      <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert" style="width: 90%;">
        <strong>Apply Changes Successfully!</strong> <?php echo $applychanges; ?>.
      </div>
      <?php } ?>

      <!--Card-->

      <div class="row justify-content-md-center">
        <div class="col-lg-7 col-md-6 col-sm-12 mb-5">

          <form action="php/edit-menu-process.php" method="post" enctype="multipart/form-data"
            class="row gap-2 justify-content-center">
            <div class="card d-flex justify-content-center">
              <div class="card-header">
                Menu Information
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <label>Menu Name:</label>
                  <input class="col-4 mb-3" name="menuid" type="text" value="<?php echo $row['Menu_id']; ?>" hidden>
                  <input name="title" class="col-12" type="text" required value="<?php echo $row['Menu_name']; ?>">
                </li>
                <li class=" list-group-item">
                  <label>Menu Description:</label>
                  <textarea name="paragraph" style="height:100px;" required
                    class="col-12"><?php echo $row['Menu_description']; ?></textarea>
                </li>
                <li class="list-group-item">
                  <label>Price:</label>
                  <input name="price" class="col-md-5" type="number" required value="<?php echo $row['Menu_price']; ?>"
                    min="0" step="0.01">
                </li>
                <li class="list-group-item">
                  <label>Category:</label>

                  <div class="input-group flex-nowrap">
                    <select class="form-select form-select-md" name="category_name" required>
                      <option value="">Select Category</option>
                      <?php while($rowcategory =  mysqli_fetch_array($resultcategory)){ ?>
                      <option value=" <?php echo $rowcategory['category_name']; ?>">
                        <?php echo $rowcategory['category_name']; ?>
                      </option>
                      <?php } ?>
                    </select>

                  </div>

                </li>

                <li class="list-group-item">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload-news" name="photo" required>
                  </div>
                  <!-- <input name="photo" class="col-md-6 c-white" id="upload-news" type="file" required> -->
                </li>
                <li class="list-group-item">
                  <a href="admin-menu.php" class="float-end mx-2"><span class="btn btn-outline-danger">Back</span></a>

                  <button type=" submit" name="update_changes" class="btn btn-outline-success float-end"
                    style="max-width:450px;">Update</button>

                </li>
              </ul>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script src="/js/script.js"></script>
</body>

</html>