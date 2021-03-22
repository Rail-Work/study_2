<?php

require_once '../library/mainFunctions.php';

function getAllProducts($limit = null)
{
	global $db;
	$sql = "SELECT * FROM `products` ORDER BY `id` DESC";
	
	if($limit){
		$sql .= " LIMIT $limit";

		$rs = mysqli_query($db, $sql);
		return createRsArray($rs);
	}
}

function getProductsByCat($itemId)
{
	global $db;
	$itemId = intval($itemId);
	$sql = "SELECT * FROM `products` WHERE `category_id` = '$itemId'";

	$rs = mysqli_query($db, $sql);
	return createRsArray($rs);
}

function getProductById($itemId){
	global $db;
	$itemId = intval($itemId);
	$sql = "SELECT * FROM `products` WHERE `id` = '$itemId'";

	$rs = mysqli_query($db, $sql);
	return createRsArray($rs);
}