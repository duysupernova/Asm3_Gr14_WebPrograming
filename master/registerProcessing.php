<?php
session_start();
require_once 'datafunction.php';
if(isset($_POST["registerOn"])){
    if(isset($_POST["rEmail"]) &&
        isset($_POST["rPhoneNvm"]) &&
        isset($_POST["psw"]) &&
        isset($_POST["pswCheck"]) &&
        isset($_POST["fName"]) &&
        isset($_POST["lName"]) &&
        isset($_POST["address"]) &&
        isset($_POST["city"]) &&
        isset($_POST["zCode"]) ){
        if(!checkEmail($_POST["rEmail"])){
            $_SESSION["rEmailErr"] = "Invalid email. Please check again.";
        } else {
            unset($_SESSION["rEmailErr"]);
        }
        if(!checkPhonenumber($_POST["rPhoneNvm"])){
            $_SESSION["rPhoneNvmErr"] = "Invalid phone number. Please check again.";
        } else {
            unset($_SESSION["rPhoneNvmErr"]);
        }
        if(!checkPassword($_POST["psw"])){
            $_SESSION["pswErr"] = "Invalid password. Please check again.";
        } else {
            unset($_SESSION["pswErr"]);
        }
        if(!checkRetypepassword($_POST["pswCheck"], $_POST["psw"])){
            $_SESSION["pswCheckErr"] = "Invalid password. Please check again.";
        } else {
            unset($_SESSION["pswCheckErr"]);
        }
        if(!checkFname($_POST["fName"])){
            $_SESSION["fNameErr"] = "Invalid first name. Please check again.";
        } else {
            unset($_SESSION["fNameErr"]);
        }
        if(!checkLname($_POST["lName"])){
            $_SESSION["lNameErr"] = "Invalid last name. Please check again.";
        } else {
            unset($_SESSION["lNameErr"]);
        }
        if(!checkAddress($_POST["address"])){
            $_SESSION["addressErr"] = "Invalid address. Please check again.";
        } else {
            unset($_SESSION["addressErr"]);
        }
        if(!checkCity($_POST["city"])){
            $_SESSION["cityErr"] = "Invalid city. Please check again.";
        } else {
            unset($_SESSION["cityErr"]);
        }
        if(!checkZipcode($_POST["zCode"])){
            $_SESSION["zCodeErr"] = "Invalid zip code. Please check again.";
        } else {
            unset($_SESSION["zCodeErr"]);
        }
        if(!checkUniqueEmail($_POST["rEmail"])){
            $_SESSION["rEmailErr"] = "Email Address is not Unique. Please use another email.";
        }else{
            unset($_SESSION["addressErr"]);
        }
        if(!checkUniquePhoneNvm($_POST["rPhoneNvm"])){
            $_SESSION["rPhoneNvmErr"] = "Phone number is not Unique. Please use another Phone number.";
        }else{
            unset($_SESSION["addressErr"]);
        }    
        if(isset($_SESSION["rEmailErr"])||
            isset($_SESSION["rPhoneNvmErr"])||
            isset($_SESSION["pswErr"])||
            isset($_SESSION["pswCheckErr"])||
            isset($_SESSION["fNameErr"])||
            isset($_SESSION["lNameErr"])||
            isset($_SESSION["addressErr"])||
            isset($_SESSION["cityErr"])||
            isset($_SESSION["zCodeErr"])
        ){
            header("location:real.php"); //register.php
        } else {
            saveInfoToCsv($_POST["rEmail"], $_POST["rPhoneNvm"], $_POST["psw"]);
            echo "good";
        }
    }
}

function saveInfoToCsv($email, $phoneNvm, $password){
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $info = [$email, $phoneNvm, $hashedpassword];
    $file = fopen("../data/register.csv", "a");
    flock($file, LOCK_EX);
    fputcsv($file,$info);
    flock($file, LOCK_UN);
    fclose($file);

}

function checkUniqueEmail($userEmail){
  $db = getRegisterEmail();
  $adminID = getAdminID();
  foreach($db as $data){
    if($data == $userEmail){
      return false;
    } else if($adminID == $userEmail){
        return false;
    }
  }
  return true;
}

function checkUniquePhoneNvm($userPhone){
  $db = getRegisterPhoneNvm();
  foreach($db as $data){
    if($data == $userPhone){
      return false;
    }
  }
  return true;
}

function checkEmail($email){
    $pattern = "/^[a-zA-Z0-9.]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)/";
    $lastReg =  "/^([A-Za-z]{2,5})$/";
    $num = 0;
    foreach(str_split($email) as $char){
        if($char == "@"){
            $num ++;
        }
        if($num > 1){
            return false;
        }
    }
    if (preg_match($pattern,$email) != 1) 
        {
            return false;
        }

    $domain = explode("@",$email)[1];
    $name = explode("@",$email)[0];
    if (strpos($domain,'.') == false){
        return false;
    }
    if(strlen($name) < 3){
        return false;
    }
    if ( $name[strlen($name) -1] == "."){
        return false;
    }
    $domainSplit = explode('.',$domain);
    $lastDomain = explode(".",$domain)[count($domainSplit)-1];
    if($email[strlen($email)-1] == "."){
            return false;
        }
    if($email[0] == "."){
            return false;
        }
    for ($i = 0; $i < strlen($email) ; $i++){
            if( $i >0 ){
                if($email[$i] == "." && $email[$i-1] == "."){
                    return false;
                }
            }
        }
    if (preg_match($lastReg,$lastDomain) != 1){
        return false;
    }
    return true;
  }
function checkPhonenumber($phoneNvm){
    // This function receives phone number as a parameter
    // return true if it is a valid phone number and return false if it is not a valid phone number.
    $specialChrs = [' ', '.', '-'];
    $copyphoneNvm = "";
    $spcIdx = [];

    $validLetter = "/^[0-9\.\-\s]+$/";
    if (!(preg_match($validLetter, $phoneNvm))) {
        return false;
    }

    foreach ($specialChrs as $spcChr) {
        $length = strlen($phoneNvm);
        if ($phoneNvm[0] === $spcChr) {
            return false;
        } else if ($phoneNvm[$length-1] === $spcChr) {

            return false;
        }
    }

    for ($e = 0; $e < strlen($phoneNvm); $e++) {
        if (in_array($phoneNvm[$e], $specialChrs)) {
            $spcIdx[] = $e;
            $copyphoneNvm .= '';
        } else {
            $copyphoneNvm .= $phoneNvm[$e];
        }
    }

    if (
        strlen($copyphoneNvm) < 9 ||
        strlen($copyphoneNvm) > 11
    ) {

        return false;
    }

    for ($a = 1; $a < (count($spcIdx) + 1); $a++) {
        $b = $a - 1;
        $spcIdxforA = (empty($spcIdx[$a])) ? 0 : $spcIdx[$a];
        $idxChk = $spcIdxforA - $spcIdx[$b];
        if ($idxChk === 1) {
            return false;
        }
    }
    return true;
}

function checkPassword($userpsw)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userpsw)) {
            return false;
        } else {
            $psw = $userpsw;
            if (!preg_match("/^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,20})$/", $psw)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

function checkRetypepassword($rePassword,$userpsw)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($rePassword)) {
            return false;
        }
        if ($rePassword === $userpsw) {
            return true;
        } else
            return false;
    }
}

function checkFname($userFname)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userFname)) {
            return false;
        } else {
            $fname = $userFname;
            if (!preg_match("/^[a-zA-Z]{3,}$/", $fname)) {
                return false;
            } else {
                return true;
            }
        }
    }
}


function checkLname($userLname)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userLname)) {
            return false;
        } else {
            $lname = $userLname;
            if (!preg_match("/^[a-zA-Z]{3,}$/", $lname)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

function checkAddress($userAddress)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userAddress)) {
            return false;
        } else {
            $address = $userAddress;
            if (!preg_match("/^[a-zA-Z]{3,}$/", $address)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

function checkCity($userCity)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userCity)) {
            return false;
        } else {
            $city = $userCity;
            if (!preg_match("/^[a-zA-Z]{3,}$/", $city)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

function checkZipcode($userZipcode)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($userZipcode)) {
            return false;
        } else {
            $zCode = $userZipcode;
            if (!preg_match("/^([0-9]{4,6})$/", $zCode)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

