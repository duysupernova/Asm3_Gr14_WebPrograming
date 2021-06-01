<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["fees","headerandfooter","cookies"];
$fileTitle = "Fees";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main>
    <div class="fees_table">
        <h2> We have 3 option for our customer to choose!</h2>
        <h2>You can become our member!</h2>
        <section class="selection">
            <div class="content">
                <div class="pricing-table table1">
                    <div class="pricing-header">
                        <div class="price"><span>$</span>0</div>
                        <div class="title">Guest</div>
                    </div>
                    <ul class="pricing-list">
                        <li><b>1%</b> Discount</li>
                        <div class="border"></div>
                        <li><b>Unlimited</b> Year</li>
                        <div class="border"></div>
                        <li><b>None</b> Support</li>
                    </ul>
                    <a href="accountContents/register.html">Choose this option!</a>
                </div>
                <div class="pricing-table table2">
                    <div class="pricing-header">
                        <div class="price"><span>$</span>20</div>
                        <div class="title">Standard User</div>
                    </div>
                    <ul class="pricing-list">
                        <li><b>10%</b> Discount</li>
                        <div class="border"></div>
                        <li><b>1</b> Year</li>
                        <div class="border"></div>
                        <li><b>24h</b> Support</li>
                    </ul>
                    <a href="accountContents/register.html">Choose this option!</a>
                </div>

                <div class="pricing-table table3">
                    <div class="pricing-header">
                        <div class="price"><span>$</span>40</div>
                        <div class="title">Premiem User</div>
                    </div>
                    <ul class="pricing-list">
                        <li><b>20%</b> Discount</li>
                        <div class="border"></div>
                        <li><b>1</b> Year</li>
                        <div class="border"></div>
                        <li><b>24h</b> Support</li>
                    </ul>
                    <a href="accountContents/register.html">Choose this option!</a>
                </div>
            </div>
    </div>
    </section>
</main>
<?php
require_once "../lib/cookie.php";
require_once "../lib/footer.php";
require_once "../lib/script.php";
$jsArr = ["cookies"];
callJSfile($jsArr);       
?>