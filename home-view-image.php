<?php 
    require("php/connection.php");
    
        $id = $_GET['id'];
        

        //call all Menu's
        $querymenu = "SELECT * FROM admin_menu WHERE Menu_id = $id"; //You don't need a ; like you do in SQL
        $resultimage = mysqli_query($db_admin_account, $querymenu);

        if(isset($_GET['back'])){
          $filtervalues = $_GET['back']; 
          $querysearchmenu = "SELECT * FROM admin_menu WHERE CONCAT(Menu_name, Menu_price, Menu_category,Menu_filename) LIKE '%$filtervalues%'"; //You dont need like you do in SQL;
          $resultsearchmenu = mysqli_query($db_admin_account, $querysearchmenu);
        }
      

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <title>PetCo Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>

<body>
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
            <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link active fw-bold text-info" href="product.php">Product</a>
          </li>
        </div>

        <?php 
            $select_rows = mysqli_query($con,"SELECT * FROM `cart`") or die ('query failed');
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
            <a class="nav-link  text-white" href="product.php">Back</a>
          </li>
        </div>
      </ul>
    </div>
  </nav>



  <section id="#home">
    <div class="container">
      <div class="row">
        <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
        <div class=" col-12 d-flex justify-content-center mt-4">
          <img src="asset/menu/<?php echo $rowimage['Menu_filename']; ?>" style="width:100%; height:90vh; ">
        </div>

        <div class=" container">
          <div class="news-headings">
            <div class="row">
              <div class="col-md-12">
                <!--Name-->
                <h1 class="text-center c-green display-6 " style="color: ; text-shadow: 2px 1px 0px pink">
                  <?php echo $rowimage['Menu_name']; ?></h1>
                <!--Price-->
                <p class="text-center text-muted pb-4" style="font-size:20px">
                  <?php echo $rowimage['Menu_price']; ?>
                </p>
                <!--Price-->
                <p class="text-center text-muted pb-4" style="font-size:20px">
                  ( <?php echo $rowimage['Menu_category']; ?> )
                </p>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="news-body">
                  <label>Description:</label>
                  <p class="c-white mb-5 " style="font-size: 20px"><?php echo $rowimage['Menu_description']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
  </section>

  </div>




  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

  </script>

</body>

</html>