<?php
require "datafunction.php";
session_start();

// Check validation
// Below codes check validation of login form.
// If the form is validate, it ushers user to mypage webpage or dashboard.
// If the form is invalidate, it displays error message.
if(isset($_POST['loginSubmitOn'])){
    //check submitting
    if(isset($_POST['uId'])&&
        isset($_POST['uPsw'])){
        $inputID = htmlentities($_POST['uId']);
        $inputPW = htmlentities($_POST['uPsw']);
        if(checkAdmin($inputID, $inputPW)){
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['adminName'] = $_POST['uId'];
            header("location:dashboard.php");
        } else if(checkUser($inputID, $inputPW)) {
            $_SESSION['login'] = true;
            header("location:mypage.php");
        } else {
            $loginErrorMsg[] = "Invalid username or password. Please check again";
        }
    } else {
        $loginErrorMsg[] = "The form cannot be empty.";
    }
    $setErrMsg = displayErrMsg($loginErrorMsg);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/headerandfooter.css'>
    <link rel='stylesheet' href='css/accountcontentsStyle.css'>
    <link rel='stylesheet' href='css/formvalidation.css'>
    <link rel="stylesheet" type="text/css" href="css/cookies.css" />
    <script src="https://kit.fontawesome.com/13954ad90d.js" crossorigin="anonymous"></script>
    <title>Sign In</title>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="bar-content">
            <div class="bar-content center">
                <i class="fas fa-store-alt"></i>
                <label class="bar__nav-toggle" for="inpNavToggle">
                    <i class="fas fa-bars"></i>
                </label>
                <input type="checkbox" id="inpNavToggle" />
                <nav class="nav">
                    <a class="link" href="index.html">Home</a>
                    <a class="link" href="aboutus.php">About us</a>
                    <a class="link" href="fees.html">Fees</a>
                    <a class="link" id="account" href="myaccount.php">My account</a>
                    <a class="link" href="browseproducts.html">Browse</a>
                    <a class="link" href="faq.html">FAQs</a>
                    <a class="link" href="contact.html">Contact</a>
                </nav>
            </div>
        </div>
    </header>
    <main id="mainSignIn">
        <!--Sign In Form-->
        <div id="signCont">
            <div id="signInCont">
                <h2>Sign In</h2>
                <form id="signInForm" method="post" action="myaccount.php" onsubmit="return loginValidation();">
                    <label for="signInId"><span>Email or Phone number:</span></label>
                    <input type="text" id="uId" name="uId" placeholder="example@rmit.edu.vn OR 123456789" required />
                    <ul class="errCont" id="olEmail"></ul>
                    <label for="signInPsw"><span>Password:</span></label>
                    <input type="password" id="uPsw" name="uPsw" placeholder="Enter your password." autocomplete="off"
                        required />
                    <ul class="errCont" id="olPw"></ul>
                    <?php
                        if(isset($setErrMsg)){
                            echo $setErrMsg;
                        }
                    ?>
                    <input type="submit" value="Sign In" name="loginSubmitOn" />
                </form>
                <p><a href="forgotpassword.html">Forgot Password ?</a></p>
            </div>

            <!--Sign Up-->
            <div id="signUpCont">
                <button type="button"><a href="register.html">Sign Up</a></button>
            </div>
        </div>
    </main>
    <!--Cookies-->
    <div class="popup_cookies">
        <img src="New_products/cookie.gif" alt="A cookie">
        <div class="cookies_content">
            <h1>We use Cookies!</h1>
            <p>This website use cookies to help us maintain the functioning. By continuing browsing, you consent to use
                our use of cookies and other technologies.</p>
            <div class="cookies_buttons">
                <button class="learn_more">I agree</button>
                <a href="https://gdpr-info.eu/" class="learn_more">GDPR</a>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <a class="footer-link" href="copyright.php">
            <i class="far fa-copy"></i>
            <span class="des">Copy Right</span>
        </a>
        <a class="footer-link" href="tos.php">
            <i class="fas fa-concierge-bell"></i>
            <span class="des">ToS</span>
        </a>
        <a class="footer-link" href="privacypolicy.php">
            <i class="fas fa-user-secret"></i>
            <span class="des">Privacy Policy</span>
        </a>
    </footer>
    <script type="text/javascript" src="js/cookies.js"></script>
    <script type="text/javascript" src="js/formvalidation.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/checkstatus.js"></script>
    <noscript>It seems like your browser does not support JavaScript. Please check again.</noscript>
</body>

</html>