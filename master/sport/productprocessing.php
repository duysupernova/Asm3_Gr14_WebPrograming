<?php
function sortCSVFile($file, $columnToSortByIndex = 0, $asc = true ){
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
?>