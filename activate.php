<?php

    // this will avoid mysql_connect() deprecation error.
    error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    // but I strongly suggest you to use PDO or MySQLi.
    
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME',  'photo');
    
    $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
    $dbcon = mysqli_select_db($conn,DBNAME);
    
    if ( !$conn ) 
    {
        die("Connection failed : " . mysqli_error($conn));
    }
    
    if ( !$dbcon ) 
    {
        die("Database Connection failed : " . mysqli_error($conn));
    }
    
 
if(isset($_POST['submit']))
{

        $firstname = trim($_POST['first']);
        $firstname = strip_tags($firstname);
        $firstname = htmlspecialchars($firstname);

        $lastname = trim($_POST['last']);
        $lastname = strip_tags($lastname);
        $lastname = htmlspecialchars($lastname);
        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

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
       
     $target_dir = "images/";
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
        
        
        $test="SELECT * FROM profile WHERE email='$email'";
        $result=mysqli_query($conn,$test);
        $lenght=mysqli_num_rows($result);
        if ($lenght==0) {
           

        $sql="INSERT INTO profile( firstname, lastname, email, address, city, state, zip, category, image) VALUES ('$firstname','$lastname','$email','$address','$city','$state','$zip','$category','$image')";
        mysqli_query($conn,$sql);
    
        
       
    }



        
}
// Mysql_num_row is counting table row


// To protect MySQL injection (more detail about MySQL injection)


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:55:39 GMT -->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/swiper.css" type="text/css" />
<link rel="stylesheet" href="css/dark.css" type="text/css" />
<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="css/animate.css" type="text/css" />
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="css/responsive.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Canvas | The Multi-Purpose HTML5 Template</title>
</head>
<div id="wrapper" class="clearfix">

<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
<div id="header-wrap">
<div class="container clearfix">
<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

<div id="logo">
<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo%402x.png" alt="Canvas Logo"></a>
</div>
<nav id="primary-menu" class="dark">
<ul>
<li class="current"><a href="index.html"><div>Home</div></a></li>
<li class="current"><a href="index.html"><div>Home</div></a></li>
<li class="current"><a href="index.html"><div>Home</div></a></li>
<li class="current"><a href="index.html"><div>Home</div></a></li>	
</ul>
</div>
</div>
<!--------------------------------form-------------------------------->

<form action="activate.php" method="POST" enctype="multipart/form-data">
	<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">first Name</label>
<input type="text" class="form-control" id="inputName" name="first" required="">
</div>
</div>
<div class="form-group col-md-6" style="margin-left: -15px">
<label for="inputCity"> last Name</label>
<input type="text" class="form-control" id="inputName" name="last" required="">
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Email</label>
<input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required="">
</div>
<div class="form-group col-md-4">
<label for="inputState">category</label>
<select id="inputState" class="form-control" name="category">
<option selected="">Wedding</option>
<option>Birthday</option>
<option>Multi</option>
</select>
</div>
</div>
<div class="form-group">
<label for="inputAddress">Address</label>
<input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required="">
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">City</label>
<input type="text" class="form-control" id="inputCity" name="city" required="">
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">state</label>
<input type="text" class="form-control" id="inputstate" name="state" required="">
</div>
</div>
<div class="form-group col-md-2">
<label for="inputZip">Zip</label>
<input type="text" class="form-control" id="inputZip" name="zip" required="">
</div>
<input type="file" name="image">
</div>

<input type="submit" name="submit" class="btn btn-primary" value="submit">
</form>
    


 
<!-------------------------------------------------footer-------------------------------->
<footer id="footer" class="dark">
<div id="copyrights">
<div class="container clearfix">
<div class="col_half">
Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
</div>
<div class="col_half col_last tright"style="padding-top: 50px;padding-bottom: 50px">
<div class="fright clearfix">
<a href="#" class="social-icon si-small si-borderless si-facebook">
<i class="icon-facebook"></i>
<i class="icon-facebook"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-twitter">
<i class="icon-twitter"></i>
<i class="icon-twitter"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-gplus">
<i class="icon-gplus"></i>
<i class="icon-gplus"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-pinterest">
<i class="icon-pinterest"></i>
<i class="icon-pinterest"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-vimeo">
<i class="icon-vimeo"></i>
<i class="icon-vimeo"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-github">
<i class="icon-github"></i>
<i class="icon-github"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-yahoo">
<i class="icon-yahoo"></i>
<i class="icon-yahoo"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-linkedin">
<i class="icon-linkedin"></i>
<i class="icon-linkedin"></i>
</a>
</div>
<div class="clear"></div>
<i class="icon-envelope2"></i> <a href="http://themes.semicolonweb.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="553c3b333a1536343b2334267b363a38">[email&#160;protected]</a> <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
</div>
</div>
</div>
</footer>


<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:57:16 GMT -->
</html>