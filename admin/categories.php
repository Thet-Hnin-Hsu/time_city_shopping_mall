<?php
session_start();
error_reporting(0);
include('connection.php');

// if (strlen($_SESSION['aid']==0)) {
//     header('location:categories.php');
// } else {
    if($_GET['mid']) {
        $mid=$_GET['mid'];

        mysqli_query($con,"delete from category where id ='$mid'");
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='categories.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" style="background: url('img/dash-bg-01.jpg') center cover;">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light" style="border-radius: 50px; background-color:rgba(255, 255, 0, 0.8);">
                        <a class="navbar-brand" href="./index.php">
                            <img src="./img/logo.png" width="80" />
                            <h1 class="tm-site-title mb-0" style="color: black;">Shopping Small</h1>
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
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="tm-block h-100" style="border-radius: 50px; background-color:rgba(255, 255, 255, 0.8);">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Categories</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="add-category.php" class="btn btn-small btn-primary" style="border-radius: 50px;">Add New Category</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ret=mysqli_query($con,"select * from category");
                                    $cnt=1;

                                    while ($row=mysqli_fetch_array($ret)) {
                                    ?>
                                    <tr>
                                        <td class="text-center" scope="col"><img src="img/<?php echo $row['image']?>" width="100" height="100" /></td>
                                        <td class="text-center tm-product-name" scope="col">
                                            <?php  echo $row['name'];?>
                                        </td>
                                        <td class="text-center des-text" scope="col">
                                            <?php  echo $row['description'];?>
                                        </td>
                                        <td class="text-center" scope="col">
                                            <a href="edit-category.php?editid=<?php echo $row['id'];?>" class="btn btn-primary link-view" style="border-radius: 50px;">Edit</a>
                                        </td>
                                        <td class="text-center" scope="col">
                                            <a href="categories.php?mid=<?php echo $row['id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')" style="border-radius: 50px;">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                            $cnt=$cnt+1;
                                    }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $('.tm-product-name').on('click', function() {
                window.location.href = "edit-accessory.php";
            });
        })
    </script>
</body>

</html>
