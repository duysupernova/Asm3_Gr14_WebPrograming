<?php
session_start();
require "productprocessing.php";
$all_products = getAllProducts($_SESSION["storeID"]);
$number_of_products = count($all_products);
$limit = 2;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
$no_of_lines = $number_of_products;
$allRecrods = $no_of_lines;
// Calculate total pages
$totalPages = ceil($allRecrods / $limit);
// Prev + Next
$prev = $page - 1;
$next = $page + 1;
$path = "../../data/products.csv";
$last_product = $paginationStart + $limit;
$sort_value = 1;
if(isset($_GET['sort'])){
    $sort_products = sortSelect($_GET['sort']);
}
else{
    $sort_products = sortCSVFile($path);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Khang Tran s3855823">
    <title>BOX | PRODUCT</title>
    <link rel="stylesheet" href="css/style.css">
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
        <div class="container-product">
            <div class="row rowProduct">
                <h1>All products</h1>
                <select onchange="sort_products()" id="sort_select">
                    <option value="1" <?php echo ($sort_value == 1) ? "selected" : ""; ?>>Sort by default</option>
                    <option value="2" <?php echo ($sort_value == 2) ? "selected" : ""; ?>>Sort A-Z</option>
                    <option value="3" <?php echo ($sort_value == 3) ? "selected" : ""; ?>>Sort by Price</option>
                    <option value="4" <?php echo ($sort_value == 4) ? "selected" : ""; ?>>Sort by Newest</option>
                    <option value="5" <?php echo ($sort_value == 5) ? "selected" : ""; ?>>Sort by Oldest</option>
                </select>
            </div>
            <div class="row">
                <?php displayProduct($sort_products,  $paginationStart, $last_product)?>
            </div>
            <div class="page-btn">
                <?php 
                if($page == 1){ 
            ?>
                <span class="active_pagination"><i class="fa fa-arrow-left"></i></span>
                <?php
                } else{
            ?>
                <span class="pagination_span"
                    onclick="window.location.href='<?php echo "product.php?sort=".$sort_value."&page=". $prev; ?>'"><i
                        class="fa fa-arrow-left"></i></span>
                <?php
                }
            ?>
                <?php for($i = 1; $i <= $totalPages; $i++ ): 

                if($page == $i){
                    ?>
                <span class="active_pagination" onclick="window.location.href='#'"><?php echo $i; ?></span>
                <?php
                } else{
                    ?>
                <span class="pagination_span"
                    onclick="window.location.href='product.php?sort=<?php echo $sort_value ?>&page=<?php echo $i; ?>'"><?php echo $i; ?></span>
                <?php
                }
            ?>
                <?php endfor; ?>
                <?php 
                if($page >= $totalPages){ 
            ?>
                <span class="active_pagination"><i class="fa fa-arrow-right"></i></span>
                <?php
                } else{
            ?>
                <span class="pagination_span"
                    onclick="window.location.href='<?php echo "product.php?sort=".$sort_value."&page=". $next; ?>'"><i
                        class="fa fa-arrow-right"></i></span>
                <?php
                }
            ?>
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
        <script src="js/main.js"></script>
        <script src="./js/product.js"></script>

</body>

</html>