<?php
    session_start();
    error_reporting(0);
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body style="background: gold;">

    <!-- Navigation -->
    <div class="tm-nav">
        <nav class="navbar">

            <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar"></button>
            <!-- &#9776; ☰ -->
            <div class="collapse navbar-toggleable-sm text-xs-center tm-navbar" id="tmNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item active selected">
                        <a class="nav-link" href="./index.php" style="margin: 0px 15px; padding: 0px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./categories.php" style="margin: 0px 15px; padding: 0px;">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link current" href="./products.php" style="margin: 0px 15px; padding: 0px;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php" style="margin: 0px 15px; padding: 0px;">Contact<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row" style="margin-top: 10px;">
        <img src="./img/g7.gif" class="gif" />
        <img src="./img/g6.gif" class="gif" />
        <img src="./img/g5.gif" class="gif" />
    </div>

    <h1 align="center" style="margin-top:40px;letter-spacing:5px; color: white; font-weight: bold; text-shadow: 3px 3px 2px black;">Products in Time City Shopping Mall</h1>

    <div class="container conm" style="margin-top: 30px;">
    <?php
        $ret=mysqli_query($con,"select * from product");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) { ?>

        <div class="card mb-3 col-md-5 mr-2" style="border-radius: 30px; box-shadow:5px 5px 7px rgba(0, 0, 0, 0.749)">
            <div class="row g-0 ">
                <div class="col-md-4 " style="padding-top: 15px; padding-bottom: 15px; ">
                    <img src="admin/img/<?php echo $row['image']?>" style="height:200px; border-radius: 30px; " width="150px ">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body ">
                        <h5 class="card-title mt-1 " style="font-weight: bold; ">
                        <?php  echo $row['name'];?>
                        </h5>
                        <p class="card-text ">
                            <?php  echo $row['description'];?>
                        </p>
                        <a href="order.php?orderid=<?php echo $row[ 'id'];?>" class="btn btn-primary" style="color:white; background-color: yellow; box-shadow: 2px 2px 2px black; text-shadow: 1px 1px 1px black; font-weight: bold;"><?php  echo $row['price'];?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php $cnt=$cnt+1;} ?>   
    </div>
    <!--container -->
    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- jQuery (https://jquery.com/download/) -->
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
    <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
    <script src="js/jquery.singlePageNav.min.js"></script>
    <!-- Single page nav (https://github.com/ChrisWojcik/single-page-nav) -->

</body>