<?php
$servername="localhost";
$username="root";
$password="";
$dbname="web_db";

//create the connection
$conn=new mysqli($servername, $username, $password, $dbname);

//check the connection
if($conn->connect_error){
    die("Failed to connect the database:".$conn->connect_error);
}
/*
else{
    die("Successfully connected");
}*/
?>