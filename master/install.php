<?php
session_start();
require "../master/datafunction.php";
require_once "../lib/head.php";
$cssArr = [];
$fileTitle = "Admin account";
callCSSfile($cssArr, $fileTitle);
setAdmin()
?>
<main>
    <form method="post" action="install.php">
        <h2>Admin account</h2>
        <br>
        <label for="userName">User Name:</label>
        <input id="userName" type="text" name="id">
        <br>
        <br>
        <label for="pass">Password:</label>
        <input id="pass" type="password" name="password">
        <br>
        <br>
        <label for="rePass">Retype password:</label>
        <input id="rePass" type="password" name="retypePassword">
        <br>
        <br>
        <input type="submit" name="click" value="Login">
    </form>
    <main>
        </body>

        </html>