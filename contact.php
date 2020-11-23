<?php

require 'db.php';


if(isset($_POST['submit']))
{
		$name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $phoneno = trim($_POST['phone']);
        $phoneno = strip_tags($phoneno);
        $phoneno = htmlspecialchars($phoneno);
        
        $subject = trim($_POST['subject']);
        $subject = strip_tags($subject);
        $subject = htmlspecialchars($subject);
        
        $services = trim($_POST['service']);
        $services = strip_tags($services);
        $services = htmlspecialchars($services);

        $message = trim($_POST['message']);
        $message = strip_tags($message);
        $message = htmlspecialchars($message);



// $test="SELECT * FROM profile WHERE email='$email'";
//         $result=mysqli_query($connection,$test);
//         $lenght=mysqli_num_rows($result);
//         if ($lenght==0) {


	$sqlquery="INSERT INTO contact (name,email,phoneno,subject,service,message) VALUES ('$name','$email','$phoneno','$subject','$services','$message')";
	mysqli_query($conn,$sqlquery);
	echo "hey";
}

?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">


<?php
require "header.php";
?>



<section id="content">
<div class="content-wrap">
<div class="container clearfix">


<h3>Send us an Email</h3>

<form  action="contact.php" method="POST">

<div class="col_one_third">
<label for="template-contactform-name">Name <small>*</small></label>
<input type="text"  class="sm-form-control required" name="name" />
</div>
<div class="col_one_third">
<label for="template-contactform-email">Email <small>*</small></label>
<input type="email" class="required email sm-form-control" name="email" />
</div>
<div class="col_one_third col_last">
<label for="template-contactform-phone">Phone</label>
<input type="text" class="sm-form-control" name="phone" />
</div>
<div class="clear"></div>
<div class="col_two_third">
<label for="template-contactform-subject">Subject <small>*</small></label>
<input type="text"  class="required sm-form-control" name="subject" />
</div>
<div class="col_one_third col_last">
<label for="template-contactform-service">Services</label>
<select id="template-contactform-service"  class="sm-form-control" name="service">
<option value="">-- Select One --</option>
<option value="PhotoShoot">PhotoShoot</option>
<option value="Video Shoot">Video Shoot</option>
<option value="Photo Editing">Photo Editing</option>

</select>
</div>
<div class="clear"></div>
<div class="col_full">
<label for="template-contactform-message">Message <small>*</small></label>
<textarea class="required sm-form-control" id="template-contactform-message"  rows="6" cols="30" name="message"></textarea>
</div>
<div class="col_full hidden">
<input type="text" id="template-contactform-botcheck"  value="" class="sm-form-control" />
</div>
<div class="col_full">
<input  type="submit" value="Send Message" class='button button-3d button-black nomargin' name="submit"></div>
</form>
</div>
</div>


</div>
</div>
</section>

<?php
require "footer.php";
?>
</html>