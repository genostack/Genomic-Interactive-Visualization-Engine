<?php
require_once(realpath(dirname(__FILE__) . "/constants.php"));

ini_set("memory_limit", "2048M");
ini_set('max_execution_time', 300);

function connectCPB($db = 'compbrowser') {
	$mysqli = new mysqli(CPB_HOST, CPB_USER, CPB_PASS, $db);
	if($mysqli->connect_errno) {
		die("Connect failed:" . $mysqli->connect_error);
	}
	return $mysqli;
}

function connectGB($db) {
	$mysqli = new mysqli(GB_HOST, GB_USER, GB_PASS, $db);
	if($mysqli->connect_errno) {
		die("Connect failed:" . $mysqli->connect_error);
	}
	return $mysqli;
}


function byteSwap32($data) {
	$arr = unpack("V", pack("N", $data));
	return $arr[1];
}

function cmpTwoBits($aHigh, $aLow, $bHigh, $bLow) {
	// return -1 if b < a, 0 if equal, +1 else
	if($aHigh < $bHigh) {
		return 1;
	} else if($aHigh > $bHigh) {
		return -1;
	} else {
		return (($aLow < $bLow)? 1: (($aLow > $bLow)? -1: 0));
	}
}

function rangeIntersection($start1, $end1, $start2, $end2) {
	$s = max($start1, $start2);
	$e = min($end1, $end2);
	return $e - $s;
}

?>