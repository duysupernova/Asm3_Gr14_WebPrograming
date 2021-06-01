<?php
require "../lib/commonphp.php";
$result = getData("../data/tos.txt");

// Load template
require_once "../lib/head.php";
$cssArr = ["footerContentsStyle","headerandfooter","cookies"];
$fileTitle = "Terms of service";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main class="footerContent">
    <h1>Website Terms and Conditions of Use</h1>
    <section>
        <h2>Title:<?=$result["title"]?></h2>
        <h3>Author:<?=$result["author"]?></h3>
    </section>
    <section>
        <h3>Detail:</h3>
        <p><?=$result["content"]?></p>
    </section>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>