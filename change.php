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

    
 
if(isset($_POST['sub']))
{

      $maill=$_SESSION['email'];
        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        $password1 = trim($_POST['password1']);
        $password1 = strip_tags($password1);
        $password1 = htmlspecialchars($password1);


        if($password==$password1)
        {
        $test="SELECT * FROM loginform WHERE email='$maill'";
        $result=mysqli_query($conn,$test);
        $lenght=mysqli_num_rows($result);
        if ($lenght==1) {
            
        $password = stripslashes($password);
       
        $password = mysqli_real_escape_string($conn,$password);


        $sql="UPDATE loginform SET pass='$password'  WHERE email='$maill'";
        mysqli_query($conn,$sql);
         
        header ('Location:index.php'); 
        }

    }
        else{


        	header ('Location:change.php');
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

<div class="card-body" style="padding-right: 400px;padding-left: 400px">
<form id="login-form" name="login-form" class="nobottommargin" action="change.php" method="POST">
<h4>Change password</h4>
<div class="col_full">
<label for="login-form-username">Password</label>
<input type="text" id="login-form-username" name="password" class="form-control" />
</div>
<div class="col_full">
<label for="login-form-password">Confirm Password</label>
<input type="password" id="login-form-password" name="password1" class="form-control" />
</div>
<div class="col_full nobottommargin">
<input type="submit"class="button button-3d button-black nomargin" id="register-form-submit" name="sub" value="Confirm">

</div>
</form>
</div>

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











