<?php

$host='localhost';
$user='root';
$password='root';
$database='TEST';

$connection=new mysqli($host,$user,$password,$database);

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>