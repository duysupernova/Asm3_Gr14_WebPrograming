<?php
require "../lib/commonphp.php";
if ((!isset($_SESSION['admin']))){
    header("location:myaccount.php");
}
if(isset($_SESSION['uploadErr'])){
    $errMsg = displayErrMsg($_SESSION['uploadErr']);
}

// Load template
require_once "../lib/head.php";
$cssArr = ["dashboard","headerandfooter","cookies","formvalidation"];
$fileTitle = "Upload photo";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<!--Main-->
<main id="uploadMain">
    <h1>Upload photo</h1>
    <form method="post" action="uploadphotoProcessing.php" enctype="multipart/form-data">
        <h2>Select Member:</h2>
        <select name="memberName" required>
            <option value="">Please Select</option>
            <option value="Liz">Lee Gain</option>
            <option value="Suk">Jang Moon Suk</option>
            <option value="Daniel">Nguyen Ha Minh Duy</option>
            <option value="Khang">Tran Vinh Khang</option>
        </select>
        <label for="=profile">
            <h2>Uploading photo:</h2>
        </label>
        <input type="file" id="profile" name="profile" required>
        <p>Our website only accepts png and jpeg file. Thank you.</p>
        <?php if(isset($errMsg)){echo $errMsg;}?>
        <input type="submit" name="uploadSubmitOn" value="Upload">
    </form>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>