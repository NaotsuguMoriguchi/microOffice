<?php

	include('../config.php');
	
	echo $sql = "UPDATE article_category SET category='".$_POST["name"]."' WHERE id='".$_POST["sel"]."'";
	$conn -> query($sql);


?>