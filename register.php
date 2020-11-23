<?php
require 'db.php';

session_start();

if(isset($_POST['sub']))
{

        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $age = trim($_POST['age']);
        $age = strip_tags($age);
        $age = htmlspecialchars($age);

        $phone = trim($_POST['phone']);
        $phone = strip_tags($phone);
        $phone = htmlspecialchars($phone);
        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        $address = trim($_POST['address']);
        $address = strip_tags($address);
        $address = htmlspecialchars($address);
        
        $state = trim($_POST['state']);
        $state = strip_tags($state);
        $state = htmlspecialchars($state);

        $city = trim($_POST['city']);
        $city = strip_tags($city);
        $city = htmlspecialchars($city);

        $category = trim($_POST['category']);
        $category = strip_tags($category);
        $category = htmlspecialchars($category);

        $zip = trim($_POST['zip']);
        $zip = strip_tags($zip);
        $zip = htmlspecialchars($zip);
       
        $target_dir = "photo/material/images/profile/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable


    
       $image=$_FILES["image"]["name"];
      
        
        
        $test="SELECT id FROM profile WHERE email='$email'";
        $result=mysqli_query($conn,$test);
        $lenght=mysqli_num_rows($result);
        if ($lenght==0) {
           
$sql="INSERT INTO profile(name, email, address, city, state, zip, category, image,phone,age,password) VALUES ('$name','$email','$address','$city','$state','$zip','$category','$image','$phone','$age','$password')";
        mysqli_query($conn,$sql);
    
  $sql="INSERT INTO loginform(email,user,pass)VALUES('$email','$name','$password')";
  mysqli_query($conn,$sql); 
       
    }



        
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:55:39 GMT -->
<?php 


require 'header.php';


?>
<body>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">
<ul class="tab-nav tab-nav2 center clearfix">
<li class="inline-block"><a href="#tab-login">Login</a></li>
<li class="inline-block"><a href="#tab-register">Register</a></li>
</ul>
<div class="tab-container">
<div class="tab-content clearfix" id="tab-login">
<div class="card nobottommargin">
<div class="card-body" style="padding: 40px;">
<form id="login-form" name="login-form" class="nobottommargin" action="login.php" method="POST">
<h3>Login to your Account</h3>
<div class="col_full">
<label for="login-form-username">Username:</label>
<input type="text" id="login-form-username" name="username" class="form-control" />
</div>
<div class="col_full">
<label for="login-form-password">Password:</label>
<input type="password" id="login-form-password" name="password" class="form-control" />
</div>
<div class="col_full nobottommargin">
<input type="submit"class="button button-3d button-black nomargin" id="register-form-submit" name="submit" value="login">
<a href="forgot_password.php" class="fright">Forgot Password?</a>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="tab-content clearfix" id="tab-register">
<div class="card nobottommargin">
<div class="card-body" style="padding: 40px;">
<h3>Register for an Account</h3>
<form id="register-form" name="register-form" class="nobottommargin" action="register.php" enctype="multipart/form-data" method="post">
<div class="col_full">
<label for="register-form-name">Name:</label>
<input type="text" id="register-form-name" name="name" value="" class="form-control" />
</div>
<div class="col_full">
<label for="register-form-name"> Email:</label>
<input type="text" id="register-form-name" name="email" value="" class="form-control" />
</div>
<div class="col_full">
<label for="register-form-name"> Phone no</label>
<input type="text" id="register-form-name" name="phone" value="" class="form-control" />
</div>
<div class="col_full">
<label for="register-form-password">Choose Password:</label>
<input type="password" id="register-form-password" name="password" value="" class="form-control" />
</div>
<div class="col_full">
<label for="register-form-name"> AGE</label>
<input type="text" id="register-form-name" name="age" value="" class="form-control" />
</div>
<div class="col_full">
<label for="register-form-name">category</label>
<select id="inputState" class="form-control" name="category">
<option selected="">photoshoot</option>
<option>videoshoot</option>
<option>photoediting</option>
</select>
</div>

<div class="col_full">
<label for="register-form-name">Address</label>
<input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required="">
</div>


<div class="col_full">
<label for="register-form-name">City</label>
<input type="text" class="form-control" id="inputCity" name="city" required="">
</div>
<div class="col_full">
<label for="register-form-name">state</label>
<input type="text" class="form-control" id="inputstate" name="state" required="">
</div>
<div class="col_full">
<label for="register-form-name">Zip</label>
<input type="text" class="form-control" id="inputZip" name="zip" required="">
</div>
<div class="col_full">
<label for="register-form-name">Profile pic</label><br>
<input type="file" name="image">
</div>

<div class="col_full nobottommargin">
<input type="submit"class="button button-3d button-black nomargin" id="register-form-submit" name="sub" value="register">
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
<!-------------------------------------------------footer-------------------------------->
<?php

require 'footer.php';
?>


<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>


<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:57:16 GMT -->
</html>
