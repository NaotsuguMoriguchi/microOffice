<?php

	include('../config.php');
	
	$sql = "DELETE  FROM site_Title";
	$conn -> query($sql);

	$sql = "INSERT INTO site_Title SET titleName='".$_POST["titleManagertxt"]."'";
	$conn -> query($sql);

?>