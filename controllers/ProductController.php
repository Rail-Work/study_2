<?php
// session_start();
require_once '../config/db.php';
require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

$itemId = isset($_GET['id']) ? $_GET['id'] : null;

$rsProduct = getProductById($itemId);
