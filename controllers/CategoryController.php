<?php
// session_start();
require_once '../config/db.php';
require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

$catId = isset($_GET['id']) ? $_GET['id'] : null;

$rsProductsByCat = null;
$rsChildCats = null;

$rsCategory = getCatById($catId);

if($rsCategory['parent_id'] == 0){
	$rsChildCats = getChildrenForCat($catId);
}else{
	$rsProductsByCat = getProductsByCat($catId);
 }