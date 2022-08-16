<?php

$hostName = "localhost";
 $userName = "root";
 $password = "";
 $dbName = "sparkscrud";
 $conn= new mysqli($hostName,$userName,$password,$dbName);
 if(!$conn){
    die (mysqli_error($conn));
 }
 ?>