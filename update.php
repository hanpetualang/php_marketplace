<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
  session_start();
  include_once("navbar.php");
  include_once("connection.php"); // Using database connection file here
  
  $qry = mysqli_query($connect, "SELECT * FROM product WHERE id = $_POST[id];");
  $row = mysqli_fetch_assoc($qry);

  if(!isset($_SESSION['userweb']))
      header("location: index.php");
  if($_SESSION['status']=="user")
    header("location:index.php");
?>
      <!DOCTYPE html>
      <html>
      <head>
        <title>AeroStreet</title>
        <link rel="stylesheet" href="./style/loginStyle.css">
      </head>
      <body style='background: black; color: white'>
      
      <?php
      
      if(isset($_POST["submit"]))
      {
        if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){      
          $var1 = rand(1111,9999);  // generate random number in $var1 variable
          $var2 = rand(1111,9999);  // generate random number in $var2 variable
        
          $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
          $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number
      
          $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
          $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
          $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name
          //this is for validating file extension
          $split = explode(".", $fnm);
          $extenstion = $split[1];
          $allowed = array("jpg", "png", "jpeg", "webp");
          if (!in_array($extenstion, $allowed)) {
            echo "<center><h4>Extension Not Allowed</h4></center>";
          }
          //if file extension allowed then add to databases
          else{
            move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
          
            $qry = "UPDATE product SET tipe='$_POST[Type]', harga='$_POST[Price]', ukuran='$_POST[Size]', stok='$_POST[Stock]', img='$dst_db' WHERE id = $_POST[id];";
            $check = mysqli_query($connect,$qry);  // executing insert query
            if($check)
              header('location:admin.php');
            else
              echo $qry . "GAGAL";
          }  
        } else {
          $qry = "UPDATE product SET tipe='$_POST[Type]', harga='$_POST[Price]', ukuran='$_POST[Size]', stok='$_POST[Stock]' WHERE id = $_POST[id];";
            $check = mysqli_query($connect,$qry);  // executing insert query
            if($check)
             header('location:admin.php');
            else
              echo $qry . "GAGAL";
        }
      }
      ?>
      <div class='container position-absolute text-center start-50 top-50 translate-middle'>
      <h2>Insert Data</h2>
      <div class="mb-3 row">
        <!-- Insert Data Here -->
      <form method="post" enctype="multipart/form-data">
            <input type="number" value = "<?= $row['id']; ?>" name = "id" hidden>
            <h6>Type</h6>
            <input type="text" name="Type" placeholder="Type" value="<?= $row['tipe']; ?>" required><br><br>
            <h6>Price</h6>
            <input type="number" name="Price" placeholder="Price" value="<?= $row['harga']; ?>" required><br><br>
            <h6>Size</h6>
            <input type="number" name="Size" placeholder="Size" value="<?= $row['ukuran']; ?>" required><br><br>
            <h6>Stock</h6>
            <input type="number" name="Stock" placeholder="Stock" value="<?= $row['stok']; ?>" required><br><br>
            <h6>Image</h6>
            <input type="file" name="image"><br><br>
            <input type="submit" name="submit" value="Upload" accept="image/*">
      </form>
      </div>
      </div>
      </body>
      <style>
        input{
          width: 300px;
        }
      </style>
      </html>
      
      