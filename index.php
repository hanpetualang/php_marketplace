<?php
    include_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head><title>AeroStreet Login</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="./style/homeStyle.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="./style/img/logo2.png" class="logo" alt="AeroStreet">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-link active"  href="#">HOME</a>
            <a class="nav-link" aria-current="page" href="#">PRODUCT</a>
            <a class="nav-link" href="#">LOGIN</a>
            <a class="nav-link" href="#" tabindex="-1">CONTACT</a>
            <img src="./style/img/bag.png" style="width: 25px; height: 25px; margin-top: 5px; margin-left: 20px">
        </div>
        </div>
    </div>
    </nav>
    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <div class="jumbotron">
            <img src="./style/img/logo1.png" alt="" class="brand">
            <br>
            <a class="btn btn-lg" href="login.php" role="button"><b>SHOP NOW</b></a>
        </div>
        </div>
    </div>
</body>
</html>