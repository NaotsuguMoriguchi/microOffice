<?php

	include('../config.php');
	
	echo $sql = "DELETE FROM article_category WHERE id='".$_POST["sel"]."'";
	$conn -> query($sql);


?>