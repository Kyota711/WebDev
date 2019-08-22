<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "library";
  
    //create connection passing the 4 variables
    //connection string
    $conn = new mysqli ($servername,$username,$password,$database);

    //check connection
     if($conn->connect_error){
         die("Connection failed:" .$conn->connect_error);
     }
     echo"Conected Successfully";
    ?>