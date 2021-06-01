<?php

function readAllProducts() {
  $fileName = '../data/products.csv';
  // Read all products line by lines
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $products = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $product = [];
    foreach ($first as $colName) {
      $product[$colName] =  $row[$i];
      $i++;
    }
    $products[] = $product;
  }
  return $products;
}

function timecomp($a,$b){
  //This function sorted product by created time
  return strtotime($b['created_time'])-strtotime($a['created_time']);
}
function readNewestProducts() {
  //This function read all the newest store lines by lines and sort newest products by created time
  $fileName = '../data/products.csv';
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $products = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $product = [];
    foreach ($first as $colName) {
      $product[$colName] =  $row[$i];
      $i++;
    }
    $products[] = $product;
    
  }
  uasort($products,'timecomp');
  return $products;

}
function readFeaturedProducts() {
  //This function read all the featured store lines by lines
  $fileName = '../data/products.csv';
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $products = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $product = [];
    foreach ($first as $colName) {
      $product[$colName] =  $row[$i];
      $i++;
    }
    if ($product['featured_in_mall']=="TRUE"){
      $products[] = $product;
    }
  }
  return $products;
}


function getProduct($productId) {
  //This function read the product by product ID
  $products = readAllProducts();
  foreach ($products as $p) {
    if ($p['id'] == $productId) {
      return $p;
    }
  }
  return false;
}