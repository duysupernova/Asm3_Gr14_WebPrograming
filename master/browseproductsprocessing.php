<?php
function sortByName($standartLetter){
    //This function receives the standard letter as parameters
    //and returns array which only matched with the standard letter.
    $storeArr = getCSVfile("../data/stores.csv");
    $result = [];
    foreach($storeArr as $data){
        $checkFirstLetter = stripos($data["name"], $standartLetter);
        if($checkFirstLetter === 0){
            $result[] = $data;
        }
    }
    return $result;
}

function sortByCatagory($standardCatID){
    //This function receives the standard cateagory id as parameters
    //and returns array which only matched with the standard cateagory id.
    $storeArr = getCSVfile("../data/stores.csv");
    foreach($storeArr as $data){
        if($data["category_id"] == $standardCatID){
            $result[] = $data;
        }
    }
    return $result;
}

function setSortItems(){
    //This function returns a sorted array considering user standard value.
    if(isset($_GET["submitName"])){
        $result = sortByName($_GET["store_name"]);
    }else if(isset($_GET["submitCatagory"])){
        $result = sortByCatagory($_GET["store_catagories"]);
    }
    return $result;
}
?>