<?php
	include('../config.php');

	$sql = "SELECT * FROM article_content WHERE article_id='".$_REQUEST["sel"]."'";
	$result = $conn -> query($sql); 
	$index = 0;      
	
	$row = $result -> fetch_row();	   
	   		
	echo json_encode($row);
	
?>