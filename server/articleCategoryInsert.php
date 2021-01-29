<?php

	include('../config.php');
	
	$sql = "INSERT INTO article_category SET category='".$_POST["categoryName"]."'";
	$conn -> query($sql);

	$sql = "SELECT MAX(id) FROM article_category";
	$result = $conn -> query($sql); 
	$index = 0;      
	while ($row = $result -> fetch_row()) {	 
		$index = $row[0];
	}

	echo $index;
?>