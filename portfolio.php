<?php



require 'db.php';




if(isset($_GET["id"]))
{

    $id1=$_GET["id"];
}


?>


<!DOCTYPE html>

<?php

require 'header.php';

?>
</head>

<body class="stretched">

<div id="wrapper" class="clearfix">
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
<?php                                                                 
                                                                  
                                                                    
                                                                    
                                                                     $fetch=mysqli_query($conn,"SELECT * from portfolio WHERE id='$id1'")or die(mysqli_error());

                                                                      $lenght=mysqli_num_rows($fetch);
                                                                   if ($lenght!=0) {
                                                                while($row=mysqli_fetch_array($fetch)){
                                                                            $img =$row['image'];
                                                                           echo  "

                                                                            
                                                                            
                                                                            
                                                                            <img src='photo/material/images/pro/$img' height='250px'width='280px'/>
                                                                            
                                                                            
                                                                        
                                                                        
                                                                            ";
                                                                        
                                                                        }
                                                                     }

?>	

<br>
<br>
<br>
<center>
<div class='col_full nobottommargin'>
<a href="order.php?id=<?php echo $id1; ?>" class='button button-3d button-black nomargin'>Book Now</a>

</div>
</div>
</div>
</section>
</div>
</body>
<?php

require 'footer.php';

?>
</html>