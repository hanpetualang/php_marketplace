<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
    session_start();
    include_once("connection.php");
    include_once("navbar.php");
    mv();
    $qry = "SELECT * FROM user WHERE email='$_SESSION[userweb]'";
    $sql = mysqli_query($connect, $qry);
    $row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head><title>AeroStreet</title>
<script>
    // Function to check re-password | doesn't work
    var check = function() {
    if (document.getElementById('password').value == document.getElementById('re-password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="./style/signupStyle.css">
</head>
<body style="color: black;">   
    <div class="loginradius container position-absolute top-50 start-50 translate-middle">
        <div class="container-fuid signupform" style="box-sizing: border-box;">
            <div class="text-center" style="margin-top: 10px; font-size: 22px;"><b>My Account</b></div>
            <form method="post">
                <div class="left-form mb-3">
                    <input disabled required placeholder="Email" type="email" class="form-control field" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['email']?>">
                    <input type="email" name="email" value="<?=$row['email']?>" hidden>
                    <input required name="password" placeholder="Password" type="password" class="form-control field" id="exampleInputPassword1" onkeyup='check();'>
                    <br>
                    <input required name="name" placeholder="Name" type="text" class="form-control field" id="exampleInputEmail1" value="<?=$row['uname']?>">
                    <input required name="birthdate" placeholder="Birthday" type="date" class="form-control field" id="exampleInputEmail1" value="<?=$row['birthdate']?>">
                </div>
                <div class="right-form mb-3">
                    <input required name="re-password" placeholder="Re-Type Password" type="password" class="form-control field" id="exampleInputPassword1" onkeyup='check();'>
                    <span id='message'><br></span>
                    <select required id="cars" name="gender" class="form-control field" value="<?=$row['gender']?>">
                        <option value="" disabled selected>Gender</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                    </select>
                    <input required name="profession" placeholder="Profession" type="text" class="form-control field" id="exampleInputEmail1" value="<?=$row['profession']?>">
                </div>
                <div class="mb-3">
                    <input required name="address" placeholder="Address" type="text" class="form-control field" id="exampleInputEmail1" value="<?=$row['address']?>">
                </div>
                <div>
                    Please fill correctly
                </div>
                <div class="left-form mb-3">
                    <input required name="instagram" placeholder="Instagram" type="text" class="form-control field" id="exampleInputEmail1" value="<?=$row['instagram']?>">
                </div>
                <div class="right-form mb-3" style="margin-top: 0px;">
                    <input required name="phone" placeholder="Phone" type="number" class="form-control field" id="exampleInputPassword1" value="<?=$row['phone']?>">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary prs" name="update" style="margin-top: 20px;">Update</button>
                </div>
            </form>
        </div>
    </div>
    <?php
        //updating database
        if(isset($_POST['update'])){
            $qry = "UPDATE user SET uname = '$_POST[name]', password=md5('$_POST[password]'), gender='$_POST[gender]', 
                    birthdate='$_POST[birthdate]', profession='$_POST[profession]', address='$_POST[address]', instagram='$_POST[instagram]', phone='$_POST[phone]' WHERE email='$_POST[email]';";
            $update = mysqli_query($connect, $qry);
            echo $qry;
            if($update)
                echo "<div style='color: white;' class='text-center'>Data Updated</div>";
        }
    ?>
</body>
</html>
