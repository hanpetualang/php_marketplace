<?php
    session_start();
    include 'connection.php';
    if(!isset($_SESSION['userweb']))
        header("location: index.php");
    include_once("navbar.php");
?>
<html>
    <head>
        <title>Hehe</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/productStyle.css">
    </head>
    <body>
    <h1>Sabar broh, belom jadi</h1>
    <h1><a href="index.php">Home</a></h1>
    <h1><a href="logout.php">Log Out</a></h1>
    </body>
</html>