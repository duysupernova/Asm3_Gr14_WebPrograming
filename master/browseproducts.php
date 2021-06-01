<?php
require "../lib/commonphp.php";
require "browseproductsprocessing.php";
if(isset($_GET["submitName"]) || isset(($_GET["submitCatagory"]))){
        $sortedArray = setSortItems();
} else{
    $_GET["submitName"] = True;
    $_GET["store_name"] = "A";
    $sortedArray = setSortItems();
}

// Load template
require_once "../lib/head.php";
$cssArr = ["headerandfooter","mallSort","cookies"];
$fileTitle = "Contact Us";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>

<main>
    <section>
        <div class="container">
            <div class="card">
                <h1 class="name">Browse Stores by Category</h1>
                <form method="get" action="browseproducts.php">
                    <select class="catagories_name" name="store_catagories">
                        <option value="" selected disabled hidden>Select a store category</option>
                        <option value="1">Department stores</option>
                        <option value="2">Grocery stores</option>
                        <option value="3">Restaurants</option>
                        <option value="4">Clothing stores</option>
                        <option value="5">Accessory stores</option>
                        <option value="6">Pharmacies</option>
                        <option value="7">Technology stores</option>
                        <option value="8">Pet stores</option>
                        <option value="9">Toy stores</option>
                        <option value="10">Specialty stores</option>
                        <option value="11">Thrift stores</option>
                        <option value="12">Services</option>
                        <option value="13">Kiosks</option>
                    </select>
                    <input type="submit" name="submitCatagory" value="Browse">
                </form>
            </div>
            <div class="card">
                <h1 class="name">Browse Stores by Name</h1>
                <form method="get" action="browseproducts.php">
                    <select class="catagories_name" name="store_name">
                        <option value="" selected disabled hidden>Select a letter for the store name.</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                    <input type="submit" name="submitName" value="Browse">
                </form>
            </div>
        </div>
    </section>
    <section>
        <?php
                if(isset($sortedArray)){
                    echo "<div class='mallDiv'>";
                    $num = 0;
                    if(!empty($sortedArray)){
                        foreach($sortedArray as $mallInfo){
                            $mallName = $mallInfo["name"];
                            $mallID = $mallInfo["id"];
                            echo "<div class='mallCont'>";
                            if($num % 2 == 0){
                                echo "<a href='sport/index.php?storeID={$mallID}'><img class='mallimg' src='New_products/mall4.jpg'></a>";
                                echo "<a href='sport/index.php?storeID={$mallID}'><h2>{$mallName}</h2></a>";
                            }else{
                                echo "<a href='game/index.php?storeID={$mallID}'><img class='mallimg' src='New_products/mall4.jpg'></a>";
                                echo "<a href='game/index.php?storeID={$mallID}'><h2>{$mallName}</h2></a>";

                            }
                            $num ++;
                            
                            echo "</div>";
                        }
                    } else{
                        echo "<p>There is no matched data.</p>";
                    }
                    echo "</div>";
                }
            ?>
    </section>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies"];
    callJSfile($jsArr);       
?>