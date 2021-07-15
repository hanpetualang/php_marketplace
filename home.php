<?php
session_start();
require 'connection.php';

$produk = mysqli_query($connect, "SELECT * FROM product");
if (!isset($_SESSION['userweb']))
    header("location: index.php");

if(isset($_POST['mail'])){
    $email = $_POST['mail'];
    setcookie('username', $_POST['mail'], time() + (60 * 60 * 24 * 5), '/');
}
    
    include_once("navbar.php");
if(isset($_POST['addtocart'])){
    $email = $_POST['mail'];
    $id_prod = $_POST['product_id'];
    mysqli_query($connect, "INSERT INTO orders (email, product_id) VALUES ('$email', $_POST[product_id]);");
}
?>
<html>

<head>
    <title>AeroStreet</title>
    <link rel="stylesheet" href="./style/productStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin-right: 30px;
            margin-top: 60px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php foreach ($produk as $row) : ?>
                <div class="card" style="width: 18rem;">
                <form action="" method="POST">
                    <img width="150" height="200" src="<?= $row['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4><b><?= $row["tipe"]; ?></b></h4>
                        <p><?= $row["harga"]; ?></p>
                        <p><?= $row["ukuran"]; ?></p>
                        <p><?= $row["stok"]; ?></p>
                        <div style="text-align: right; font-size: 24px;">
                        <input type="mail" name="mail" value="<?=$email?>" hidden>
                        <input type="number" name="product_id" value ="<?= $row['id']?>" hidden>
                        <button type='submit' name='addtocart'><b>&plus;</a></b></button>
                        </div>
                    </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>