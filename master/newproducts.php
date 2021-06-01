<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["newproducts","cookies"];
$fileTitle = "New Product";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main>
    <!-- Body -->
    <div class="container">
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/1.jpg" alt="Black sneaker image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Black sneaker</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/2.jpg" alt="White sneaker shoes image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">White sneaker</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/3.jpg" alt="White Sport shoes image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">White shoes</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/4.jpg" alt="Sport pant blue image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Sport pant</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/5.jpg" alt="Sport glove image"
                    style="width:80%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Sport glove</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/bts.jpg" alt="BTS Book image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">BTS Book</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/book.jpg" alt="Grey book image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Grey Book</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/book2.jpg" alt="manage book image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Manage book</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/book3.jpg" alt="The book image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">The book</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/book.jpg" alt="Another book"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Another book</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/kitchen.jpg" alt="Kitchen utensils image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Kitchen utensils</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/kitchen1.jpg" alt="Small pot image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Small pot<a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/kitchen2.jpg" alt="Kitchen thremometer"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Thremometer</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/kitchen3.jpg" alt="Kitchen mixer image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Kitchen mixer</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/kitchen4.jpg" alt="Set of spoon image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Set of spoon</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/pc.jpg" alt="Samsung memory card"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Memory card</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/pc1.jpg" alt="headet image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Headet</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/pc2.jpg" alt="Stream switch"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Stream swicher</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/pc3.jpg" alt="Iphone cable "
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Iphone cable</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/pc4.jpg" alt="Pc camera image"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Pc camera</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/beauty.jpg" alt="cleaner gel"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Facial cleaner</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/beauty1.jpg" alt="Listerine mouth washer water"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Listerin</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/beauty2.jpg" alt="Face cream"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Facial gel</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/beauty3.jpg" alt="Men shaver"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">Shaver set</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
        <div class="card">
            <a href="sport/product_detail.html"><img src="New_products/beauty4.jpg" alt="Phillips e-toothbrush"
                    style="width:90%"></a>
            <h1 class="name"> <a href="sport/product_detail.html">E-toothbrush</a></h1>
            <p class="price">$120</p>
            <p class="content">Some text about the products..</p>
            <p><button class="button"><a href="sport/index.html">Visit the store!</a></button></p>
        </div>
    </div>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["checkstatus","cookies"];
    callJSfile($jsArr);       
?>