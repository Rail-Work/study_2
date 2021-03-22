<?php

require_once '../library/mainFunctions.php';

function getChildrenForCat($catId)
{
	global $db;
	$sql = "SELECT * FROM `categories` WHERE `parent_id` = '$catId'";

	$rs = mysqli_query($db, $sql);
	return createRsArray($rs);
}

function getAllMainCatsWithChildren()
{
	global $db;
	$sql = "SELECT * FROM `categories` WHERE `parent_id` = 0";

	$rs = mysqli_query($db, $sql);

	$rsArray = array();
	while($row = mysqli_fetch_assoc($rs)){
		$rsChildren = getChildrenForCat($row['id']);
		if($rsChildren){
			$row['children'] = $rsChildren;
		}
		$rsArray[] = $row;
	}
	return $rsArray;
}

function getCatById($catId) {
    global $db;
    $catId = intval($catId);

        $sql = "SELECT *
                FROM categories
                WHERE id = " . $catId;

    $rs = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($rs);
}