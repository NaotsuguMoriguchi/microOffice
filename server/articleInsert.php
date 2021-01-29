<?php

	include('../config.php');
	
	$sql = "INSERT INTO article_title SET title='".$_POST["title"]."', category='".$_POST["category"]."'";
	$conn -> query($sql);


	$sql = "SELECT MAX(id) FROM article_title";
	$result = $conn -> query($sql); 
	$index = 0;      
	while ($row = $result -> fetch_row()) {	 
		$index = $row[0];
	}
	
	$html_com = "<html>\n\t<head>\n\t\t<title>".$_POST["title"]."</title>\n\t</head>\n\t<body>\n\t\t".$_POST["content"]."\n\t</body>\n</html>";

	$sql = "INSERT INTO article_content SET article_id='".$index."', title='".$_POST["title"]."', content='".$html_com."' , category='".$_POST["category"]."'";
	$conn -> query($sql);

	echo $index;

?>