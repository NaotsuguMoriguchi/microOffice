<?php

	include('../config.php');
	
	$sql = "UPDATE users SET role='".$_POST["role"]."' WHERE id='".$_POST["sel"]."'";
	$conn -> query($sql);

?>