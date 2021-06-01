<?php
require "../lib/commonphp.php";
if ((!isset($_SESSION['admin']))){
    header("location:myaccount.php");
}

if(isset($_POST["fileName"])){
    $targetFile = $_POST["fileName"];
    $result = getData("../data/{$_POST["fileName"]}.txt","on");
}
// Load template
require_once "../lib/head.php";
$cssArr = ["dashboard","headerandfooter","cookies"];
$fileTitle = "Edit Content";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<!--Main-->
<main id="editMain">
    <h1>Edit Content</h1>
    <form method="post" action="writingProcessing.php">
        <label for="title">
            <h2>Title:</h2>
        </label>
        <input type="text" id="title" name="title" value="<?=$result["title"]?>" required>
        <label for="wAuthor">
            <h2>Author:</h2>
        </label>
        <input type="text" id="wAuthor" name="wAuthor" value="<?=$result["author"]?>" required>
        <label for="content">
            <h2>Content:</h2>
        </label>
        <textarea id="content" name="content" required><?=$result["content"];?>    
            </textarea>
        <input type="hidden" name="filename" value="<?=$targetFile?>">
        <input type="submit" name="editsubmitOn" value="Edit">
    </form>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>