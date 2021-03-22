<?php

function createRsArray($rs)
{
	if(!$rs) return false;

	$rsArray = array();
	while($row = mysqli_fetch_assoc($rs)){
		$rsArray[] = $row;
	}
	return $rsArray;
}

function d($value = null, $die = 1)
{
	echo 'Debug: <br/> <pre>';
	print_r($value);
	echo '</pre>';

	if($die) die;
}