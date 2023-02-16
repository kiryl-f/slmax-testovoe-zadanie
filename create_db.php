<?php
$db_name = "slmax_app_db";

$conn = new mysqli("localhost", "root", "");
if(!mysqli_select_db($conn, $db_name)) {
    $create_db_sql = "CREATE DATABASE slmax_app_db";
    $conn->query($create_db_sql);
}
$conn->select_db($db_name);
$create_people_table_sql = "CREATE TABLE IF NOT EXISTS people (
id INT(5),
name VARCHAR(255) NOT NULL,
surname VARCHAR(255) NOT NULL,
birthdate VARCHAR(255),
gender INT(1),
city VARCHAR(255))";
$conn->query($create_people_table_sql);
$servername = "localhost";
$username = "root";
$password = "";
