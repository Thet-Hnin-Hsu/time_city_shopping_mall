<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page</title>
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
                                <a class="nav-link active" href="index.php" style="color: black;">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="categories.php" style="color: black;">Categories</a>
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
            <div class="tm-col tm-col-big">
                <div class="tm-block" style="border-radius: 50px; background-color:rgba(255, 255, 255, 0.8);">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Accounts</h2>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Donec eget libero
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Nunc luctus suscipit elementum
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Maecenas eu justo maximus
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Pellentesque auctor urna nunc
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Sit amet aliquam lorem efficitur
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Pellentesque auctor urna nunc
                        </li>
                        <li class="tm-list-group-item" style="border-radius: 50px;">
                            Sit amet aliquam lorem efficitur
                        </li>
                    </ol>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="tm-block" style="border-radius: 50px; background-color:rgba(255, 255, 0, 0.8);">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit Account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="post" enctype="multipart/form-data" class="tm-signup-form">
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <input placeholder="Vulputate Eleifend Nulla" id="name" name="name" type="text" class="form-control validate" style="border-radius: 50px;" value="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email</label>
                                    <input placeholder="vulputate@eleifend.co" id="email" name="email" type="email" style="border-radius: 50px;" value="" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input placeholder="010-030-0440" id="phone" name="phone" type="tel" style="border-radius: 50px;" class="form-control validate" value="">
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-primary" name="submit" style="border-radius: 50px;">Update
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                        <a href="index.php?aid=<?php echo $row['id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')" style="border-radius: 50px;">Delete</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="tm-block" style="border-radius: 50px; background-color:rgba(255, 255, 0, 0.8);">
                    <h2 class="tm-block-title">Profile Image</h2>
                    <img src="img/profile.png" alt="Profile Image" class="img-fluid" style="border-radius: 50px;">
                    <div class="custom-file mt-3 mb-3">
                        <input id="fileInput" type="file" style="display:none;" />
                        <input type="button" class="btn btn-primary d-block mx-xl-auto" value="Upload New..." style="border-radius: 50px;" onclick="document.getElementById('fileInput').click();" />
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>
