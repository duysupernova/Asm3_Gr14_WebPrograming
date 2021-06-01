<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["forgotpwStyle","headerandfooter","cookies"];
$fileTitle = "Forgot Password";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main id="mainPW">
    <div id="pwCont">
        <h2>Forgot Password</h2>
        <p>Enter your email address</p>
        <form id="signInForm" action="forgotPassword.php" method="POST">
            <input type="email" id="fotgotPW" name="forgotPW" placeholder="ex)example@rmit.edu.vn" required />
            <input type="submit" value="Continue" />
        </form>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>