<!DOCTYPE html>
<html>
<body>


<?php
require("mysql.php");

$target_dir = "images/";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
     $file = $_FILES["fileToUpload"]["tmp_name"];
                            $query = "INSERT INTO useri (avatar)
                                VALUES ('$file' );";

                            $result=mysqli_query($conexiune, $query);
 
}

?>


<form action="pozatest.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>