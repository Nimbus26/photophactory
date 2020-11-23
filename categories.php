<?php

require 'db.php';

session_start();
$vik=$_GET['cat'];
$_SESSION['cat']=$vik;

?>






<!DOCTYPE html>
<html dir="ltr" lang="en-US">


<?php

require 'header.php';
?>
<CENTER>
	<div class="container">
		<div class="card-body" style="padding: 40px;">

<form  action="list.php" method="get">
<h3>Enter your Choice</h3>

<div class="row">
<div class="col">
<label for="template-contactform-name">City <small>*</small></label>
<input type="text"  class="sm-form-control required" required="" name="city" />
</div>
<br>
<div class="col">
<label for="template-contactform-name">State <small>*</small></label>
<input type="text"  class="sm-form-control required" required="" name="state" />
</div>
</div>
</div>

<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit">Continue Booking</button>

</form>
</div>
</div>
</CENTER>


<br>
<br>
<!-------------------------------------------------footer-------------------------------->
<?php

require 'footer.php';

?>


<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:57:16 GMT -->
</html>