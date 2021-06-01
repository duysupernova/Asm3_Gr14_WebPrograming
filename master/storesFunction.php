<?php
require 'productFunctions.php';
function readAllStore() {
  //This function read all the store lines by lines
  $fileName = '../data/stores.csv';
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $stores = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $store = [];
    foreach ($first as $colName) {
      $store[$colName] =  $row[$i];
      $i++;
    }
    $stores[] = $store;
  }
  return $stores;
}

function readNewestStore() {
  //This function read all the newest stores lines by lines
  $fileName = '../data/stores.csv';
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $stores = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $store = [];
    foreach ($first as $colName) {
      $store[$colName] =  $row[$i];
      $i++;
    }
    $stores[] = $store;
  }
  uasort($stores,'timecomp');
  return $stores;

}
function readFeaturedStores() {
  //This function read all the featured stores lines by lines
  $fileName = '../data/stores.csv';
  $open = fopen($fileName, 'r');
  $first = fgetcsv($open);
  $stores = [];
  while ($row = fgetcsv($open)) {
    $i = 0;
    $store = [];
    foreach ($first as $colName) {
      $store[$colName] =  $row[$i];
      $i++;
    }
    if ($store['featured']=="TRUE"){
      $stores[] = $store;
    }
  }
  return $stores;
}


function getStore($storeID) {
  //Get the a store ID for testing
  $stores = readAllStore();
  foreach ($stores as $p) {
    if ($p['id'] == $storeID) {
      return $p;
    }
  }
  return false;
}