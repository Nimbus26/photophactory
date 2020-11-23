<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
       require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

//Load Composer's autoloader


 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    // but I strongly suggest you to use PDO or MySQLi.
    
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME',  'photo1');
    
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

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

$_SESSION['email']=$email;        
         
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
    $sol="UPDATE loginform SET otp='$code' WHERE email='$maill'";
        mysqli_query($conn,$sol);
        

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tripathinimesh2000@gmail.com';                 // SMTP username
    $mail->Password = 'dalesteyn';                           // SMTP password
    $mail->SMTPSecure = 'STARTTLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tripathinimesh2000@gmail.com', 'Mailer');
    $mail->addAddress('tripathinimesh2000@gmail.com', 'nimbus');     // Add a recipient
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
    

$tes="SELECT otp FROM loginform WHERE email='$maill'";
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
     header('Location: change.php'); 
}
else
{
     echo "wrong otp enter again";    
   
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
<center>
<div class="card-body" style="padding-left: 400px;padding-right: 400px;">    
<form id="register-form" name="register-form" class="nobottommargin" action="forgot_password1.php" method="post">
<div class="col_full">
<label for="register-form-name">ENTER THE OTP</label>
<input type="text" id="register-form-name" name="otp" value="" class="form-control" />
</div>

</div>
<center>
<div class="col_full nobottommargin">
<button class="button button-3d button-black nomargin" id="otp" name="resend" value="register">SEND OTP</button>
</div>
<br><br>
<div class="col_full nobottommargin">
<button class="button button-3d button-black nomargin" id="register-form-submit" name="submi" value="register">SUBMIT</button>
</div>
</center>
</form>
</div>
</center>
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
