<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
	
if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
}
else{
     // //echo "Connected successfully";
    // // sql to create table
    $sql = "CREATE TABLE users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      first_name VARCHAR(10) NOT NULL,
      last_name VARCHAR(10) DEFAULT NULL,
      full_name VARCHAR(20) DEFAULT NULL,
      user_name VARCHAR(20) DEFAULT NULL,
      email VARCHAR(30) NOT NULL,
      pass VARCHAR(50),
      role int(11),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $conn->query($sql);

    $sql = "CREATE TABLE site_Title (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      titleName VARCHAR(10) NOT NULL,      
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $conn->query($sql);


    $sql = "CREATE TABLE article_category (
      id INT(199) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      category VARCHAR(10) NOT NULL,      
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $conn->query($sql);

    $sqlarcontent = "CREATE TABLE article_content (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        article_id int(10) DEFAULT NULL,
        title varchar(255) DEFAULT NULL,
        
        content text DEFAULT NULL,
        category varchar(10),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
    $conn->query($sqlarcontent);

    $sqlartitle = "CREATE TABLE article_title (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title varchar(255) DEFAULT NULL,
        category varchar(10),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
    $conn->query($sqlartitle);

    $sqlartitle = "CREATE TABLE article_role (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      article_id int(10) DEFAULT NULL,
      user_id int(10) DEFAULT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->query($sqlartitle);
    
    $sql = "SELECT * FROM users WHERE email = 'admin@gmail.com'";   
    $result = $conn -> query($sql);     
    //print_r($result);
   
    $index = 0;
    
    while ($row = $result -> fetch_row()) {
       $index++;          
    }

    if($index == 0){
      $sql = "INSERT INTO users (first_name, last_name, full_name, user_name, email, pass, role) VALUES ('first name', 'last name', 'full name', 'user name', 'admin@gmail.com', 'admin123',1)";
      $conn->query($sql);

      $sql = "INSERT INTO site_Title SET titleName='Micro Office'";
      $conn -> query($sql);
    }
       
}
?>