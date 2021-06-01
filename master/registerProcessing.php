<?php
session_start();
require_once 'datafunction.php';
if(isset($_POST["registerOn"])){
    if(isset($_POST["rEmail"]) &&
        isset($_POST["rPhoneNvm"]) &&
        isset($_POST["psw"]) &&
        isset($_POST["pswCheck"]) &&
        isset($_POST["pic"]) &&
        isset($_POST["fName"]) &&
        isset($_POST["lName"]) &&
        isset($_POST["address"]) &&
        isset($_POST["city"]) &&
        isset($_POST["zCode"]) ){

        $userEmail = htmlentities($_POST["rEmail"]);
        $userPhone = htmlentities($_POST["rPhoneNvm"]);
        $userPSW = htmlentities($_POST["psw"]); 
        $userRE = htmlentities($_POST["pswCheck"]);
        $userFName = htmlentities($_POST["fName"]);
        $userLName = htmlentities($_POST["lName"]);
        $userAddress = htmlentities($_POST["address"]);
        $userCity = htmlentities($_POST["city"]);
        $userZCode = htmlentities($_POST["zCode"]);

        if(!checkUniqueEmail($userEmail)){
            $_SESSION["rEmailErr"] = "Email Address is not Unique. Please use another email.";
        }else{
            unset($_SESSION["rEmailErr"]);
        }
        if(!checkUniquePhoneNvm($userPhone)){
            $_SESSION["rPhoneNvmErr"] = "Phone number is not Unique. Please use another Phone number.";
        }else{
            unset($_SESSION["rPhoneNvmErr"]);
        }   
        if(!checkEmail($userEmail)){
            $_SESSION["rEmailErr"] = "Invalid email. Please check again.";
        } else {
            unset($_SESSION["rEmailErr"]);
        }
        if(!checkPhonenumber($userPhone)){
            $_SESSION["rPhoneNvmErr"] = "Invalid phone number. Please check again.";
        } else {
            unset($_SESSION["rPhoneNvmErr"]);
        }
        if(!checkPassword($userPSW)){
            $_SESSION["pswErr"] = "Invalid password. Please check again.";
        } else {
            unset($_SESSION["pswErr"]);
        }
        if(!checkRetypepassword($userRE, $userPSW)){
            $_SESSION["pswCheckErr"] = "Invalid password. Please check again.";
        } else {
            unset($_SESSION["pswCheckErr"]);
        }
        if(!checkFname($userFName)){
            $_SESSION["fNameErr"] = "Invalid first name. Please check again.";
        } else {
            unset($_SESSION["fNameErr"]);
        }
        if(!checkLname($userLName)){
            $_SESSION["lNameErr"] = "Invalid last name. Please check again.";
        } else {
            unset($_SESSION["lNameErr"]);
        }
        if(!checkAddress($userAddress)){
            $_SESSION["addressErr"] = "Invalid address. Please check again.";
        } else {
            unset($_SESSION["addressErr"]);
        }
        if(!checkCity($userCity)){
            $_SESSION["cityErr"] = "Invalid city. Please check again.";
        } else {
            unset($_SESSION["cityErr"]);
        }
        if(!checkZipcode($userZCode)){
            $_SESSION["zCodeErr"] = "Invalid zip code. Please check again.";
        } else {
            unset($_SESSION["zCodeErr"]);
        } 
        if(isset($_SESSION["rEmailErr"])||
            isset($_SESSION["rPhoneNvmErr"])||
            isset($_SESSION["pswErr"])||
            isset($_SESSION["pswCheckErr"])||
            isset($_SESSION["fNameErr"])||
            isset($_SESSION["lNameErr"])||
            isset($_SESSION["addressErr"])||
            isset($_SESSION["cityErr"])||
            isset($_SESSION["zCodeErr"])){
            header("location:register.php");
        } else {
            saveInfoToCsv($_POST["rEmail"], $_POST["rPhoneNvm"], $_POST["psw"]);
            header("location:myaccount.php");
        }
    }
}

function saveInfoToCsv($email, $phoneNvm, $password){
    //This function receives file name, and clean proccessing as parameters
    // and save the information into assigned file.
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $info = [$email, $phoneNvm, $hashedpassword];
    $file = fopen("../data/register.csv", "a");
    flock($file, LOCK_EX);
    fputcsv($file,$info);
    flock($file, LOCK_UN);
    fclose($file);

}

function checkUniqueEmail($userEmail){
    //This function check unique email
    // and check the informatio, if corret return true, if wrong return false.
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
    //This function check unque phone number
    // and check the informatio, if corret return true, if wrong return false.
  $db = getRegisterPhoneNvm();
  foreach($db as $data){
    if($data == $userPhone){
      return false;
    }
  }
  return true;
}

function checkEmail($email){
    //This function receives user email
    // return true if it is a valid email and return false if it is not a email.
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
    //This function check user password
    // and return false if the password is wrong, else return true.
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
    //This function check user retype password
    // and return false if the retype password is wrong, else return true.
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
    //This function check user frist name
    // and return false if the frist name is wrong, else return true.
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
    //This function check user last name
    // and return false if the last name is wrong, else return true.
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
    //This function check user address
    // and return false if the address is wrong, else return true.
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
    //This function check user city
    // and return false if the city is wrong, else return true.
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
    //This function check user zipcode
    // and return false if the zipcode is wrong, else return true.
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