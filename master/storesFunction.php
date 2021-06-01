<?php
require 'productFunctions.php';
// readAllStore
function readAllStore() {
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
  $stores = readAllStore();
  foreach ($stores as $p) {
    if ($p['id'] == $storeID) {
      return $p;
    }
  }
  return false;
}