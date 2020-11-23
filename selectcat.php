<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
       require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

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

        $firstname = $_POST['first'];
        $lastname =$_POST['last'];
  		$phoneno = $_POST['phoneno'];
        $email = $_POST['email'];
        $address =$_POST['address'];
 	    $state = $_POST['state'];
        $city = $_POST['city'];
        $category = $_POST['category'];
        $zip = $_POST['zip'];
        $photographer=$_POST['photographer'];
        $date=$_POST['date'];
        
       
        $maill=$email;          

        $query="Insert into ordertb1 values('$firstname','$lastname','$email','$address','$city','$state','$zip','$category','$phoneno','$photographer','$date')";
        $result=mysqli_query($conn,$query);

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tripathinimesh2000@gmail.com';                 // SMTP username
    $mail->Password = 'dalesteyn';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tripathinimesh2000@gmail.com', 'Mailer');
    $mail->addAddress($maill, 'nimbus');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    
    


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = ' you appoinment is done';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';
    


}  catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ';
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

<title>Photo Phactory</title>
</head>
<body class="stretched">

<div id="wrapper" class="clearfix">

<?php
require "header.php"
?>
<div class="container">

<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">
<!--------------------------------form-------------------------------->
<h3> Enter Your Details</h3> 
<form action="selectcat.php" method="POST" enctype="multipart/form-data">
	
<div class="form-group col-md-4">
<label for="inputCity">First Name</label>
<input type="text" class="form-control" id="inputName" name="first" required="">
</div>

<div class="form-group col-md-4" >
<label for="inputCity"> Last Name</label>
<input type="text" class="form-control" id="inputName" name="last" required="">
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputmob">Mobile</label>
<input type="text" class="form-control" id="inputmob" name="phoneno" placeholder="Mobile" required="">
</div>

<div class="form-group col-md-6">
<label for="inputEmail4">Email</label>
<input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required="">
</div>
<div class="form-group col-md-4">
<label for="inputState">Category</label>
<select id="inputState" class="form-control" name="category">
<option id="cat1">Wedding</option>
<option id="cat2">Birthday</option>
<option id="cat3">Multi</option>
</select>
</div>
<div class="col_full">
<div class="form-group col-md-4">
	
<label for="inputState">Photographers</label>
<select id="inputState" class="form-control" name="photographer">
<?php 
 $fetch=mysqli_query($conn,"SELECT firstname,lastname from profile")or die(mysqli_error());

                                                                      $lenght=mysqli_num_rows($fetch);
                                                                   if ($lenght!=0) {
                                                                while($row=mysqli_fetch_array($fetch))
                                                                {
                                                                	$first=$row['firstname'];
                                                                    $last=$row['lastname'];
                                                                    $print="

                                                                    	<option>$first $last</option>
																	";
																	echo $print;
                                                                }
                                                            }
	?>

</select>
</div>
<div class="form-group col-md-4">
<label for="inputState">Date</label>
<input type="text" value="" class="form-control tleft today" placeholder="MM/DD/YYYY" name=date>
</div>

</div>
<div class="form-group col-md-4">
<div class="form-group">
<label for="inputAddress">Address</label>
<input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" required="">
</div>
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
<br>
<div class="form-group col-md-2">
<input type="submit" class="btn btn-primary" name="submit"  value="Proceed" >
</div>
</form>
</section>
</div>
    


 
<!-------------------------------------------------footer-------------------------------->
<?php
require "footer.php";
?>


<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>


</html>