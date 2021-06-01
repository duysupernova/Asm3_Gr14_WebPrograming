<?php
function callCSSfile($cssFiles = [], $title = "Mall"){
    $indentation = "    ";
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo $indentation."<meta charset='UTF-8'>";
    echo $indentation."<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    echo $indentation."<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo $indentation."<script src='https://kit.fontawesome.com/eb52f39614.js' crossorigin='anonymous'></script>";
    for($i = 0; $i < count($cssFiles); $i++){
        $fileName = $cssFiles[$i];
        echo $indentation."<link rel='stylesheet' type='text/css' href='css/$fileName.css'>";
    }
    echo $indentation."<title>$title</title>";
    echo"</head>";
    echo"<body>";
}
?>