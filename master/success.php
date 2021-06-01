<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["successform","headerandfooter","cookies","accountcontentsStyle"];
$fileTitle = "Success message";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main>
    <div class="msgCont">
        <h1>Thank you!</h1>
        <p>Your information has been successfully sent.</p>
        <a href="index.html"><button>Go Back to the homepage.</button></a>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>