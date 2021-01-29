<?php

	include('../config.php');
	
	$sql = "UPDATE article_title SET title='".$_POST["title"]."' WHERE id='".$_POST["sel"]."'";
	$conn -> query($sql);

	$sql = "UPDATE article_content SET title='".$_POST["title"]."', content='".$_POST["content"]."' WHERE article_id='".$_POST["sel"]."'";
	$conn -> query($sql);

?>