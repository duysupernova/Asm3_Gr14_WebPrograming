<?php
require "../lib/commonphp.php";
require_once 'storesFunction.php';
require_once 'productFunctions.php';
// Set Variables for new stores
$newStoresNames = array();
$newStores = readNewestStore();
$newStoresCount = 0;
// Set Variables for new products
$newProductsNames = array();
$newProducts = readNewestProducts();
$newProductsCount = 0;
// Set Variables for featured stores
$featured_store_names = array();
$featured_stores = read_featured_stores();
$featured_stores_count = 0;
// Set Variables for featured products
$featuredProducts_names = array();
$featuredProducts = readFeaturedProducts();
$featuredProductsCount = 0;

// Load template
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
            foreach ($newStores as $newStore) {
                $name = $newStore['name'];
                echo "
                <div class='slider-item'>
                    <div class='img-div'></div>
                    <h3>$name</h3>
                </div>
        ";
                $newStoresCount++;
                if ($newStoresCount == 10) {
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
            foreach ($newProducts as $newProduct) {
                $name = $newProduct['name'];
                $price = $newProduct['price'];
                echo "
                <div class='slider-item1'>
                    <div class='img-div1'></div>
                    <h3>$name</h3>
                    <h3>$price</h3>
                </div>";
                $newProductsCount++;
                if ($newProductsCount == 10) {
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
            foreach ($featuredStores as $featuredStore) {
                $name = $featuredStore['name'];
                echo "
                <div class='slider-item2nd'>
                    <div class='img-div2nd'></div>
                    <h3>$name</h3>
                </div>";
                $featuredStoresCount++;
                if ($featuredStoresCount == 10) {
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
            foreach ($featuredProducts as $featuredProduct) {
                $name = $featuredProduct['name'];
                $price = $featuredProduct['price'];
                echo "
                <div class='slider-item3rd'>
                    <div class='img-div3rd'></div>
                    <h3>$name</h3>
                    <h3>$price</h3>
                </div>";
                $featuredProductsCount++;
                if ($featuredProductsCount == 10) {
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