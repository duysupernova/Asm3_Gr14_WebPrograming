<?php
require "datafunction.php";
session_start();
$mypagePath = "\"".changeMyPagePath()."\"";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>G14 web Programming</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="css/headerandfooter.css" />
    <link rel="stylesheet" type="text/css" href="css/cookies.css" />
</head>
<script src="https://kit.fontawesome.com/13954ad90d.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="bar-content">
            <div class="bar-content center">
                <i class="fas fa-store-alt"></i>
                <label class="bar__nav-toggle" for="inpNavToggle">
                    <i class="fas fa-bars"></i>
                </label>
                <input type="checkbox" id="inpNavToggle" />
                <nav class="nav">
                    <a class="link" href="index.php">Home</a>
                    <a class="link" href="aboutus.php">About us</a>
                    <a class="link" href="fees.php">Fees</a>
                    <a class="link" id="account" href=<?=$mypagePath?>>My account</a>
                    <a class="link" href="browseproducts.php">Browse</a>
                    <a class="link" href="faq.php">FAQs</a>
                    <a class="link" href="contact.php">Contact</a>
                </nav>
            </div>
        </div>
    </header>
    <main id="content">
        <h1>FAQ</h1>
        <hr>
        <h2 class="sub-title">These are some question that we had from few cutomer before.</h2>
        <br>
        <details>
            <summary class="question">Why is our website name mall?</summary>
            <div class="faq__content">
                <p>- Since our website sells various stuff online and we link you to many shops that had those stuff. We
                    call ourself mall</p>
            </div>
        </details>
        <details>
            <summary class="question">How many product do you have?</summary>
            <div class="faq__content">
                <p>- We are feturing a total of 40 product. which is from 8 stores and each stores present 4 products.
                </p>
            </div>
        </details>
        <details>
            <summary class="question">Who is your customer?</summary>
            <div class="faq__content">
                <p>- Anyone who is interested in our website and love shopping at the mall. Our website let the customer
                    have the feleing like they are at the real mall.</p>
            </div>
        </details>
        <details>
            <summary class="question">How can we contact you?</summary>
            <div class="faq__content">
                <p>- Our phone number is xxx-xxx-xxx</p>
            </div>
        </details>
        <details>
            <summary class="question">Where is your store?</summary>
            <div class="faq__content">
                <p>- We are currently at Rmit school which is 702 Nguyen Van Linh, District 7, Ho Chi Minh City</p>
                <p>- Below is the destination of our store.</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.063676043263!2d106.69088691531155!3d10.729572262989512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbea5fe3db1%3A0xfae94aca5709003f!2sRMIT%20University%20Vietnam%2C%20Saigon%20South%20campus!5e0!3m2!1sen!2s!4v1618568940735!5m2!1sen!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </details>
        <br>
    </main>
    <!--Cookies-->
    <div class="popup_cookies">
        <img src="New_products/cookie.gif" alt="A cookie">
        <div class="cookies_content">
            <h1>We use Cookies!</h1>
            <p>This website use cookies to help us maintain the functioning. By continuing browsing, you consent to use
                our use of cookies and other technologies.</p>
            <div class="cookies_buttons">
                <button class="learn_more">I agree</button>
                <a href="https://gdpr-info.eu/" class="learn_more">GDPR</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <a class="footer-link" href="copyright.php">
            <i class="far fa-copy"></i>
            <span class="des">CopyRight</span>
        </a>
        <a class="footer-link" href="tos.php">
            <i class="fas fa-concierge-bell"></i>
            <span class="des">ToS</span>
        </a>
        <a class="footer-link" href="privacypolicy.php">
            <i class="fas fa-user-secret"></i>
            <span class="des">Privacy Policy</span>
        </a>
    </footer>
    <script type="text/javascript" src="js/cookies.js"></script>

    <noscript>It seems like your browser does not support JavaScript. Please check again.</noscript>
</body>

</html>