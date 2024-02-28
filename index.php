<?php
    session_start();
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=md5($_POST['password']);

        $query=mysqli_query($con,"select id from user where email='$email' && password='$password' ");

        $ret=mysqli_fetch_array($query);
        if($ret>0) {
            $_SESSION['uid']=$ret['id'];
            header('location:products.php');
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
    <!--

Template 2084 Zipper

http://www.tooplate.com/view/2084-zipper

-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>

    <div class="container-fluid">
        <!-- Navigation -->
        <div class="tm-nav navfixed">
            <nav class="navbar">

                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar"></button>
                <!-- &#9776; ☰ -->
                <div class="collapse navbar-toggleable-sm text-xs-center tm-navbar" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active selected">
                            <a class="nav-link current" href="./index.php" style="margin: 0px 15px; padding: 0px;">Home <span class="sr-only">(current)</span></a>
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

        <section class="tm-section tm-section-home tm-flex-center" id="home" style="min-height: 700px;">

            <div class="tm-hero" style="margin: 0px; padding: 0px;">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 50px;">
                        <h1 class="text-uppercase tm-hero-title">Time City Shopping Mall</h1>
                        <p class="tm-hero-subtitle">Create your world with new products!</p>
                    </div>
                    <center>
                        <div class="tm-bg-black-translucent" style="padding:30px 15px;color:rgb(255, 255, 0); display:flex; justify-content: space-around; width: 600px; background-color: rgba(255, 255, 255, 0.5); border-radius: 50px;">
                            <div>
                                <img src="./img/g1.gif" height="150px" />
                            </div>
                            <div>
                                <h3 style="color: rgb(255, 255, 0); font-weight: bold; text-shadow: 3px 3px 2px black; margin-bottom: 50px;">Login</h3>
                                <form action="products.php" method="post" class="tm-contact-form">
                                    <input type="email" name="email" placeholder="Email" class="form-control2" style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                                    /><br/><br/>
                                    <input type="password" name="password" placeholder="Password" class="form-control2" style="background-color: rgba(0, 0, 0); color: white; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.4) inset, -5px -5px 10px rgba(255, 255, 255, 0.4) inset; border-radius: 50px;"
                                    /><br/><br/>
                                    <span style="color: rgb(255, 255, 0); font-weight: bold; text-shadow: 3px 3px 2px black;">Create New Account.</span><a href="./register.php" style="color: rgb(0, 0, 0); font-weight: bold; text-shadow: 3px 3px 2px rgb(255, 255, 255);"> Register</a><br/>
                                    <div class="col-12">
                                        <input type="submit" name="login" value="LOGIN" class="submit_button btn btn-primary mt-2" style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); border-radius: 50px; box-shadow: 3px 3px 5px rgb(255, 255, 255);" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </section>

        <!-- Section 2 -->
        <section class="tm-section tm-section-categories" id="about">

            <div class="tm-page-content-width">
                <div class="tm-bg-black-translucent tm-content-box tm-content-box-right tm-flex-center" style="background-color: rgba(255, 255, 0, 0.5);">
                    <div class="tm-content-box-inner">
                        <h2 class="tm-section-title" style="color: rgb(255, 255, 255); font-weight: bold; text-shadow: 3px 3px 3px rgb(0, 0, 0);">Shoppting @ Promotions</h2>
                        <p style="color: rgb(0, 0, 0); font-weight: bold; text-shadow: 1px 1px 2px rgb(255, 255, 255);">Enjoy shopping with Chinese New Year / Lunar Festival various promotions until 10th March. Don't miss special promotion within one month.</p>
                        <img src="./img/g2.gif" height="256px" />
                    </div>
                </div>
            </div>

        </section>

        <!-- Section 3 -->
        <section class="tm-section tm-section-services" id="services">

            <div class="tm-page-content-width">
                <div class="tm-bg-black-translucent tm-content-box tm-flex-center" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div class="tm-content-box-inner">
                        <h2 class="tm-section-title" style="color: rgb(0, 0, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(255, 255, 0);">The Most Luxurious Mall</h2>
                        <p style="color: rgb(255, 255, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(0, 0, 0);">Time City is the most luxurious shopping mall in yangon.</p>
                        <p style="color: rgb(255, 255, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(0, 0, 0);">There are many categoeries for who are interested in shooping with various products like fashions, educations, electronic, shoeses, vehicles, restaurants and many others.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4 -->
        <section class="tm-section tm-section-testimonials" id="testimonials">
            <div class="tm-page-content-width">
                <h2 class="tm-section-title tm-section-title-big text-xs-center" style="color: rgb(255, 255, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(0, 0, 0);">Categories</h2>
                <div class="row">
                    <div class="tm-3-col-container">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                            <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner" style="background-color: rgba(255, 255, 0, 0.5); border-radius: 50px; height: 500px;">
                                <img src="./img/res.gif" width="300px">

                                <p class="tm-text tm-margin-b-0" style="margin-top: 20px; color: rgb(0, 0, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(255, 255, 255);">
                                    <b>Printer, TV, mobile, iphone, laptop, cctv, wifi, categories.</b><br/> Fridge, aircon, fan, washing machine, vaccum cleaner, iron, rice cooker, lamps, bulbs, etc,.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                            <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner" style="background-color: rgba(255, 255, 255, 0.5); border-radius: 50px; height: 500px;">
                                <img src="./img/fas.gif" width="300px">

                                <p class="tm-text tm-margin-b-0" style="margin-top: 20px; color: rgb(0, 0, 0); font-weight: bold; text-shadow: 2px 2px 2px rgb(255, 255, 0);">
                                    <b>For both men and women with various ages,</b><br/> there are many choice to get perfect fashion with differen brands (shoeses, clothes, dresses, bags, glasses, hats, gloves, socks, pants, hairdresses)</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                            <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner" style="border-radius: 50px; height: 500px;">
                                <img src="./img/ec.gif" width="300px" height="200px">

                                <p class="tm-text tm-margin-b-0">
                                    <b>Upgraded for PS5.</b><br/> Whether they're already part of your library or you're jumping in for the first time, these PS4 products can be upgraded into PS5 versions that have major enhancements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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