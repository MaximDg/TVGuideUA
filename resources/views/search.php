<?php

$db = mysqli_connect("localhost", "root", "", "tv") or die("Нет соединения с БД");
mysqli_set_charset($db, "utf8") or die("Не установлена кодировка соединения");

/**
* поиск автокомплит
**/
function search_autocomplete(){
	global $db;
	$search = trim(mysqli_real_escape_string($db, $_GET['term']));
	$query = "SELECT Name FROM films WHERE Name LIKE '%{$search}%' LIMIT 10";
	$res = mysqli_query($db, $query);
	$result_search = array();
	while($row = mysqli_fetch_assoc($res)){
		$result_search[] = array('label' => $row['Name']);
	}
	return $result_search;
}

if(!empty($_GET['term'])){
	$search = search_autocomplete();
	exit( json_encode($search) );
}

if(!empty($_GET['search'])){
	echo "Поиск по запросу <b>{$_GET['search']}</b>...";
}