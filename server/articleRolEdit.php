<?php
	include('../config.php');

	$sql = "SELECT * FROM article_role WHERE article_id='".$_REQUEST["article_id"]."' AND user_id='".$_REQUEST["user_id"]."'";
	$result = $conn -> query($sql); 
	$index = 0;      
	
	while ($row = $result -> fetch_row()) {	   
	    $index++;  
		if($_REQUEST["rol"] == 0){
			
			echo $sql = "DELETE FROM article_role WHERE article_id='".$_REQUEST["article_id"]."' AND user_id='".$_REQUEST["user_id"]."'";
			$conn -> query($sql);
		}
	}

	if($index == 0){
		echo $sql = "INSERT INTO article_role SET article_id='".$_REQUEST["article_id"]."' , user_id='".$_REQUEST["user_id"]."'";
		$conn -> query($sql);
	}
	
?>