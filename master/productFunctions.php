<?php

function readAllProducts() {
  $fileName = '../data/products.csv';  //them ../ vao trc 
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
  return strtotime($b['created_time'])-strtotime($a['created_time']);
}
function readNewestProducts() {
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
  $products = readAllProducts();
  foreach ($products as $p) {
    if ($p['id'] == $productId) {
      return $p;
    }
  }
  return false;
}