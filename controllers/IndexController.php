<?php
// session_start();
require_once '../config/db.php';
require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

$rsCategories = getAllMainCatsWithChildren();
$rsProducts = getAllProducts(100);
