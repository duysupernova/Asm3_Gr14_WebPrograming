<?php
require "../lib/commonphp.php";
if(!isset($_SESSION['login'])){
    header("location:myaccount.php");
}

// Load template
require_once "../lib/head.php";
$cssArr = ["mypageStyle","headerandfooter","cookies"];
$fileTitle = "My Page";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main id="mypageMain">
    <section>
        <div class="titleCont">
            <h2>Basic info</h2>
            <img src="New_products/icon/basic.png"
                alt="This is an icon of basic info. The icon displays the identity card."></img>
        </div>
        <div class="info">
            <h3>photo</h3>
            <img id="profilePic" src="New_products/profileExample.jpg"
                alt="This is a profile portrait of a user. For now, Steve Jobs'portrait was shown as an example.">
        </div>
        <div class="info">
            <h3>First Name</h3>
            <p>Steve</p>
        </div>
        <div class="info">
            <h3>Last Name</h3>
            <p>Jobs</p>
        </div>
    </section>

    <section>
        <div class="titleCont">
            <h2>Security</h2>
            <img src="New_products/icon/security.png"
                alt="This is an icon of security. The icon displays the lock."></img>
        </div>
        <div class="info">
            <h3>Email</h3>
            <p id="mypageEmail"><?=$_SESSION["userEmail"]?></p>
        </div>
        <div class="info">
            <h3>Phone number</h3>
            <p>123456789</p>
        </div>
        <div class="info">
            <h3>Password</h3>
            <p></p>
        </div>
        <div class="info">
            <h3>Account Type</h3>
            <p>Store owner</p>
        </div>
    </section>

    <section>
        <div class="titleCont">
            <h2>Address Book</h2>
            <img src="New_products/icon/address.png"
                alt="This is an icon of address Book. The icon displays a house in an upside-down waterdrop shape."></img>
        </div>
        <div class="info">
            <h3>Address</h3>
            <p>Tysons Corner Center mall in Tysons</p>
        </div>
        <div class="info">
            <h3>City</h3>
            <p>Virginia</p>
        </div>
        <div class="info">
            <h3>Zipcode</h3>
            <p>112233</p>
        </div>
        <div class="info">
            <h3>Country</h3>
            <p>United States</p>
        </div>
    </section>

    <section>
        <div class="titleCont">
            <h2>Business profile</h2>
            <img src="New_products/icon/business.png"
                alt="This is an icon of business profile. The icon displays the lock.The icon displays two hands shaking hands."></img>
        </div>
        <div class="info">
            <h3>Store Name</h3>
            <p>Apple</p>
        </div>
        <div class="info">
            <h3>Store Category</h3>
            <p>Technology stores</p>
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