<?php


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

    
 


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<?php 


require 'header.php';

?>
<body>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
<center>
<div class="card-body" style="padding-left: 200px;padding-right: 200px;">    
<form class="nobottommargin" action="forgot_password1.php" method="post">

<label for="register-form-name">ENTER THE Email</label>
<input type="text" id="register-form-name" name="email" value="" class="form-control" />
</div>

</div>
<center>
<br><br>
<div class="col_full nobottommargin">
<button class="button button-3d button-black nomargin" id="register-form-submit" name="submit" value="register">SUBMIT</button>
</div>
</center>
</form>
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
