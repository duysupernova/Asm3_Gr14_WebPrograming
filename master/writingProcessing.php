<?php
require "datafunction.php";
session_start();
// Below codes write contents for user-assigned page.
// and usher user to the assigned page.
if(isset($_POST['editsubmitOn'])){
    if(isset($_POST['title'])&&
        isset($_POST['wAuthor'])&&
        isset($_POST['content'])){
        $inputTitle = htmlentities($_POST['title']);
        $inputAuthor = htmlentities($_POST['wAuthor']);
        $inputContent = htmlentities($_POST['content']);
        $inputFileName = "../data/".$_POST['filename'].".txt";
        $path = $_POST['filename'];
        setData($inputFileName, $inputTitle, $inputAuthor, $inputContent);
        header("location:$path.php");
    }
}
?>