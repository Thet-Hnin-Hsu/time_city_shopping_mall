<?php
session_start();
error_reporting(0);
include('connection.php');

// if (strlen($_SESSION['aid']==0)) {
//     header('location:logout.php');
// } else {
    if(isset($_POST['update'])) {
        $name=$_POST['name'];
        $desc=$_POST['description'];
        $price=$_POST['price'];
        $image=$_FILES["image"]["name"];
        $extension = substr($image,strlen($image)-4,strlen($image));
        $allowed_extensions = array(".jpg",".jpeg",".png",".gif",".webp",".svg");
        
        if(!in_array($extension,$allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png/ gif/ webp/ svg/ format allowed');</script>";
        } else {
            $newimage=md5($image).time().$extension;
            move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newimage);
            
            $eid=$_GET['editid'];
                
        $query=mysqli_query($con, "update product set image='$newimage',name='$name',description='$desc' where id='$eid' ");
        
        if ($query) {
            echo "<script>alert('Product has been Updated.');</script>";
            echo "<script>window.location.href = 'products.php'</script>";   
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product Page</title>
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
                            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                            <?php
                                $cid=$_GET['editid'];
                                $ret=mysqli_query($con,"select * from product where id='$cid'");
                                $cnt=1;

                                while ($row=mysqli_fetch_array($ret)) {
                                ?> 
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Name
                                    </label>
                                    <input placeholder="Product name" id="name" name="name" type="text" value="<?php  echo $row['name'];?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="border-radius: 50px;">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" name="description" placeholder="Product Description" required style="border-radius: 50px;"><?php  echo $row['description'];?></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="price" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Price</label>
                                    <input id="price" name="price" type="text" value="<?php  echo $row['price'];?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="border-radius: 50px;">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                                    <img src="img/<?php echo $row['image']?>" alt="Profile Image" class="img-fluid mx-auto d-block" style="border-radius: 50px;">
                                    <div class="custom-file mt-3 mb-3">
                                        <input id="fileInput" type="file" name="image" style="display:none;" />
                                        <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();" style="border-radius: 50px;" />
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary" name="update" style="border-radius: 50px;">Update
                                        </button>
                                    </div>
                                </div>
                                <?php } ?>
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
