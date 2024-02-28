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
        $image=$_POST['image'];
        $image=$_FILES["image"]["name"];
	
        $extension = substr($image,strlen($image)-4,strlen($image));

        $allowed_extensions = array(".jpg","jpeg",".png",".gif",".webp",".svg");

        if(!in_array($extension,$allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png/ gif/ webp/ svg format allowed');</script>";
        } else {
            $newimage=md5($image).time().$extension;

            move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newimage);
		
            $query=mysqli_query($con, "insert into category(name,description,image) value('$name','$desc','$newimage')");

            if ($query) {
                echo "<script>alert('Category has been added.');</script>"; 
                echo "<script>window.location.href = 'categories.php'</script>";   
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
    <title>Add Category</title>
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
                        <h1 class="tm-site-title mb-0" style="color: black;">Shopping Mall</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" style="color: black;">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="categories.php" style="color: black;">Categories</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="products.php" style="color: black;">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="order.php" style="color: black;">Order</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="feedback.php" style="color: black;">Feedback</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.php" style="color: black;">Accounts</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.php">
                                    <i class="far fa-user mr-2 tm-logout-icon" style="color: black;"></i>
                                    <span style="color: black;">Logout</span>
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
                            <h2 class="tm-block-title d-inline-block">Add Category</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <form method="post" class="d-flex col-12 tm-edit-product-form" enctype="multipart/form-data">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Name</label>
                                    <input id="name" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="border-radius: 50px;">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="border-radius: 50px;" name="description" rows="3" required></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary" name="add" style="border-radius: 50px;">Add Category
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-dummy mx-auto" style="border-radius: 50px;">
                                    <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                                </div>
                                <div class="custom-file mt-3 mb-3">
                                    <input id="fileInput" type="file" name="image" style="display:none;" />
                                    <input type="button" class="btn btn-primary d-block mx-auto" style="border-radius: 50px;" value="Upload ..." onclick="document.getElementById('fileInput').click();" />
                                </div>
                            </div>
                        </form>
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

