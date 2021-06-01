<?php
function sortCSVFile($file, $columnToSortByIndex = 0, $asc = true ){
    //Take csv file in and sort it  according to the parameters
    //$columnToSortByIndex sort by ascending or decending base on $asc
    //1- prepare data
    $csvArray = array_map('str_getcsv', file($file));
    if(!$csvArray) return [];
    // 2- save the header
    $header = $csvArray[0];
    // 3- sort
    array_shift($csvArray);
    $temp_csv_array = array();
    for ($i=0; $i < count($csvArray); $i++) { 
        if($csvArray[$i][4] == $_SESSION["storeID"]){
            $temp_csv_array[] = $csvArray[$i];
        }
    }

    $csvArray = $temp_csv_array;

    $cTiteles = [];
    foreach ($csvArray as $row){
        $cTiteles[] = $row[$columnToSortByIndex];
    }
    //the sorting has been taken from here
    if($asc){
        array_multisort($cTiteles, SORT_ASC, $csvArray);
    }else{
        array_multisort($cTiteles, SORT_DESC, $csvArray);
    }
    // 3- prepend the header again
     array_unshift($csvArray,$header);
     return $csvArray;
}
function getAllProducts($id){
    //read the product csv and get all the product with the $id
    $all_products = [];
    $path = "../../data/products.csv";
    $file = fopen($path,"r");
    $counter = 1;
    while(! feof($file)){

        $raw_data = fgets($file);
    
        if($counter != 1){
            if(trim($raw_data) != ""){
    
                $data = explode(",", $raw_data);
                $store_id = $data[4];
                $featured_in_store = $data[6];
    
                if($store_id == $id){
                    array_push($all_products, $raw_data);
                }
                
            }
        }
        $counter++;
    }
    return $all_products;
}

function sortSelect($option){
    //Using sortCSVFile to return an array of sorted values base on the products.csv
    $path = "../../data/products.csv";
    if($option == 1){
        return sortCSVFile($path);
    } else if($option == 2){
        return sortCSVFile($path, 1);
    } else if($option == 3){
        return sortCSVFile($path, 2);
    } else if($option == 4){
        return sortCSVFile($path, 3, false);
    }else if($option == 5){
        return sortCSVFile($path, 3);
    } else{
        return sortCSVFile($path);
    }
}
function displayProduct($sort_products,  $paginationStart, $last_product){
//display all the product in $sort_products
for ($i=0; $i < count($sort_products); $i++) {
    $link = "";
   if($i != 0){
        if(($i > $paginationStart) && ($i < $last_product + 1)){
            $data = $sort_products[$i];
            $name = $data[1];
            $price = $data[2];
            if($i%2 == 0){
                $img ="2.png";
            }
            else{
                $img ="1.png";
            }
            if($i%2 == 0){
                $link ="2.html";
            }
            else{
                $link ="1.html";
            }
            echo '<div class="col-product-4">
                    <a href=<' .$link.'?>>
<img src="img/product/' .$img.'" alt="<' .$name.'>">
</a>
<h3>' .$name.'</h3>
<div class="rating">
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star-half-o"></i>
</div>
<p>$' .$price.'</p>
</div>';
}
}}
}

function get_new_arrivals($arr, $arr_size)
{
    //update / sort the $new_arrivals list with the value from the parse in $arr
global $new_arrivals;
$i =0;
$first = 0;
$second = 0;
$third = 0;
$fourth = 0;
$fifth = 0;
$counter = 0;
for ($i = 0; $i < $arr_size ; $i ++) { $current_data=$arr[$i]; $new_arrivals_data=explode(",", $arr[$i]);{
    $new_arrivals_created_time=$new_arrivals_data[3];
    $new_arrivals_data_timestamp=strtotime($new_arrivals_created_time);
    $current_timestamp=intval($new_arrivals_data_timestamp); if ($current_timestamp> $first){
    $fifth = $fourth;
    $new_arrivals[4] = $new_arrivals[3];
    $fourth = $third;
    $new_arrivals[3] = $new_arrivals[2];
    $third = $second;
    $new_arrivals[2] = $new_arrivals[1];
    $second = $first;
    $new_arrivals[1] = $new_arrivals[0];
    $first = $current_timestamp;
    $new_arrivals[0] = $current_data;
    } else if ($current_timestamp > $second){
    $fifth = $fourth;
    $new_arrivals[4] = $new_arrivals[3];
    $fourth = $third;
    $new_arrivals[3] = $new_arrivals[2];
    $third = $second;
    $new_arrivals[2] = $new_arrivals[1];
    $second = $current_timestamp;
    $new_arrivals[1] = $current_data;
    } else if ($current_timestamp > $third){
    $fifth = $fourth;
    $new_arrivals[4] = $new_arrivals[3];
    $fourth = $third;
    $new_arrivals[3] = $new_arrivals[2];
    $third = $current_timestamp;
    $new_arrivals[2] = $current_data;
    } else if ($current_timestamp > $fourth){
    $fifth = $fourth;
    $new_arrivals[4] = $new_arrivals[3];
    $fourth = $current_timestamp;
    $new_arrivals[3] = $current_data;
    } else if ($current_timestamp > $fifth){
    $fifth = $current_timestamp;
    $new_arrivals[4] = $current_data;
    }
    $counter++;
    }
    }
    }
    function getStoreName($id){
    //Search the stores.csv for the matched id and return it's name
    $path = "../../data/stores.csv";
    $file = fopen($path,"r");
    $counter = 1;
    while(! feof($file)){
    $raw_data = fgets($file);
    if($counter != 1){
    if(trim($raw_data) != ""){
    $data = explode(",", $raw_data);
    $store_id = $data[0];
    if($store_id == $id){
    return $data[1];
    }
    }
    }
    $counter++;
    }
    fclose($file);
    }
    function displayFeatureProduct($featured_store_products){
        //display all the product in the given array with the format of $featured_store_products
    for ($i=0; $i < count($featured_store_products); $i++) { $product=$featured_store_products[$i]; $data=explode(",",
        $product); $name=$data[1]; $price=$data[2]; $img="1.png" ; echo '<div class="col-product-3">
            <img src="img/product/' .$img.'"alt="'.$name.'">
        <h3>'.$name.'</h3>
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>

        </div>
        <p>'.$price.'</p>
        </div>';
        }
        }
        function displayNewProduct($new_arrivals){
            //display all the product in the given array with the format of $new_arrivals
        for ($i=0; $i < count($new_arrivals); $i++) { $product=$new_arrivals[$i]; $data=explode(",", $product);
            $name=$data[1]; $price=$data[2]; $img="2.png" ; echo' <div class="col-product-4">
            <img src="img/product/'.$img.'" alt="'.$name.'">
            <h3>'.$name.'</h3>
            <p>$'.$price.'</p>
            </div>';
            }
            }
