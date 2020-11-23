<?php

    // this will avoid mysql_connect() deprecation error.
    require 'db.php';
session_start();
$cat=$_SESSION['cat'];

$city1=$_GET['city'];    
$state1=$_GET['state'];


 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<?php


require 'header.php';

?>

<body class="stretched">

<div id="wrapper" class="clearfix">
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
<?php                                                                 
                                                                  
                                                                    
                                                                      $val=0;
                                                                     $fetch=mysqli_query($conn,"SELECT * from profile WHERE city='$city1'")or die(mysqli_error());

                                                                      $lenght=mysqli_num_rows($fetch);
                                                                   if ($lenght!=0) {
                                                                while($row=mysqli_fetch_array($fetch)){
                                                                            $img =$row['image'];
                                                                            $fir=$row['zip'];
                                                                             $name=$row['name'];
                                                                           
                                                                            $email=$row['email'];
                                                                            $address=$row['address'];
                                                                            $id=$row['id'];

                                                                        $val=2;
                                                                            
                                                                            echo  "

                                                                           <div class='col'>
                                                                                <article class='portfolio-item pf-media pf-icons' >
                                                                            <div class='card'>
                                                                            
                                                                            <img src='photo/material/images/profile/$img' height='280px'width='280px'>
                                                                        
                                                                            <div class='portfolio-overlay'>
                                                                            <center>
                                                                            <a href='portfolio.php?id=$id' class='left-icon' ><i class='icon-line-plus'></i></a>
                                                                            </center>
                                                                            </div>
                                                                            </div>
                                                                            <div class='portfolio-desc'>
                                                                            <h5>NAME: $name</h5> 
                                                                            <h5>EMAIL: $email</h5>
                                                                            <h5>ADDRESS:$address</h5> 
                                                                            <a href='order.php?id=$id' class='button button-3d button-black nomargin'>Book Now</a>
                                                                            </div>
                                                                            </article>
                                                                                </div>
                                                                                
                                                                            
                                                                            ";
                                                                        
                                                                        
                                                                        }
                                                                     }


                                                                    if($val!=2){
                                                                         $fetch=mysqli_query($conn,"SELECT * from profile WHERE category ='$cat' AND state='$state1'")or die(mysqli_error());

                                                                      $lenght=mysqli_num_rows($fetch);
                                                                   if ($lenght!=0) {
                                                                while($row=mysqli_fetch_array($fetch)){
                                                                            $img =$row['image'];
                                                                            $zip=$row['zip'];
                                                                            $first=$row['firstname'];
                                                                            $last=$row['lastname'];
                                                                            $email=$row['email'];
                                                                            $address=$row['address'];
                                                                            
                                                                            $val=2;
                                                                            
                                                                            echo  "

                                                                            <div class='col'>
                                                                                <article class='portfolio-item pf-media pf-icons' >
                                                                            <div class='card'>
                                                                            
                                                                            <img src='photo/material/images/profile/$img' height='280px'width='280px'>
                                                                        
                                                                            <div class='portfolio-overlay'>
                                                                            <center>
                                                                            <a href='portfolio.php?id=$id' class='left-icon' ><i class='icon-line-plus'></i></a>
                                                                            </center>
                                                                            </div>
                                                                            </div>
                                                                            <div class='portfolio-desc'>
                                                                            <h5>NAME: $name</h5> 
                                                                            <h5>EMAIL: $email</h5>
                                                                            <h5>ADDRESS:$address</h5> 
                                                                            <a href='order.php?id=$id' class='button button-3d button-black nomargin'>Book Now</a>
                                                                            </div>
                                                                            </article>
                                                                                </div>
                                                                                
                                                                            
                                                                            ";
                                                                        
                                                                        }
                                                                    }

                                                                }

                                                                    if($val!=2){
                                                                         $fetch=mysqli_query($conn,"SELECT * from profile WHERE category ='$cat'")or die(mysqli_error());

                                                                      $lenght=mysqli_num_rows($fetch);
                                                                   if ($lenght!=0) {
                                                                while($row=mysqli_fetch_array($fetch)){
                                                                            $img =$row['image'];
                                                                            $fir=$row['zip'];
                                                                             $first=$row['firstname'];
                                                                            $last=$row['lastname'];
                                                                            $email=$row['email'];
                                                                            $address=$row['address'];
                                                                            $val=2;
                                                                            
                                                                            echo  "

                                                                            <div class='col'>
                                                                                <article class='portfolio-item pf-media pf-icons' >
                                                                            <div class='card'>
                                                                            
                                                                            <img src='photo/material/images/profile/$img' height='280px'width='280px'>
                                                                        
                                                                            <div class='portfolio-overlay'>
                                                                            <center>
                                                                            <a href='portfolio.php?id=$id' class='left-icon' ><i class='icon-line-plus'></i></a>
                                                                            </center>
                                                                            </div>
                                                                            </div>
                                                                            <div class='portfolio-desc'>
                                                                            <h5>NAME: $name</h5> 
                                                                            <h5>EMAIL: $email</h5>
                                                                            <h5>ADDRESS:$address</h5> 
                                                                            <a href='order.php?id=$id' class='button button-3d button-black nomargin'>Book Now</a>
                                                                            </div>
                                                                            </article>
                                                                                </div>
                                                                                
                                                                            
                                                                            ";
                                                                        
                                                                        }
                                                                    }
                                                                }
?>
</div>
</div>
</section>
</div>    
<!-------------------------------------------------footer-------------------------------->
<?php 

require 'footer.php';

?>


<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>


</html>
