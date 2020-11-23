<?php

require 'db.php';



if(isset($_POST['submit']))
{     
    


        
       
     $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable


    
       $image=$_FILES["image"]["name"];
        
        
                   

        $sql="INSERT INTO portfolio VALUES ('1','$image')";
        mysqli_query($conn,$sql);
    
        
       
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="ph_portfolio.php" method="POST" enctype="multipart/form-data">


<input type="file" name="image">

<input type="submit" name="submit" value="submit">

</form>





</body>
</html>