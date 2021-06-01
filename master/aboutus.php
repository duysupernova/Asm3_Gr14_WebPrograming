<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["headerandfooter","aboutusStyle","cookies"];
$fileTitle = "Contact Us";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main>
    <!--Team info-->
    <section>
        <!--Team Title-->
        <div class="cont">
            <img src="New_products/aboutUs.jpg"
                alt="This picture shows the four hands holding the fists against each other.">
            <div class="overlay">
                <h1>About Us</h1>
            </div>
        </div>

        <!--Our Story-->
        <div id="usStoryCont" class="teamBox usBox">
            <img src="New_products/ourStory.jpg" alt="This picture shows a team meeting which a few laptops.">
            <div id="storyCont">
                <h2>Our Story</h2>
                <p>
                    Our team has begun with a small project in the university. Through the Web Programming course,
                    all team members took an interest in design web application and eventually felt satisfied and
                    joyful in it. The experience became the
                    motivation of founding a start-up which is Champions. Although Champions is already recognized
                    globally
                    as one of the start-ups which have a very promising future, the team aims to build prominent
                    applications
                    to make a better world.
                </p>
            </div>
        </div>

        <!--Why Choose Us-->
        <div id="teamExplainCont" class="teamBox usBox">
            <h2>Why choose us</h2>
            <div id="usTeamAllCont">
                <div class="usTeamWhyCont">
                    <div class="usTeamIconCont">
                        <img src="New_products/icon/delivery.png"
                            alt="It's an icon that shows the truck moving forward.">
                        <h3>Fast Delivery</h3>
                    </div>
                    <p>The enterprise provides fast delivery by contracting with FedEx and other ten delivery
                        companies.</p>
                </div>
                <div class="usTeamWhyCont">
                    <div class="usTeamIconCont">
                        <img src="New_products/icon/good-quality.png" alt="This is a thumbs up sign icon.">
                        <h3>Good Quality</h3>
                    </div>
                    <p>The enterprise offers high-quality products from solemnly chosen stores.</p>
                </div>
                <div class="usTeamWhyCont">
                    <div class="usTeamIconCont">
                        <img src="New_products/icon/cheap.png" alt="The icon shows the coins on top of hands.">
                        <h3>Affordable Price</h3>
                    </div>
                    <p>The enterprise supply cost-effective products.</p>
                </div>
            </div>
        </div>
    </section>

    <!--Member info-->
    <section id="aboutUsmemberPfl">
        <!--Title-->
        <div class="cont">
            <img id="teamPic" src="New_products/teaminfo.jpg"
                alt="It's an illustration of eight people with a confident facial expression.">
            <div class="overlay">
                <h1>Meet Our Team</h1>
            </div>
        </div>

        <!--Modal-->
        <div class="modalCont">
            <div class="modalContent">
                <div class="modalHead">
                    <h2>More Information</h2>
                    <button class="modalCloseBtn" type="button">Close</button>
                </div>
                <div class="modalBody">
                    <h3>Motto</h3>
                    <p id="motto"></p>
                    <h3>Role Model</h3>
                    <p id="roleModel"></p>
                    <h3>MBTI</h3>
                    <p id="mbti"></p>
                </div>
            </div>
        </div>

        <!--Each member profile-->
        <div class="oneMemberPfl usBox">
            <div class="usContact">
                <img class="modalOpenBtn daniel" src="New_products/profilePicDaniel.jpg"
                    alt="Nguyen Ha Minh Duy's portrait">
                <h2>Nguyen Ha Minh Duy</h2>
                <div class="departmentInfo">
                    <p>RMIT</p>
                    <p>S3852307</p>
                </div>
                <div class="usContactIcon">
                    <a href="mailto:s3852307@rmit.edu.vn"><i class="fas fa-envelope-square fa-2x active"></i></a>
                    <a href="https://github.com/duysupernova"><i class="fab fa-git-square fa-2x active"></i></a>
                    <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
                </div>
            </div>
            <div class="usdetail">
                <h3>Nationality:</h3>
                <p>Vietnamese</p>
                <h3>Spoken Languages:</h3>
                <p>Vietnamese(native), English</p>
                <div class="usListContainer">
                    <div class="usList">
                        <h3>Education</h3>
                        <ul>
                            <li>3 years of study in New Zealand</li>
                            <li>Fresh man in RMIT</li>
                            <li>Elected to University of Technology in New Zealand</li>
                        </ul>
                    </div>
                    <div class="usList">
                        <h3>Hobby</h3>
                        <ul>
                            <li>Listening to music</li>
                            <li>Game lover</li>
                            <li>Hypebeast</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="oneMemberPfl usBox reverseBox">
            <div class="usdetail">
                <h3>Nationality:</h3>
                <p>Korean</p>
                <h3>Spoken Languages:</h3>
                <p>Korean(native), Vietnamese, English</p>
                <div class="usListContainer">
                    <div class="usList">
                        <h3>Education</h3>
                        <ul>
                            <li>1 year majored broadcasting in Korea</li>
                            <li>Fresh man in RMIT</li>
                        </ul>
                    </div>
                    <div class="usList">
                        <h3>Hobby</h3>
                        <ul>
                            <li>Writing novel</li>
                            <li>Reading book</li>
                            <li>Watching movie</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="usContact">
                <img class="modalOpenBtn liz" src="New_products/profilePicLiz.jpg" alt="Lee Gain's portrait">
                <h2>Lee Gain</h2>
                <div class="departmentInfo">
                    <p>RMIT</p>
                    <p>S3878170</p>
                </div>
                <div class="usContactIcon">
                    <a href="mailto:s3878170@rmit.edu.vn"><i class="fas fa-envelope-square fa-2x active"></i></a>
                    <a href="https://github.com/Lee-GaIn"><i class="fab fa-git-square fa-2x active"></i></a>
                    <a href="https://www.facebook.com/Example-Account-197494372329/"><i
                            class="fab fa-facebook-square fa-2x active"></i></a>
                    <a href="https://www.instagram.com/exampstagram/"><i
                            class="fab fa-instagram-square fa-2x active"></i></a>
                </div>
            </div>
        </div>
        <div class="oneMemberPfl usBox">
            <div class="usContact">
                <img class="modalOpenBtn Khang" src="New_products/profilePicKhang.jpg" alt="Tran Vinh Khang's portrait">
                <h2>Tran Vinh Khang</h2>
                <div class="departmentInfo">
                    <p>RMIT</p>
                    <p>S3855823</p>
                </div>
                <div class="usContactIcon">
                    <a href="mailto:s3855823@rmit.edu.vn"><i class="fas fa-envelope-square fa-2x active"></i></a>
                    <a href="https://github.com/kwang313"><i class="fab fa-git-square fa-2x active"></i></a>
                    <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
                </div>
            </div>
            <div class="usdetail">
                <h3>Nationality:</h3>
                <p>Vietnamese</p>
                <h3>Spoken Languages:</h3>
                <p>Vietnamese(native), English</p>
                <div class="usListContainer">
                    <div class="usList">
                        <h3>Education</h3>
                        <ul>
                            <li>Diploma of Computing (Eynesbury College, Australia)</li>
                            <li>First year in RMIT SGS</li>
                        </ul>
                    </div>
                    <div class="usList">
                        <h3>Hobby</h3>
                        <ul>
                            <li>Listening to music</li>
                            <li>Game lover</li>
                            <li>Hypebeast</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="oneMemberPfl usBox reverseBox">
            <div class="usdetail">
                <h3>Nationality:</h3>
                <p>Vietnamese, Korean</p>
                <h3>Spoken Languages:</h3>
                <p>Vietnamese(native), English</p>
                <div class="usListContainer">
                    <div class="usList">
                        <h3>Education</h3>
                        <ul>
                            <li>3 years student in United State</li>
                            <li>Fresh man in RMIT</li>
                            <li>1 years of Johnson and Wales university </li>
                        </ul>
                    </div>
                    <div class="usList">
                        <h3>Hobby</h3>
                        <ul>
                            <li>Game lover</li>
                            <li>Listen to music</li>
                            <li>Watching movie</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="usContact">
                <img class="modalOpenBtn suk" src="New_products/profilePicSuk.jpg" alt="Jang Moon Suk's portrait">
                <h2>Jang Moon Suk</h2>
                <div class="departmentInfo">
                    <p>RMIT</p>
                    <p>S3877629</p>
                </div>
                <div class="usContactIcon">
                    <a href="mailto:s3877629@rmit.edu.vn"><i class="fas fa-envelope-square fa-2x active"></i></a>
                    <a href="https://github.com/mookee2809"><i class="fab fa-git-square fa-2x active"></i></a>
                    <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["modal","cookies"];
    callJSfile($jsArr);       
?>