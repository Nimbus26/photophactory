
<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
       require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

//Load Composer's autoloader


 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    // but I strongly suggest you to use PDO or MySQLi.
    
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME',  'login');
    
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

        $username = trim($_POST['username']);
        $username = strip_tags($username);
        $username = htmlspecialchars($username);
         
        
        $_SESSION['user']=$username;
 


        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        $_SESSION['email']=$email;       
        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        $test="SELECT * FROM loginform WHERE user='$username'";
        $result=mysqli_query($conn,$test);
        $lenght=mysqli_num_rows($result);
        if ($lenght==0) {
            $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($conn,$username);
        $password = mysqli_real_escape_string($conn,$password);


        $sql="INSERT INTO loginform VALUES ('$email','$username','$password','01')";
        mysqli_query($conn,$sql);
  
 
 }
}

  

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function




    
  

 if(isset($_POST['resend']))
  {  
    

  

  

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$maill=$_SESSION['email'];
$user = $_SESSION['user'];
  $code = rand(1000,9000);
    $sol="UPDATE loginform SET otp='$code' WHERE user='$user'";
        mysqli_query($conn,$sol);
        

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
    $mail->addAddress('tripathinimesh2000@gmail.com', 'Joe User');     // Add a recipient
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
    $mail->Body    = $code;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';
    

$tes="SELECT otp FROM loginform WHERE user='$user'";
      $test= mysqli_query($conn,$tes);
$row = mysqli_fetch_array($test);
$test1 =$row['otp'];

$_SESSION['test1']=$test1;
}  catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ';
}

}



if(isset($_POST['submi']))
{ $test2=$_SESSION['test1'];

$otp=$_POST['otp'];
if($otp==$test2)
{
    echo $otp.$test2 ;
    echo "success";
}
else
{
   echo $otp;
   echo "fdedwsf";   
   
}
}


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
<body>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
<center>
<form id="register-form" name="register-form" class="nobottommargin" action="verify.php" method="post">
<div class="col_full">
<label for="register-form-name">ENTER THE OTP</label>
<input type="text" id="register-form-name" name="otp" value="" class="form-control" />
</div>

</div>
<center>
<div class="col_full nobottommargin">
<button class="button button-3d button-black nomargin" id="register-form-submit" name="resend" value="register">REFRESH</button>
</div>
<br><br>
<div class="col_full nobottommargin">
<button class="button button-3d button-black nomargin" id="register-form-submit" name="submi" value="register">SUBMIT</button>
</div>
</center>
</form>
</center>
</div>
</div>
</section>
</body>
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


<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:57:16 GMT -->
</html>
