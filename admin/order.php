<?php
session_start();
error_reporting(0);
include('connection.php');

// if (strlen($_SESSION['aid']==0)) {
//     header('location:logout.php');
// } else { 
    if($_GET['oid']) {
        $oid=$_GET['oid'];
        mysqli_query($con,"delete from orders where order_no ='$oid'");
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='order.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Page</title>
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

<body id="reportsPage" style="background: url('img/dash-bg-03.jpg') center cover;">
    <div class="" id="home">
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
                                    <a class="nav-link" href="products.php">Products</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" href="order.php">Order</a>
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
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="tm-block h-100" style="border-radius: 50px; background-color:rgba(255, 255, 255, 0.8);">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Order</h2>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Address</th>
                                        <th scope="col" class="text-center">Order Number</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ret=mysqli_query($con,"select * from orders");
                                    $cnt=1;

                                    while ($row=mysqli_fetch_array($ret)) {
                                    ?>
                                    <tr>
                                        <td class="tm-product-name text-center">
                                            <?php  echo $row['name']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php  echo $row['phone']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php  echo $row['address']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php  echo $row['order_no']; ?>
                                        </td>
                                        <td class="text-center"><a href="order.php?oid=<?php echo $row['order_no'];?>" style="border-radius: 50px;" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
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
</body>

</html>
