<?php
    session_start();
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['login'])) {
        $email=$_POST['email'];
        $password=md5($_POST['password']);

        $query=mysqli_query($con,"select id from user where  email='$email' && password='$password' ");
        $ret=mysqli_fetch_array($query);

        if($ret>0 ){
            $_SESSION['aid']=$ret['id'];
            header('location:index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
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

<body class="bg03">
    <div class="container">
        <div class="row tm-mt-big">
            <div class="col-12 mx-auto tm-login-col">
                <div class="tm-block textwhite" style="opacity: 0.8;background-color: yellow; border-radius: 50px;">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="./img/logo.png" width="200" />
                            <h2 class="tm-block-title mt-3 textwhite" style="color: black;">Shopping Mall</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form method="post" action="index.php" class="tm-login-form">
                                <div class="input-group">
                                    <label for="email" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label" style="color: black;">Email</label>
                                    <input name="email" type="email" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="email" required style="border-radius: 50px;">
                                </div>
                                <div class="input-group mt-3">
                                    <label for="password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label" style="color: black;">Password</label>
                                    <input name="password" type="password" class="form-control validate" id="password" required style="border-radius: 50px;">
                                </div>
                                <div class="input-group mt-3">
                                    <button type="submit" name="login" class="btn btn-primary d-inline-block mx-auto textwhite" style="color: black; background-color: white; border-radius: 50px;">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>