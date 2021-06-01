<?php
require "datafunction.php";
session_start();
// Below codes check validation of login form.
// If the form is validate, it ushers user to mypage webpage or dashboard.
// If the form is invalidate, it displays error message.
if(isset($_POST['loginSubmitOn'])){
    if(isset($_POST['uId'])&&
        isset($_POST['uPsw'])){
        $inputID = htmlentities($_POST['uId']);
        $inputPW = htmlentities($_POST['uPsw']);
        if(checkAdmin($inputID, $inputPW)){
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['adminName'] = $_POST['uId'];
            unset($_SESSION["loginErr"]);
            header("location:dashboard.php");
        } else if(checkUser($inputID, $inputPW)) {
            $_SESSION['login'] = true;
            $_SESSION['userEmail'] = $_POST['uId'];
            unset($_SESSION["loginErr"]);
            header("location:mypage.php");
        } else {
            $_SESSION['loginErr'] = "Invalid username or password. Please check again.";
            header("location:myaccount.php");
        }
    } else {
        $_SESSION['loginErr'] = "The form cannot be empty. Please check again.";
        header("location:myaccount.php");
    }
}
?>