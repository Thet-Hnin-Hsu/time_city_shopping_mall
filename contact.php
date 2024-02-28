<?php
    session_start();
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['sub']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        
        $query=mysqli_query($con, "insert into contact(name,email,message) value('$name','$email','$message')");

        if ($query) {
            echo "<script>alert('Your message was sent successfully!.');</script>";
            echo "<script>window.location.href ='index.php'</script>";
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

    <title>Contact</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body>

    <!-- Navigation -->
    <div class="tm-nav navfixed">
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
                        <a class="nav-link current" href="./contact.php" style="margin: 0px 15px; padding: 0px;">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <section class="tm-section tm-section-contact">
        <div class="tm-page-content-width" id="contact">
            <div class="tm-bg-black-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact tm-content-box  tm-content-box-right" style="background-color: rgba(255, 255, 255, 0.5);">
                <h2 class="tm-section-title" style="color: yellow; font-weight: bold; text-shadow: 3px 3px 2px black;">Contact Us</h2>

                <!-- contact form -->
                <form name="contact" method="post" class="tm-contact-form">
                    <div class="form-group">
                        <input type="text" id="contact_name" name="name" class="form-control" placeholder="Your Name" required style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                        />
                    </div>

                    <div class="form-group">
                        <input type="email" id="contact_email" name="email" class="form-control" placeholder="Your Email" required style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                        />
                    </div>

                    <div class="form-group">
                        <textarea id="contact_message" name="message" class="form-control" rows="5" placeholder="Message" required style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"></textarea>
                    </div>

                    <button type="submit" name="sub" class="tm-submit-btn" style="background-color: white; color: black; border-radius: 50px; box-shadow: 3px 3px 5px black;">Submit</button>

                </form>
            </div>
        </div>
    </section>
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