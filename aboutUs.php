<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style>
    .nav-item {
        margin-left: 3px
    }

    .nav-item:hover {
        background-color: rgb(23, 171, 201);
        border-radius: ;

    }
    </style>
</head>

<body>
    <!-- <div>Dear user and Client we are her to iform that petco incorporation in ony gathered and services through a dog and cat only</div> -->
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light ; border-bottom border-secondary" style="background: #1572A1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="asset/logopet.png" alt="Logo" style="width:19%; height:8vh" /><span
                    style="text-shadow: 3px 3px 3px  black" class="mx-2 text-info fw-bold">PETKO.</span>
                <span style="border-left: 3px solid rgba(5, 13, 98, 0.767); margin-right: 3px;padding: 3px;"> </span>
                <span style="text-shadow: 2px 2px 2px  rgba(49, 44, 44, 0.767);" class="text-white"><b>PETCO. ANIMAL
                        CLINIC</b></span>
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
                        <a class="nav-link active text-white" style="border-radius:10px; margin-left:3px;"
                            aria-current="page" href="index.php">HOME</a>
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


    <div class="page-content">
        
        <div class="container">
        <h1>ABOUT PETCO</h1>
            <div class="row">
                <div class="col">
                  <div class="text-justify">
                    <p>Petco is a category-defining health and wellness company focused on improving the lives of pets, pet parents and our own Petco partners. Since our founding in 1965, we’ve been trailblazing new standards in pet care, delivering comprehensive wellness solutions through our products and services, and creating communities that deepen the pet-pet parent bond. We operate more than 1,500 Petco locations across the U.S., Mexico and Puerto Rico, including a growing network of more than 100 in-store veterinary hospitals, and offer a complete online resource for pet health and wellness at petco.com and on the Petco app. Petco Love (formerly Petco Foundation), has invested nearly $300 million since it was founded in 1999 to help make communities and pet families closer, stronger, and healthier. In tandem with Petco Love, an independent nonprofit changing lives, we work with and support thousands of local animal welfare organizations across the country, and through in-store adoption events, have helped find loving homes for more than 6.5 million animals.</p>
                    <p>The University has been consistently producing highly professional, ethical, and service-oriented
                        individuals who perform well in board examinations with impressive results consistently
                        exceeding
                        the National Passing Rate and become potent driving force in the industries in the region and
                        beyond. BulSU has recently received its ISO 9001:2015 Certification, passed the Level II
                        Institutional Accreditation while 50 academic programs of the different Colleges are already
                        accredited by the Accrediting Agency of Chartered Colleges and Universities (AACCUP), Inc. This
                        was
                        made possible through the persistent hardwork and resolute service of its 1,138 faculty members
                        and
                        476 non-teaching personnel who relentlessly cater and furnish the needs of our 35,958 students.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="flex-sect" id="imagesec">
        <section id="imagesection" class="div_background_light py-4">
            <div class="container-fluid px-5 mt-3">
                <div class="col-lg-12 col-md-12">
                    <div class="justify-content-center row col-md-12 rounded-3">
                        <h3 class="col-12  text-center fw-bolder" style="text-shadow: 3px 1px 3px  lightblue; color: rgb(13, 13, 103)" >PETCO ANNOUNCEMENT</h3>
                        <hr>

                        <!--Pictures-->

                        <?php while($rowimage = mysqli_fetch_array($resultimage)) {?>

                        <div class="col-lg-3 col-xs-1 col-sm-5 card mx-3 my-4">

                            <img src="asset/homepage/<?php echo $rowimage['Image_filename'] ?>"
                                class="card-img-top pt-3 img-responsive " style="height:200px; width:100%;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center"><?php echo $rowimage['Image_title'] ?></h5>
                                <h6 class="card-text text-center text-muted">
                                    <?php echo $rowimage['Image_subtitle'] ?>
                                </h6>
                                <p class="card-text d-inline-block text-truncate">
                                    <?php echo $rowimage['Image_body'];?>
                                </p>
                                <div class="mb-4">
                                    <a href="index-view-image.php?id=<?php echo $rowimage['Image_id'] ?>"
                                        class=" btn btn-success w-100">View</a>
                                </div>
                            </div>
                        </div>

                        <?php }?>


                    </div>
                </div>
            </div>
        </section>
    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>