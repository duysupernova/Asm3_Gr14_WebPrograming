<?php
require "../lib/commonphp.php";
require_once "../lib/head.php";
$cssArr = ["style","headerandfooter","cookies"];
$fileTitle = "Index";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main>
    <!-- Body -->
    <div class="tag">
        <h1>New Stores</h1>
        <div class="slider-wrap">
            <div class="slider">
                <?php
            require_once 'stores_function.php';
            $new_stores_names = array();
            $new_stores = read_newest_stores();
            $new_stores_count = 0;
            foreach ($new_stores as $new_store) {
                $name = $new_store['name'];
                echo "
                <div class='slider-item'>
                    <div class='img-div'></div>
                    <h3>$name</h3>
                </div>
        ";
                $new_stores_count++;
                if ($new_stores_count == 10) {
                    break;
                }
            }
            ?>
            </div>
        </div>
    </div>
    <div class="tag">
        <h1>New products</h1>
    </div>
    <div class="slider-wrap1">
        <div class="slider1">
            <?php
            require_once 'product_functions.php';
            $new_products_names = array();
            $new_products = read_newest_products();
            $new_products_count = 0;
            foreach ($new_products as $new_product) {
                $name = $new_product['name'];
                $price = $new_product['price'];
                echo "
                <div class='slider-item1'>
                    <div class='img-div1'></div>
                    <h3>$name</h3>
                    <h3>$price</h3>
                </div>
        ";
                $new_products_count++;
                if ($new_products_count == 10) {
                    break;
                }
            }
            ?>
        </div>
    </div>
    </div>
    <div class="tag">
        <h1>Featured Stores</h1>
    </div>
    <div class="slider-wrap2nd">
        <div class="slider2nd">
            <?php
            require_once 'product_functions.php';
            $featured_store_names = array();
            $featured_stores = read_featured_products();
            $featured_stores_count = 0;
            foreach ($featured_stores as $featured_store) {
                $name = $featured_store['name'];
                echo "
                <div class='slider-item2nd'>
                    <div class='img-div2nd'></div>
                    <h3>$name</h3>
                </div>
        ";
                $featured_stores_count++;
                if ($featured_stores_count == 10) {
                    break;
                }
            }
            ?>
        </div>
    </div>
    </div>
    <div class="tag">
        <h1>Featured Products</h1>
    </div>
    <div class="slider-wrap3rd">
        <div class="slider3rd">
            <?php
            require_once 'product_functions.php';
            $featured_products_names = array();
            $featured_products = read_featured_products();
            $featured_products_count = 0;
            foreach ($featured_products as $featured_product) {
                $name = $featured_product['name'];
                $price = $featured_product['price'];
                echo "
                <div class='slider-item3rd'>
                    <div class='img-div3rd'></div>
                    <h3>$name</h3>
                    <h3>$price</h3>
                </div>
        ";
                $featured_products_count++;
                if ($featured_products_count == 10) {
                    break;
                }
            }
            ?>
        </div>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies","infinite_carousel","infinite_carousel1","infinite_carousel2","infinite_carousel3"];
    callJSfile($jsArr);       
?>