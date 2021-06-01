<?php
session_start();
// The below code receive photo from the admin
// and change the portraits of the member who the admin want to change.
if(isset($_POST["uploadSubmitOn"])){
    if($_FILES["profile"]["error"] == UPLOAD_ERR_OK){
        $fName = $_FILES["profile"]["name"];
        $fExtension = strtolower(pathinfo($fName,PATHINFO_EXTENSION));
        if($fExtension == "png" || $fExtension =="jpg" || $fExtension == "jpeg"){
            $newPath = "New_products/profilePic".$_POST["memberName"].".jpg";
            unset($_SESSION["uploadErr"]);
            move_uploaded_file($_FILES["profile"]["tmp_name"], $newPath);
            header("location:aboutus.php");
        } else {
            $_SESSION["uploadErr"] = "Invalid file. Please check again.";
            header("location:uploadphoto.php");
        }
    } else {
        $_SESSION["uploadErr"] = "An error occurs when uploading a file. Please try again.";
        header("location:uploadphoto.php");
    }
}
?>