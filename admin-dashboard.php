<?php
    require_once "php/user-list-process.php";
    require('php/connection.php');

    $query = "SELECT * FROM usertable"; //You don't need a like you do in SQL;
    $result = mysqli_query($con, $query);
    

    //this is for search name or id;
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $query = "SELECT * FROM usertable WHERE first_name='$user_id' OR id='$user_id'"; //You don't need a ; like you do in SQL
        $result = mysqli_query($con, $query);
    }else{
        $query = "SELECT * FROM usertable"; //You don't need a ; like you do in SQL
        $result = mysqli_query($con, $query);
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
  <title>Admin Dashboard</title>
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src=" asset/logopet.png" alt="PETCO" style="width: 50px; padding-left: 10px; padding-top: 5px;">
      <a class="navbar-brand fw-bold c-white" href="#" style="padding-left: 15px;">PET CO.</a>
    </h3>
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
                <a class="dropdown-item" href="admin-content.php">News</a>
           </li>
            <li><a class="dropdown-item" href="admin-quicktips.php">Quicktips</a></li>
            <li><a class="dropdown-item" href="admin-slider.php">slider</a></li>
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
          <a class="nav-link c-white bg_nav_menu rounded" href="#">User List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link c-green" href="admin-login.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--All Content of Student Here-->
  <div class="mt-4 rounded mb-5">
    <h4 class="c-white rounded-top py-2" style="text-align:center;">- User Information -</h4>
    <!--Search-->
    <form action="admin-dashboard.php" method="GET">
      <div class="input-group mx-auto" style="width: 350px;">
        <span class="input-group-text">Search User</span>
        <input type="text" required class="form-control" name="id" placeholder="User ID or Name.">
        <span class="input-group-btn">
          <button class="btn btn-success" name="search" type="submit"><span
              class="bi bi-search c-white"></span></button>
        </span>
      </div>
    </form>
    <div class="div_background_light">
      <div class="table-responsive mt-4 mx-auto" style="width:95%;">
        <table class="table mt-3 mb-5">
          <thead class="table-dark">
            <th class="text-nowrap text-center">User ID</th>
            <th class="text-nowrap text-center ">First Name</th>
            <th class="text-nowrap text-center">Middle Name</th>
            <th class="text-nowrap text-center">Last Name</th>
            <th class="text-nowrap text-center">Suffix</th>
            <th class="text-nowrap text-center">Email</th>
            <th class="text-nowrap text-center">Status</th>
            <th class="text-nowrap text-center">Action</th>
          </thead>

          <tbody>
            <?php while($row = mysqli_fetch_array($result)){ ?>
            <form action="php/user-list-process.php" method="post">
              <tr>
                <td><input name="user_id" readonly class="c-white text-center " type="text"
                    style="background-color:transparent;border:0;" value="<?php echo $row['id']; ?>">
                </td>
                <td><input name="first_name" readonly class="c-white text-center" type="text"
                    style="background-color:transparent;border:0;" value="<?php echo $row['first_name']; ?>">
                </td>
                <td><input name="middle_name" readonly class="c-white text-center " type="text"
                    style="background-color:transparent;border:0;" value="<?php echo $row['middle_name']; ?>">
                </td>
                <td><input name="last_name" readonly class="c-white text-center " type="text"
                    style="background-color:transparent;border:0;" value="<?php echo $row['last_name']; ?>">
                </td>
                <td><input name="suffix" readonly class="c-white text-center " type="text"
                    style="background-color:transparent;border:0;" value="<?php echo $row['suffix']; ?>">
                </td>
                <td><input name="email" readonly class="c-white text-center " type="text"
                    style="background-color:transparent;border:0; " value="<?php echo $row['email']; ?>">
                </td>
                <td><input name="status" readonly class=" text-center " type="text"
                    style="background-color:transparent;border:0; color: red;" value="<?php  if( $row['status']!="verified"){
                                                echo "Not Verified";
                                        }; ?>">
                </td>


                <td class="c-white text-nowrap text-center"><button data-bs-toggle="modal"
                    data-bs-target="#id<?php echo $row['id'];?>" type="button"
                    class="btn btn-outline-danger">Delete</button>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="id<?php echo $row['id'] ;?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="id<?php echo $row['id'] ;?>">Confirmation:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                        <label class="text-center mb-2 mx-auto">Enter Password before delete <span
                            class="fw-bold"><?php echo $row['first_name']; ?>!</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                          aria-label="Password" aria-describedby="addon-wrapping" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete_user">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </tr>
            </form>
            <?php } ?>
          </tbody>
        </table>
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