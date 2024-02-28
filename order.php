<?php 
session_start();
error_reporting(0);
include('connection.php');

$mid = $_REQUEST['orderid'];

// if (strlen($_SESSION['uid']==0)) {
//     header('location:logout.php');
// } else {
    if(isset($_POST['submit'])) {
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $onum=mt_rand(100000000, 999999999);

        $query=mysqli_query($con,"insert into orders(name, phone, address, order_no) value('$name','$phone','$address','$onum')");

        if ($query) {
            echo '<script>alert("Order Sent Successful!")</script>';
            echo "<script>window.location.href='ordersuccess.php'</script>";  
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body background="./img/ps5regi.jpg" style="background-size:cover; background-position: center; background-repeat: no-repeat;">

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
                        <a class="nav-link" href="./products.php" style="margin: 0px 15px; padding: 0px;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php" style="margin: 0px 15px; padding: 0px;">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="margin-top: 50px; display: flex; justify-content: space-between;">
        <div class="col-md-5">
            <div class="tm-bg-black-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact" style="background-color: rgba(255, 255, 0, 0.5); border-radius: 50px;">
                <h2 class="tm-section-title" style="color: white; font-weight: bold; text-shadow: 3px 3px 2px black;">Order</h2>

                <!-- contact form -->
                <form method="post" class="tm-contact-form">

                    <div class="form-group">
                        <input type="text" id="contact_name" name="name" class="form-control" placeholder="Your Name" style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                            required/>
                    </div>

                    <div class="form-group">
                        <input type="text" id="contact_email" name="phone" class="form-control" placeholder="Your Phone" style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                            required/>
                    </div>

                    <div class="form-group">
                        <textarea id="contact_address" name="address" class="form-control" rows="5" placeholder="Address" style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                            required></textarea>
                    </div>

                    <div class="d-flex justify-content-evenly">
                        <input type="submit" name="submit" id="submit" value="Order" class="submit_button btn btn-warning px-3" style="background-color: white; color: black; border-radius: 50px; box-shadow: 3px 3px 5px black;" />
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-5 tm-bg-black-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact" style="background-color: rgba(255, 255, 255, 0.5); border-radius: 50px; padding: 20px 0px">
        <?php
            $ret=mysqli_query($con,"select * from product where id='$mid' ");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) { ?> 
            <center>
                <h2 style="color:rgb(255, 255, 0); font-weight: bold; text-shadow: 3px 3px 2px black;"><?php  echo $row['name'];?></h2><br/>
                <img src="admin/img/<?php echo $row['image']?>" width="300 " height="400 " />
                <h4 style="color:rgb(255, 255, 0); margin-top:20px; font-weight: bold; text-shadow: 3px 3px 2px black; ""><?php  echo $row['price'];?></h4>
            </center>
            <?php $cnt=$cnt+1; } ?>
        </div>
    </div>
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

</html>