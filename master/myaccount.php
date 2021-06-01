<?php
require "../lib/commonphp.php";
if(isset($_SESSION['loginErr'])){
    $errMsg = displayErrMsg($_SESSION['loginErr']);
}
// Load template
require_once "../lib/head.php";
$cssArr = ["accountcontentsStyle","headerandfooter","formvalidation","cookies"];
$fileTitle = "Sign In";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main id="mainSignIn">
    <!--Sign In Form-->
    <div id="signCont">
        <div id="signInCont">
            <h2>Sign In</h2>
            <form id="signInForm" method="post" action="myaccountProcessing.php" onsubmit="return loginValidation();">
                <label for="signInId"><span>Email or Phone number:</span></label>
                <input type="text" id="uId" name="uId" placeholder="example@rmit.edu.vn OR 123456789" required />
                <ul class="errCont" id="olEmail"></ul>
                <label for="signInPsw"><span>Password:</span></label>
                <input type="password" id="uPsw" name="uPsw" placeholder="Enter your password." autocomplete="off"
                    required />
                <ul class="errCont" id="olPw"></ul>
                <?php if(isset($errMsg)){echo $errMsg;}?>
                <input type="submit" value="Sign In" name="loginSubmitOn" />
            </form>
            <p><a href="forgotpassword.php">Forgot Password ?</a></p>
        </div>

        <!--Sign Up-->
        <div id="signUpCont">
            <button type="button"><a href="register.php">Sign Up</a></button>
        </div>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies","formvalidation","login"];
    callJSfile($jsArr);       
?>