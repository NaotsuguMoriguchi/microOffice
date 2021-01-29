<?php
include('../config.php');

$err = "Empty";
if(empty($_REQUEST["firstname"])) $err .= " Firstname, ";
if(empty($_REQUEST["lastname"])) $err .= " Lastname, ";
if(empty($_REQUEST["email"])) $err .= " Email, ";
if(empty($_REQUEST["username"])) $err .= " Username, ";
if(empty($_REQUEST["password"])) $err .= " Password, ";
if($_REQUEST["password"] != $_REQUEST["confirmPassword"]) $err .= " Password and confirmPassword isn't same.";

if($err != ""){

	$sql = "SELECT * FROM users WHERE email='".$_REQUEST["email"]."'";
    $index = 0; 
    $result = $conn -> query($sql);       
    while ($row = $result -> fetch_row()) {
       $index++;          
    }

    if($index > 0){

		echo '<script type="text/javascript">
				alert("This email is a duplicate.");
				location = "../register.php";
			</script>';

    }else{

    	$sql = "INSERT INTO users SET first_name='".$_REQUEST["firstname"]."', last_name='".$_REQUEST["lastname"]."', full_name='".$_REQUEST["firstname"]." ".$_REQUEST["lastname"]."', user_name='".$_REQUEST["username"]."', email='".$_REQUEST["email"]."', pass='".$_REQUEST["password"]."', role = 2";
   
	    $conn -> query($sql);

	    echo '<script type="text/javascript">
				alert("Complete.");
				location = "../index.php";
			</script>';

    }
	
}else{
	echo '<script type="text/javascript">
			alert("'.$err.'");
			location = "../register.php";
		</script>';
}
?>
