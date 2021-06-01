<?php
function callJSfile($jsFiles = []){
    $indentation = "    ";
    for($i = 0; $i < count($jsFiles); $i++){
        $fileName = $jsFiles[$i];
        echo $indentation."<script type='text/javascript' src='js/$fileName.js'></script>";
    }
    echo '<noscript>It seems like your browser does not support JavaScript. Please check again.</noscript>';
    echo '</body>';
    echo '</html>';
}
?>