<?php
	include('../config.php');

	$sql = "SELECT * FROM article_role WHERE article_id='".$_REQUEST["article_id"]."'";
	$result = $conn -> query($sql); 
	$index = 0;      
	
	$userIds = array();;	   		
	
	while ($row = $result -> fetch_row()) {	  

	    array_push($userIds, $row[2]);

	    $index++;
	}

	echo json_encode($userIds);
?>