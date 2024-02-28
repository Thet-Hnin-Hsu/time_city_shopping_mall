<?php
session_start();
error_reporting(0);
include('connection.php');

// if (strlen($_SESSION['aid']==0)) {
//     header('location:logout.php');
// } else {
    if(isset($_POST['add'])) {
        $name=$_POST['name'];
        $desc=$_POST['description'];
        $price=$_POST['price'];
        $image=$_POST['image'];
        $image=$_FILES["image"]["name"];
	
        $extension = substr($image,strlen($image)-4,strlen($image));

        $allowed_extensions = array(".jpg","jpeg",".png",".gif",".webp",".svg");

        if(!in_array($extension,$allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png/ gif/ webp/ svg format allowed');</script>";
        } else {
            $newimage=md5($image).time().$extension;

            move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newimage);
		
            $query=mysqli_query($con, "insert into product(name,description,price,image) value('$name','$desc','$price','$newimage')");

            if ($query) {
                echo "<script>alert('Product has been added.');</script>"; 
                echo "<script>window.location.href = 'products.php'</script>";   
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Products Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body style="background: url('img/dash-bg-03.jpg') center cover;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light" style="border-radius: 50px; background-color:rgba(255, 255, 0, 0.8);">
                    <a class="navbar-brand" href="./index.php">
                        <img src="./img/logo.png" width="100" />
                        <h1 class="tm-site-title mb-0">Shopping Mall</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="categories.php">Categories</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="products.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="order.php">Order</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="feedback.php">Feedback</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.php">Accounts</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.php">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->

        <div class="row tm-mt-big">
            <div class="col-xl-2"></div>
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12" style="margin-bottom:50px;">
                <div class="tm-block" style="border-radius: 50px; background-color:rgba(255, 255, 255, 0.8);">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Name</label>
                                    <input id="name" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required style="border-radius: 50px;">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" name="description" rows="3" required style="border-radius: 50px;" name="des"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="price" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Price</label>
                                    <input id="price" name="price" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required style="border-radius: 50px;">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="image" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Image</label>
                                    <input id="image" name="image" type="file" class="form-control col-xl-9 col-lg-8 col-md-8 col-sm-7" required style="border-radius: 50px;">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <input type="submit" name="add" value="Add Product" class="btn btn-primary" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>
