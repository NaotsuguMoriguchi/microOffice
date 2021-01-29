<?php
	include('../config.php');

	$sql = "SELECT * FROM users WHERE (email='".$_REQUEST["user"]."' OR user_name='".$_REQUEST["user"]."') AND pass='".$_REQUEST["pass"]."'";
	$result = $conn -> query($sql); 
	$index = 0;      
	while ($row = $result -> fetch_row()) {	   
	    $index++;   
		

		$_SESSION["id"] = $row[0];
		$_SESSION["first_name"] = $row[1];
		$_SESSION["last_name"] = $row[2];
		$_SESSION["full_name"] = $row[3];
		$_SESSION["user_name"] = $row[4];
		$_SESSION["email"] = $row[5];
		$_SESSION["role"] = $row[7];
		$_SESSION["reg_dt"] = $row[8];

		if($_SESSION["role"] == 1){
			header('Location: ../main.php');
		}else{
			header('Location: ../articleView.php');
		}
		
	}
	if($index == 0){
		echo '<script type="text/javascript">alert("Not a registered user."); location = "../index.php";</script>';
	}
?>