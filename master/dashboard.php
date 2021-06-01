<?php
require "../lib/commonphp.php";
if ((!isset($_SESSION['admin']))){
    header("location:myaccount.php");
}

// Load template
require_once "../lib/head.php";
$cssArr = ["dashboard","headerandfooter","cookies"];
$fileTitle = "Dashboard";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<!--Main-->
<main id="dashMain">
    <h1>Welcome to the Dashboard, <?=$_SESSION["adminName"]?></h1>
    <div class="dashCont">
        <div class="dashBtnCont">
            <form class="btnDiv" method="post" action="writing.php">
                <h2>Select File:</h2>
                <select name="fileName" required>
                    <option value="">Please Select</option>
                    <option value="tos">Tos</option>
                    <option value="copyright">Copy Right</option>
                    <option value="privacypolicy">Privacy Policy</option>
                </select>
                <input type="submit" class="dashBtn" id="dashSubmit" name="dashsubmitOn" value="Edit Content">
            </form>
        </div>
        <div class="dashBtnCont">
            <button type="button" class="dashBtn uploadPhoto"><a href="uploadphoto.php">Upload Photo<a></button>
        </div>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>