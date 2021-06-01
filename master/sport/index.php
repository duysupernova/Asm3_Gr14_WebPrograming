<?php
session_start();
require "productprocessing.php";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];          
$url_components = parse_url($url);
if(isset($url_components['query'])){
    parse_str($url_components['query'], $params);
    if($params['storeID'] != ""){
        $_SESSION["storeID"] =  $params['storeID'];
    }
}
$counter = 1;
$featured_store_products = [];
$new_arrivals = ["", "", "", "",""];
$all_products = getAllProducts($_SESSION["storeID"]);
$storeName = getStoreName($_SESSION["storeID"]);
$number_of_products = count($all_products);
get_new_arrivals($all_products, $number_of_products);
foreach ($all_products as $product) {
    $data = explode(",",$product);
    if(trim($data[6]) == "TRUE"){
        array_push($featured_store_products, $product);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Khang Tran s3855823">
    <title>Asport | HOME</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/headerandfooter.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/headerandfooter.css" />
    <script src="https://kit.fontawesome.com/13954ad90d.js" crossorigin="anonymous"></script>
</head>


<body>
    <div class="header">
        <!-- Header -->
        <header>
            <div class="bar-content">
                <div class="bar-content center">
                    <img src="img/logo.png">
                    <label class="bar__nav-toggle" for="inpNavToggle">
                        <i class="fas fa-bars"></i>

                    </label>
                    <input type="checkbox" id="inpNavToggle" />
                    <nav class="nav">
                        <a class="link" href="index.php">Home</a>
                        <a class="link" href="aboutus.html">About us</a>
                        <a class="link" href="product.php">Product</a>
                        <a class="link" href="contact.html">Contact</a>
                        <a class="link cart-number" href="cart.php">
                        </a>
                    </nav>
                </div>
            </div>
        </header>
        <!-----Explore----->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php echo $storeName?></h1>
                    <p>“To uncover your true potential you must first find your own limits and then you have to have the
                        courage to blow past them.” – Picabo Street</p>
                    <a href="" class="button">EXPLODE NOW!</a>
                </div>
                <div class="col">
                    <div class="homeimg">
                        <img src="img/home.png" width="500px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----Feature----->
    <div class="feature">
        <h2>Featured Items</h2>
        <div class="container-product">
            <div class="row">
                <?php
            displayFeatureProduct($featured_store_products)
            ?>
            </div>
        </div>
    </div>
    <!-----NewArrival----->
    <div class="newArrival">
        <h2>New Arrival</h2>
        <div class="container-product">
            <div class="row">
                <?php
                displayNewProduct($new_arrivals);
            ?>
            </div>
        </div>
    </div>
    <footer>
        <a class="footer-link" href="footerContents/copyright.html">
            <i class="far fa-copy"></i>
            <span class="des">Copy Right</span>
        </a>
        <a class="footer-link" href="footerContents/tos.html">
            <i class="fas fa-concierge-bell"></i>
            <span class="des">ToS</span>
        </a>
        <a class="footer-link" href="footerContents/privacypolicy.html">
            <i class="fas fa-user-secret"></i>
            <span class="des">Privacy policy</span>
        </a>
    </footer>
    <script src="./js/product.js"></script>
</body>

</html>