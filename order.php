<?php
session_start();
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
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
       require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';
if(isset($_GET["id"]))
{

    $id1=$_GET["id"];
$_SESSION["id"]=$id1;
}   
$id1=$_SESSION["id"];


if(isset($_POST['submit']))
{
 



        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $venue = trim($_POST['venue']);
        $venue = strip_tags($venue);
        $venue = htmlspecialchars($venue);
        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $phone = trim($_POST['phone']);
        $phone = strip_tags($phone);
        $phone = htmlspecialchars($phone); 

        $date = trim($_POST['date']);
        $date = strip_tags($date);
        $date = htmlspecialchars($date);        
        
        
       $test="SELECT * FROM booking WHERE id='$id1' AND dates='$date'";
        $result=mysqli_query($conn,$test);
        $lenght=mysqli_num_rows($result);
        if ($lenght==0) {
        

           

        $sql="INSERT INTO booking (name,venue,dates,phone,email,id) VALUES ('$name','$venue','$date','$phone','$email','$id1')";
        mysqli_query($conn,$sql);
    
        
      

 
        

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
    $mail->addAddress($email,'nimbus');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    
    


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your order is placed';
    $mail->Body    = 'your booking is placed the photographer will contact you shortly';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';

    
}
    catch(Exception $e)
    {
    	echo "not send";
    }

header('Location: confirm.php'); 
        }



        else{


         echo " 
<div class='style-msg alertmsg'>
         <div class='sb-msg'><i class='icon-warning-sign'></i><strong>Warning:</strong> Select Another Date</div> 
</div>
         ";
        }
}




        

?>






<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<?php
require 'header.php';
?>
<div class="container">
<CENTER>
<div class="card-body" style="padding: 40px;">
<form class="nobottommargin" action="order.php" method="POST">
<h3>Enter Your Details</h3>
<div class="row">
<div class="col">
<label for="template-contactform-name">Name <small>*</small></label>
<input type="text"  class="sm-form-control required" name="name" />
</div>
<div class="col">
<label for="template-contactform-name">Mobile No <small>*</small></label>
<input type="text"  class="sm-form-control required" name="phone" />
</div>
</div>
<br>

<div class="row">
<div class="col">
<label for="template-contactform-name">Email <small>*</small></label>
<input type="text"  class="sm-form-control required" name="email" />
</div>
<div class="col">
<label for="template-contactform-name">Date</label>
<input type="date" name='date' class="sm-form-control required" list="thesedates" min="2019-03-03" >

</div>
</div>
<br>
<div class="row">
<div class="col">
<label for="">Venue <small>*</small></label>
<input type="textarea"  class="sm-form-control required" name="venue" >
</div>
</div>
<br>
<br>

<div class='col_full nobottommargin'>

<input type="submit" value="submit" class='button button-3d button-black nomargin'   name="submit">
</a>
</div>


</form>
</div>
</CENTER>
</div>
<!-------------------------------------------------footer-------------------------------->
<?php
require 'footer.php';
?>
<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>


<script src="js/components/moment.js"></script>
<script src="js/components/datepicker.js"></script>
<script src="js/components/timepicker.js"></script>

<script src="js/components/daterangepicker.js"></script>

<script>
		$(function() {
			$('.travel-date-group .default').datepicker({
				autoclose: true,
				startDate: "today",
			});

			$('.travel-date-group .today').datepicker({
				autoclose: true,
				startDate: "today",
				todayHighlight: true
			});

			$('.travel-date-group .past-enabled').datepicker({
				autoclose: true,
			});
			$('.travel-date-group .format').datepicker({
				autoclose: true,
				format: "dd-mm-yyyy",
			});

			$('.travel-date-group .autoclose').datepicker();

			$('.travel-date-group .disabled-week').datepicker({
				autoclose: true,
				daysOfWeekDisabled: "0"
			});

			$('.travel-date-group .highlighted-week').datepicker({
				autoclose: true,
				daysOfWeekHighlighted: "0"
			});

			$('.travel-date-group .mnth').datepicker({
				autoclose: true,
				minViewMode: 1,
				format: "mm/yy"
			});

			$('.travel-date-group .multidate').datepicker({
				multidate: true,
				multidateSeparator: " , "
			});

			$('.travel-date-group .input-daterange').datepicker({
				autoclose: true
			});

			$('.travel-date-group .inline-calendar').datepicker();

			$('.datetimepicker').datetimepicker({
				showClose: true
			});

			$('.datetimepicker1').datetimepicker({
				format: 'LT',
				showClose: true
			});

			$('.datetimepicker2').datetimepicker({
				inline: true,
				sideBySide: true
			});

			$('.datetimepicker3').datetimepicker();

		});

		$(function() {
			// .daterange1
			$(".daterange1").daterangepicker({
				"buttonClasses": "button button-rounded button-mini nomargin",
				"applyClass": "button-color",
				"cancelClass": "button-light"
			});

			// .daterange2
			$(".daterange2").daterangepicker({
				"opens": "center",
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'MM/DD/YYYY h:mm A'
				},
				"buttonClasses": "button button-rounded button-mini nomargin",
				"applyClass": "button-color",
				"cancelClass": "button-light"
			});

			// .daterange3
			$(".daterange3").daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			},
			function(start, end, label) {
				var years = moment().diff(start, 'years');
				alert("You are " + years + " years old.");
			});

			// reportrange
			function cb(start, end) {
				$(".reportrange span").html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
			cb(moment().subtract(29, 'days'), moment());

			$(".reportrange").daterangepicker({
				"buttonClasses": "button button-rounded button-mini nomargin",
				"applyClass": "button-color",
				"cancelClass": "button-light",
				ranges: {
				   'Today': [moment(), moment()],
				   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				   'This Month': [moment().startOf('month'), moment().endOf('month')],
				   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);

			// .daterange4
			$(".daterange4").daterangepicker({
				autoUpdateInput: false,
				locale: {
					cancelLabel: 'Clear'
				},
				"buttonClasses": "button button-rounded button-mini nomargin",
				"applyClass": "button-color",
				"cancelClass": "button-light"
			});

			$(".daterange4").on('apply.daterangepicker', function(ev, picker) {
				$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			});

			$(".daterange4").on('cancel.daterangepicker', function(ev, picker) {
				$(this).val('');
			});

		});

	</script>

</body>

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Dec 2018 09:57:16 GMT -->
</html>